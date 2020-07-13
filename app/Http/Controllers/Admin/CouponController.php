<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Coupon;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    public function index()
    {
        $coupons = Coupon::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.coupon.index', compact('coupons'));
    }

    public function create()
    {
        return view('admin.coupon.create');
    }

    public function store(Request $request, Coupon $coupon)
    {
        $request->validate([
            'name'       => 'required',
            'code'       => 'required',
            'starts_at'  => 'required',
            'expires_at' => 'required',
            'amount'     => 'required',
            'max_uses'   => 'required'
        ]);

        $coupon              = new Coupon();
        $coupon->name        = $request->input('name');
        $coupon->code        = $request->input('code');
        $coupon->starts_at   = $request->input('starts_at');
        $coupon->expires_at  = $request->input('expires_at');
        $coupon->description = $request->input('description');
        $coupon->status      = $request->input('status');
        $coupon->is_fixed    = $request->input('is_fixed');
        $coupon->amount      = $request->input('amount');
        $coupon->max_uses    = $request->input('max_uses');

        if ($coupon->save()) {
            return redirect()->route('admin.coupon.edit', $coupon->id)->with('success', 'Coupon created successfully.');
        } else {
            return redirect()->back()->with('error', 'Please try again.');
        }
    }

    public function edit(Coupon $coupon)
    {
        return view('admin.coupon.edit', compact('coupon'));
    }

    public function show(Coupon $coupon)
    {
        //
    }

    public function update(Request $request, Coupon $coupon)
    {
        $request->validate([
            'name'       => 'required',
            'code'       => 'required',
            'starts_at'  => 'required',
            'expires_at' => 'required',
            'amount'     => 'required',
            'max_uses'   => 'required'
        ]);

        $coupon->name        = $request->input('name');
        $coupon->code        = $request->input('code');
        $coupon->starts_at   = $request->input('starts_at');
        $coupon->expires_at  = $request->input('expires_at');
        $coupon->description = $request->input('description');
        $coupon->status      = $request->input('status');
        $coupon->is_fixed    = $request->input('is_fixed');
        $coupon->amount      = $request->input('amount');
        $coupon->max_uses    = $request->input('max_uses');

        if ($coupon->save()) {
            return redirect()->back()->with('success', 'Coupon updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Please try again.');
        }
    }

    public function destroy(Coupon $coupon)
    {
        if ($coupon->delete()) {
            return response()->json(['result' => 'success']);
        } else {
            return response()->json(['result' => $errors->all()]);
        }
    }

}