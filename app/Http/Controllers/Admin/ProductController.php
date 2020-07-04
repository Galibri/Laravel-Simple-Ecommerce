<?php

namespace App\Http\Controllers\Admin;

Use  File;
use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use App\Models\Admin\Product;
use App\Http\Controllers\Controller;
use App\Models\Admin\ProductCategory;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products = Product::orderBy('created_at', 'desc')->paginate(10);
        return view('admin.product.index', compact('products'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = ProductCategory::orderBy('created_at', 'desc')->get();
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('admin.product.create', compact('categories', 'brands'));
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
            'title' => 'required',
            'price' => 'required'
        ]);

        $product = new Product;
        $product->title = $request->get('title');
        $product->product_category_id = $request->get('product_category_id');
        $product->brand_id = $request->get('brand_id');
        $product->description = $request->get('description');
        $product->short_description = $request->get('short_description');
        
        $product->price = (float) $request->get('price');
        $product->selling_price = (float) $request->get('selling_price');

        $product->sku = $request->get('sku');
        $product->qty = $request->get('qty');
        $product->virtual = $request->get('virtual');
        $product->status = $request->get('status');

        if($request->has('thumbnail')) {
            $image = $request->file('thumbnail');
            $path = 'uploads/images/products';
            $image_name = time() . '_' . rand(100, 999) . '_' . $image->getClientOriginalName();
            $image->move(public_path($path), $image_name);
            $product->thumbnail = $path . '/' . $image_name;
        }

        if($product->save()) {
            return redirect()->route('admin.product.edit', $product->id)->with('success', 'Product created successfully.');
        } else {
            return redirect()->back()->with('error', 'Please try again later.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        $product = $product->load('product_category', 'brand');
        return response()->json($product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories = ProductCategory::orderBy('created_at', 'desc')->get();
        $brands = Brand::orderBy('created_at', 'desc')->get();
        return view('admin.product.edit', compact('categories', 'brands', 'product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        $this->validate($request, [
            'title' => 'required',
            'price' => 'required'
        ]);

        $product->title = $request->get('title');
        $product->product_category_id = $request->get('product_category_id');
        $product->brand_id = $request->get('brand_id');
        $product->description = $request->get('description');
        $product->short_description = $request->get('short_description');
        
        $product->price = (float) $request->get('price');
        $product->selling_price = (float) $request->get('selling_price');

        $product->sku = $request->get('sku');
        $product->qty = $request->get('qty');
        $product->virtual = $request->get('virtual');
        $product->status = $request->get('status');

        if($request->has('thumbnail')) {
            if($product->thumbnail) {
                File::delete($product->thumbnail);
            }
            $image = $request->file('thumbnail');
            $path = 'uploads/images/products';
            $image_name = time() . '_' . rand(100, 999) . '_' . $image->getClientOriginalName();
            $image->move(public_path($path), $image_name);
            $product->thumbnail = $path . '/' . $image_name;
        }

        if($product->save()) {
            return redirect()->route('admin.product.edit', $product->id)->with('success', 'Product updated successfully.');
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
    public function destroy(Product $product)
    {
        if($product->thumbnail) {
            File::delete($product->thumbnail);
        }

        if($product->delete()) {
            return response()->json(['result' => 'success']);
        } else {
            return response()->json(['result' => $errors->all()]);
        }
    }
}
