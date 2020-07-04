@extends('layouts.admin')
@section('title', 'Category')


@section('content')
    <div class="card mt-3">
        <div class="card-header">
            <h3>Product Categories</h3>
        </div>
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th>Title</th>
                        <th>Slug</th>
                        <th>Image</th>
                        <th>Parent</th>
                        <th style="width: 150px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($productCategories as $productCategory)
                    <tr>
                        <td>{{ $productCategory->name }}</td>
                        <td>{{ $productCategory->slug }}</td>
                        @if($productCategory->thumbnail)
                            <td><img src="{{ asset($productCategory->thumbnail) }}" height="50" alt=""></td>
                        @else
                            <td>No image</td>
                        @endif
                        <td>{{ $productCategory->parent_category ? $productCategory->parent_category->name : '' }}</td>
                        <td>
                            <a href="{{ route('admin.product-category.edit', $productCategory->id) }}" class="btn btn-warning btn-sm"><i class="far fa-edit"></i></a>
                            <a href="{{ route('admin.product-category.destroy', $productCategory->id) }}" class="btn btn-danger btn-sm delete"><i class="far fa-trash-alt"></i></a>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection