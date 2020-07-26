@extends('layouts.admin')
@section('title', 'Brands')


@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h3 class="float-left">Brands</h3>
        <a href="{{ route('admin.brand.create') }}" class="btn btn-primary float-right">Add new</a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Logo</th>
                    <th>Status</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($brands as $brand)
                <tr>
                    <td>{{ $brand->name }}</td>
                    <td>{{ $brand->slug }}</td>
                    @if($brand->logo)
                    <td><img src="{{ asset($brand->logo) }}" height="50" alt=""></td>
                    @else
                    <td>No Logo</td>
                    @endif
                    <td>{{ $brand->status }}</td>
                    <td>
                        <a href="{{ route('admin.brand.edit', $brand->id) }}" class="btn btn-warning btn-sm"><i
                                class="far fa-edit"></i></a>
                        <a href="{{ route('admin.brand.destroy', $brand->id) }}" class="btn btn-danger btn-sm delete"><i
                                class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $brands->links() }}
    </div>
</div>
@endsection