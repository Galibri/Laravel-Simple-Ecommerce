@extends('layouts.admin')
@section('title', 'Edit Category')


@section('content')
<form action="{{ route('admin.product-category.update', $productCategory->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Category</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ? old('name') : $productCategory->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Select Parent</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0" {{ old('parent_id') == 0 ? "selected='selected'" : '' }}>No parent</option>
                            @foreach ($productCategories as $dbCategory)
                                <option value="{{ $dbCategory->id }}" {{ old('parent_id') ? (old('parent_id') == $productCategory->parent_id ? "selected='selected'" : '') : ($dbCategory->id == $productCategory->parent_id ? "selected='selected'" : '') }}>{{ $dbCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Category description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control textarea">{{ old('description') ? old('description') : $productCategory->description }}</textarea>
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
                        <option value="1" {{ old('status') ? (old('status') == $productCategory->status ? "selected='selected'" : '') : (1 == $productCategory->status ? "selected='selected'" : '') }}>Active</option>
                        <option value="0" {{ old('status') ? (old('status') == $productCategory->status ? "selected='selected'" : '') : (0 == $productCategory->status ? "selected='selected'" : '') }}>Inactive</option>
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
                    <label for="thumbnail">Thumbnail</label>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="file" name="thumbnail" id="thumbnail" class="form-control">
                    </div>
                    @if($productCategory->thumbnail)
                    <div class="img-fluid">
                        <img src="{{ asset($productCategory->thumbnail) }}" class="img-fluid" alt="{{ $productCategory->name }}">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
@endsection