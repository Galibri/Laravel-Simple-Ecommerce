@extends('layouts.admin')
@section('title', 'Edit Product')


@section('content')
<form action="{{ route('admin.product.update', $product->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Product</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Title</label>
                        <input type="text" class="form-control" name="title" id="title" value="{{ old('title') ? old('title') : $product->title }}">
                        @error('title')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Product description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control textarea">{{ old('description') ? old('description') : $product->description }}</textarea>
                    </div>
                    <div class="form-group">
                        <label for="short_description">Short description</label>
                        <textarea name="short_description" id="short_description" cols="30" rows="4" class="form-control textarea">{{ old('description') ? old('description') : $product->short_description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-lg-3 offset-lg-1">
            <div class="card">
                <div class="card-header">
                    <label for="status">Status</label>
                </div>
                <div class="card-body">
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ old('status') ? (old('status') == 1 ? "selected='selected'" : '') : (1 == $product->status ? "selected='selected'" : '') }}>Active</option>
                        <option value="0" {{ old('status') ? (old('status') == 0 ? "selected='selected'" : '') : (0 == $product->status ? "selected='selected'" : '') }}>Inactive</option>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary text-light btn-block">Save</button>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <h5>Brand & Category</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="brand_id">Brand</label>
                        <div class="radioboxes">
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="brand_id" {{ old('brand_id') ? (old('brand_id') == 0 ? "checked='checked'" : '') : ($product->brand_id == 0 ? "checked='checked'" : '') }} value="0">No Brand
                                </label>
                            </div>
                            @foreach($brands as $brand)
                            <div class="form-check">
                                <label class="form-check-label">
                                    <input type="radio" class="form-check-input" name="brand_id" {{ old('brand_id') ? (old('brand_id') == $brand->id ? "checked='checked'" : '') : ($product->brand_id == $brand->id ? "checked='checked'" : '') }} value="{{ $brand->id }}">{{ $brand->name }}
                                </label>
                            </div>
                            @endforeach
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="product_category_id">Category</label>
                        <select name="product_category_id" id="product_category_id" class="form-control">
                            <option value="0">Select Category</option>
                            @foreach ($categories as $category)
                                <option {{ old('product_category_id') ? (old('product_category_id') == $category->id ? "selected='selected'" : '') : ($category->id == $product->product_category_id ? "selected='selected'" : '') }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Pricing Info</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="price">Price</label>
                        <input type="number" name="price" id="price" step="any" min="0" class="form-control" value="{{ old('price') ? old('price') : $product->price }}">
                        @error('price')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="selling_price">Selling Price</label>
                        <input type="number" name="selling_price" id="selling_price" step="any" min="0" class="form-control" value="{{ old('selling_price') ? old('selling_price') : $product->selling_price }}">
                    </div>
                </div>
            </div>

            <div class="card">
                <div class="card-header">
                    <h5>Other Info</h5>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="sku">SKU</label>
                        <input type="text" name="sku" id="sku" class="form-control" value="{{ old('sku') ? old('sku') : $product->sku }}">
                    </div>
                    <div class="form-group">
                        <label for="qty">Quantity</label>
                        <input type="number" min="0" name="qty" id="qty" class="form-control" value="{{ old('qty') ? old('qty') : $product->qty }}">
                    </div>
                    <div class="form-group">
                        <label for="qty">Virtual</label>
                        <select name="virtual" id="virtual" class="form-control">
                            <option {{ old('virtual') ? (old('virtual') == 0 ? "selected='selected'" : '') : (0 == $product->virtual ? "selected='selected'" : '') }} value="0">No</option>
                            <option {{ old('virtual') ? (old('virtual') == 1 ? "selected='selected'" : '') : (1 == $product->virtual ? "selected='selected'" : '') }} value="1">Yes</option>
                        </select>
                    </div>
                </div>
            </div>


            <div class="card">
                <div class="card-header">
                    <label for="thumbnail">Thumbnail</label>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                    </div>
                    @if($product->thumbnail)
                    <div class="img-fluid">
                        <img src="{{ asset($product->thumbnail) }}" class="img-fluid" alt="{{ $product->name }}">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
@endsection