<?php

namespace App\Http\Controllers\Admin;

use File;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductCategory;

class ProductCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $productCategories = ProductCategory::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.category.index', compact('productCategories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $productCategories = ProductCategory::where('parent_id', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.category.create', compact('productCategories'));
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

        $productCategory = new ProductCategory;
        $productCategory->name = $request->get('name');
        $productCategory->parent_id = $request->get('parent_id');
        $productCategory->description = $request->get('description');
        $productCategory->status = $request->get('status');

        if($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $path = 'uploads/images';
            $image_name = time() . '_' . rand(100, 999) . '_' . $image->getClientOriginalName();
            $image->move(public_path($path), $image_name);
            $productCategory->thumbnail = $image_name;
        }

        if($productCategory->save()) {
            return redirect()->route('admin.product-category.edit', $productCategory->id)->with('success', 'Product category created successfully.');
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
    public function edit(ProductCategory $productCategory)
    {
        $productCategories = ProductCategory::where('parent_id', 0)->orderBy('created_at', 'desc')->get();
        return view('admin.category.edit', compact('productCategory', 'productCategories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ProductCategory $productCategory)
    {
        $this->validate($request, [
            'name' => 'required'
        ]);

        $productCategory->name = $request->get('name');
        $productCategory->parent_id = $request->get('parent_id');
        $productCategory->description = $request->get('description');
        $productCategory->status = $request->get('status');

        if($request->has('thumbnail')) {
            if($productCategory->thumbnail) {
                File::delete($productCategory->thumbnail);
            }

            $image = $request->file('thumbnail');
            $path = 'uploads/images/categories';
            $image_name = time() . '_' . rand(100, 999) . '_' . $image->getClientOriginalName();
            $image->move(public_path($path), $image_name);
            $productCategory->thumbnail = $image_name;
        }

        if($productCategory->save()) {
            return redirect()->route('admin.product-category.edit', $productCategory->id)->with('success', 'Product category updated successfully.');
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
    public function destroy(ProductCategory $productCategory)
    {
        if($productCategory->thumbnail) {
            File::delete($productCategory->thumbnail);
        }

        if($productCategory->delete()) {
            return response()->json(['result' => 'success']);
        } else {
            return response()->json(['result' => $errors->all()]);
        }
    }
}
