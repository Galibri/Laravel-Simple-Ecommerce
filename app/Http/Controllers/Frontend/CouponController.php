<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use App\Models\Frontend\Cart;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    protected $couponCode;

    public function process_coupon(Request $request)
    {
        $request->validate([
            'coupon_code' => 'required'
        ]);

        $this->couponCode = $request->input('coupon_code');

        if ($this->is_coupon_valid()) {

            if ($this->add_coupon()) {
                return redirect()->back()->with('success', 'Coupon added.');
            }

            return redirect()->back()->with('error', 'Invalid coupon.');

        }

        return redirect()->back()->with('error', 'Invalid coupon.');

    }

    public function get_valid_coupon()
    {
        if (auth()->check()) {
            $cart = Cart::where('user_id', auth()->user()->id)->first();
            if ($cart) {
                $this->couponCode = $cart->coupon_code;

                if (!$this->is_coupon_valid()) {
                    $this->couponCode  = null;
                    $cart->coupon_code = null;
                    $cart->save();
                }
            } else {
                $this->couponCode = null;
            }
        }
        if (session()->has('coupon')) {
            $this->couponCode = session('coupon');
            if (!$this->is_coupon_valid()) {
                $this->couponCode = null;
                session()->forget('coupon');
            }
        }
        return $this->couponCode;
    }

    public static function get_coupon()
    {
        return (new self())->get_valid_coupon();
    }

    public function add_coupon()
    {
        if (auth()->check()) {
            $user_cart              = Cart::where('user_id', auth()->user()->id)->first();
            $user_cart->coupon_code = $this->couponCode;
            if ($user_cart->save()) {
                return true;
            }
            return false;
        }

        session()->put('coupon', $this->couponCode);

        if (session()->has('coupon')) {
            return true;
        }
        return false;

    }

    public static function remove_coupon()
    {
        if (auth()->check()) {
            $user_cart              = Cart::where('user_id', auth()->user()->id)->first();
            $user_cart->coupon_code = null;
            if ($user_cart->save()) {
                return redirect()->back()->with('success', 'Coupon removed.');
            }
        }
        if (session()->has('coupon')) {
            session()->forget('coupon');
        }
        return redirect()->back()->with('success', 'Coupon removed.');
    }

    public function is_coupon_valid()
    {
        $coupon = Coupon::where('code', $this->couponCode)->first();
        if (!$coupon) {
            return false;
        }
        if ($coupon->starts_at > date('Y-m-d H:i:s')) {
            return false;
        }
        if ($coupon->expires_at <= date('Y-m-d H:i:s')) {
            return false;
        }
        if ($coupon->status == false) {
            return false;
        }
        if ($coupon->used >= $coupon->max_uses) {
            return false;
        }
        if (CartController::total_in_cart() == 0) {
            return false;
        }

        return true;
    }
}