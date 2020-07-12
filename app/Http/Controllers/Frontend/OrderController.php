<?php

namespace App\Http\Controllers\Frontend;

use App\User;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Models\Frontend\Order;
use App\Http\Controllers\Controller;
use App\Models\Frontend\OrderDetail;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Collection;
use App\Http\Controllers\Frontend\CartController;

class OrderController extends Controller
{
    public function store(Request $request) {

        $request->validate([
            'first_name' =>  'required',
            'email' =>  'required',
            'phone' =>  'required',
            'address_line_1' =>  'required',
            'city' =>  'required',
            'state' =>  'required',
            'zip' =>  'required',
            'country' =>  'required',
        ]);

        if(auth()->check()) {
            $user = User::where('id', auth()->user()->id)->first();
        } else {
            $request->validate([
                'password' => 'required|min:8',
                'email' =>  'unique:users,email'
            ]);
            $user = new User;
            $user->phone = bcrypt($request->input('password'));
        }
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->first_name = $request->input('first_name');
        $user->last_name = $request->input('last_name');
        $user->company = $request->input('company');
        $user->phone = $request->input('phone');
        $user->save();

        $order = new Order;
        $order->user_id = $user->id;
        $order->address_line_1 = $request->input('address_line_1');
        $order->address_line_2 = $request->input('address_line_2');
        $order->city = $request->input('city');
        $order->state = $request->input('state');
        $order->zip = $request->input('zip');
        $order->country = $request->input('country');
        if($request->has('different_shipping')) {
            $order->different_shipping = true;
        }
        $order->s_address_line_1 = $request->input('s_address_line_1');
        $order->s_address_line_2 = $request->input('s_address_line_2');
        $order->s_city = $request->input('s_city');
        $order->s_state = $request->input('s_state');
        $order->s_zip = $request->input('s_zip');
        $order->s_country = $request->input('s_country');
        $order->additional = $request->input('additional');
        $order->payment_method = $request->input('payment_method');
        $order->order_total = CartController::cart_final_price();
        $order->payment_status = 'pending';
        $order->order_status = 'pending';
        $order->save();


        $get_cart = CartController::get_cart();
        $order_details_array = array();
        $order_id = $order->id;

        if(count($get_cart)) {
            foreach($get_cart as $cart_key => $cart_product) {
                $product_price = Product::whereId($cart_key)->first()->final_price;
                $new_item = array(
                    'order_id' => $order_id,
                    'product_id' => $cart_key,
                    'product_price' => $product_price,
                    'product_qty' => $cart_product['qty'],
                    'total_price' => $product_price * $cart_product['qty'],
                    'created_at'=>date('Y-m-d H:i:s'),
                    'updated_at'=> date('Y-m-d H:i:s')
                );
                array_push($order_details_array, $new_item);
            }
        }

        $order_created = OrderDetail::insert($order_details_array);

        if($order_created) {
            if(!auth()->check()) {
                $credentials = $request->only('email', 'password');
                Auth::attempt($credentials);
            }
            if(CartController::make_cart_empty()) {
                return redirect()->route('frontend.order-placed', $order_id)->with('success', 'Order placed successfully');
            } else {
                return redirect()->back()->with('error', 'Please try again');
            }
        }
        return redirect()->back()->with('error', 'Please try again');
    }

    public function checkout() {
        if(!count(CartController::get_cart())) {
            return redirect()->intended('/');
        }
        $orderDetails = new Collection();
        $orderDetails->address_line_1 = '';
        $orderDetails->address_line_2 = '';
        $orderDetails->city = '';
        $orderDetails->state = '';
        $orderDetails->zip = '';
        $orderDetails->country = '';
        $orderDetails->different_shipping = '';
        $orderDetails->s_address_line_1 = '';
        $orderDetails->s_address_line_2 = '';
        $orderDetails->s_city = '';
        $orderDetails->s_state = '';
        $orderDetails->s_zip = '';

        if(auth()->check()) {
            $order = Order::where('user_id', auth()->user()->id)->orderBy('created_at', 'desc')->first();

            if($order) {
                $orderDetails = $order;
            }
        }

        return view('frontend.checkout', compact('orderDetails'));
    }

    public function order_placed(Order $order) {
        $order_details = OrderDetail::whereOrderId($order->id)->get();
        return view('frontend.thank_you', compact('order', 'order_details'));
    }
}