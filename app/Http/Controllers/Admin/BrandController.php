<?php

namespace App\Http\Controllers\Admin;

use File;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class BrandController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $brands = Brand::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.brand.index', compact('brands'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.brand.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $brand = new Brand;
        $brand->name = $request->get('name');
        $brand->description = $request->get('description');
        $brand->status = $request->get('status');

        if($request->has('logo')) {
            $image = $request->file('logo');
            $path = 'uploads/images/brands';
            $image_name = time() . '_' . rand(100, 999) . '_' . $image->getClientOriginalName();
            $image->move(public_path($path), $image_name);
            $brand->logo = $image_name;
        }

        if($brand->save()) {
            return redirect()->route('admin.brand.edit', $brand->id)->with('success', 'Brand created successfully.');
        } else {
            return redirect()->back()->with('error', 'Please try again later.');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Brand $brand)
    {
        return view('admin.brand.edit', compact('brand'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Brand $brand)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $brand->name = $request->get('name');
        $brand->description = $request->get('description');
        $brand->status = $request->get('status');

        if($request->has('logo')) {
            if($brand->logo) {
                File::delete($brand->logo);
            }

            $image = $request->file('logo');
            $path = 'uploads/images/brands';
            $image_name = time() . '_' . rand(100, 999) . '_' . $image->getClientOriginalName();
            $image->move(public_path($path), $image_name);
            $brand->logo = $image_name;
        }

        if($brand->save()) {
            return redirect()->back()->with('success', 'Brand updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Please try again later.');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Brand $brand)
    {
        if($brand->logo) {
            File::delete($brand->logo);
        }

        if($brand->delete()) {
            return response()->json(['result' => 'success']);
        } else {
            return response()->json(['result' => $errors->all()]);
        }
    }
}
