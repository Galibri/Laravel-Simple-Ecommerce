<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Shipping;
use Illuminate\Http\Request;

class ShippingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $shippings = Shipping::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.shipping.index', compact('shippings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.shipping.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'      => 'required',
            'countries' => 'required',
            'amount'    => 'required'
        ]);
        $shipping              = new Shipping();
        $shipping->name        = $request->input('name');
        $shipping->description = $request->input('description');
        $shipping->countries   = json_encode($request->input('countries'));
        $shipping->amount      = $request->input('amount');
        $shipping->status      = $request->input('status');
        if ($shipping->save()) {
            return redirect()->route('admin.shipping.edit', $shipping->id)->with('success', 'Shipping added');
        }

        return redirect()->route('admin.shipping.index')->with('error', 'Please try again.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Shipping $shipping)
    {
        return view('admin.shipping.edit', compact('shipping'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Shipping $shipping)
    {
        $request->validate([
            'name'      => 'required',
            'countries' => 'required',
            'amount'    => 'required'
        ]);

        $shipping->name        = $request->input('name');
        $shipping->description = $request->input('description');
        $shipping->countries   = json_encode($request->input('countries'));
        $shipping->amount      = $request->input('amount');
        $shipping->status      = $request->input('status');
        if ($shipping->save()) {
            return redirect()->route('admin.shipping.edit', $shipping->id)->with('success', 'Shipping updated');
        }

        return redirect()->route('admin.shipping.index')->with('error', 'Please try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Shipping $shipping)
    {
        if ($shipping->delete()) {
            return redirect()->back()->with('success', 'Shipping deleted');
        }
        return redirect()->back()->with('error', 'Please try again.');
    }
}