@extends('layouts.admin')
@section('title', 'Edit Brand')


@section('content')
<form action="{{ route('admin.brand.update', $brand->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Brand</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Brand name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') ? old('name') : $brand->name }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Brand description</label>
                        <textarea name="description" id="description" cols="30" rows="4" class="form-control textarea">{{ old('description') ? old('brand') : $brand->description }}</textarea>
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
                        <option value="1" {{ old('status') ? (old('status') == $brand->status ? "selected='selected'" : '') : (1 == $brand->status ? "selected='selected'" : '') }}>Active</option>
                        <option value="0" {{ old('status') ? (old('status') == $brand->status ? "selected='selected'" : '') : (0 == $brand->status ? "selected='selected'" : '') }}>Inactive</option>
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
                    <label for="logo">Thumbnail</label>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="file" name="logo" id="logo" class="form-control">
                    </div>
                    @if($brand->logo)
                    <div class="img-fluid">
                        <img src="{{ asset($brand->logo) }}" class="img-fluid" alt="{{ $brand->name }}">
                    </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
</form>
@endsection