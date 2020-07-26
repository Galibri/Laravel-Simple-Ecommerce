<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Tax;
use Illuminate\Http\Request;

class TaxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $taxes = Tax::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.tax.index', compact('taxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tax.create');
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
            'name'    => 'required',
            'country' => 'required',
            'amount'  => 'required'
        ]);
        $tax              = new Tax();
        $tax->name        = $request->input('name');
        $tax->description = $request->input('description');
        $tax->country     = $request->input('country');
        $tax->amount      = $request->input('amount');
        $tax->status      = $request->input('status');
        if ($tax->save()) {
            return redirect()->route('admin.tax.edit', $tax->id)->with('success', 'Tax added');
        }

        return redirect()->route('admin.tax.index')->with('error', 'Please try again.');
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
    public function edit(Tax $tax)
    {
        return view('admin.tax.edit', compact('tax'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tax $tax)
    {
        $request->validate([
            'name'    => 'required',
            'country' => 'required',
            'amount'  => 'required'
        ]);
        $tax->name        = $request->input('name');
        $tax->description = $request->input('description');
        $tax->country     = $request->input('country');
        $tax->amount      = $request->input('amount');
        $tax->status      = $request->input('status');
        if ($tax->save()) {
            return redirect()->route('admin.tax.edit', $tax->id)->with('success', 'Tax updated');
        }

        return redirect()->route('admin.tax.index')->with('error', 'Please try again.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tax $tax)
    {
        if ($tax->delete()) {
            return redirect()->back()->with('success', 'Tax deleted');
        }
        return redirect()->back()->with('error', 'Please try again.');
    }
}