@extends('layouts.admin')
@section('title', 'Brand')


@section('content')
<form action="{{ route('admin.brand.store')}}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="row mt-3">
        <div class="col-lg-8">
            <div class="card">
                <div class="card-header">
                    <h3>Add Brand</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Brand name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ old('name') }}">
                        @error('name')
                            <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="description">Brand description</label>
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
                    <label for="logo">Logo</label>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="file" name="logo" id="logo" class="form-control">
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection