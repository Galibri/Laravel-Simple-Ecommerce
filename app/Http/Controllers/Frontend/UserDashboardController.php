<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Frontend\Order;
use App\Models\Frontend\OrderDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserDashboardController extends Controller
{
    public function dashbaord()
    {
        $user = auth()->user();
        return view('frontend.dashboard.dashboard', compact('user'));
    }

    public function orders()
    {
        $orders = Order::whereUserId(auth()->user()->id)->orderBy('created_at', 'desc')->paginate(10);
        return view('frontend.dashboard.orders', compact('orders'));
    }

    public function order_details(Order $order)
    {
        $orderDetails = OrderDetail::where('order_id', $order->id)->orderBy('created_at', 'desc')->get();
        return view('frontend.dashboard.order-details', compact('order', 'orderDetails'));
    }

    public function account()
    {
        return view('frontend.dashboard.account');
    }

    public function account_update(Request $request)
    {
        $user             = auth()->user();
        $user->first_name = $request->input('first_name');
        $user->last_name  = $request->input('last_name');
        $user->phone      = $request->input('phone');
        $user->company    = $request->input('company');
        $user->save();
        return redirect()->back();
    }

    public function update_password(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'current_password'      => 'required',
            'password'              => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);

        if (!$validator->fails()) {
            if (Hash::check($request->input('current_password'), auth()->user()->password)) {
                auth()->user()->password = bcrypt($request->input('password'));
                auth()->user()->save();
            } else {
                $validator->getMessageBag()->add('current_password', 'Password did not match.');
            }
        }

        return redirect()->back()->withErrors($validator)->withInput();
    }
}