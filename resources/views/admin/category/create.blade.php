@extends('layouts.admin')
@section('title', 'Category')


@section('content')
<form action="{{ route('admin.product-category.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add Category</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Category name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="parent_id">Select Parent</label>
                        <select name="parent_id" id="parent_id" class="form-control">
                            <option value="0" {{ old('parent_id') == 0 ? "selected='selected'" : '' }}>No parent</option>
                            @foreach ($productCategories as $productCategory)
                                <option value="{{ $productCategory->id }}" {{ old('parent_id') == $productCategory->id ? "selected='selected'" : '' }}>{{ $productCategory->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="description">Category description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control textarea">{{ old('description') }}</textarea>
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
                        <option value="1" {{ (old('status') == 1 && old('status') != null) ? "selected='selected'" : '' }}>Active</option>
                        <option value="0" {{ (old('status') == 0 && old('status') != null) ? "selected='selected'" : '' }}>Inactive</option>
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
                </div>
            </div>
        </div>
    </div>
</form>
@endsection