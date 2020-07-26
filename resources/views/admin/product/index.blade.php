@extends('layouts.admin')
@section('title', 'Products')


@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h3 class="float-left">Products</h3>
        <a href="{{ route('admin.product.create') }}" class="btn btn-primary float-right">Add new</a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Slug</th>
                    <th>Thumbnail</th>
                    <th>Status</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($products as $product)
                <tr>
                    <td>{{ $product->title }}</td>
                    <td>{{ $product->slug }}</td>
                    @if($product->thumbnail)
                    <td><img src="{{ asset($product->thumbnail) }}" height="50" alt=""></td>
                    @else
                    <td>No Logo</td>
                    @endif
                    <td>{{ $product->productStatus() }}</td>
                    <td>
                        <a href="{{ route('admin.product.show', $product->id) }}" data-info=""
                            class="btn btn-success btn-sm product-modal" data-toggle="modal"
                            data-target="#productModal"><i class="far fa-eye"></i></a>
                        <a href="{{ route('admin.product.edit', $product->id) }}" class="btn btn-warning btn-sm"><i
                                class="far fa-edit"></i></a>
                        <a href="{{ route('admin.product.destroy', $product->id) }}"
                            class="btn btn-danger btn-sm delete"><i class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $products->links() }}
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="productModal" tabindex="-1" role="dialog" aria-labelledby="productModalTitle"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">Product details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <table class="table">
                    <tbody class="modalAppend">

                    </tbody>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('scripts')
<script>
    (function($) {
        $(document).on('click', '.product-modal', function(e) {
            e.preventDefault();
            var product_link = $(this).attr('href')
            // alert(product_link)
            axios.get(product_link)
                .then(res => {
                    $('.modalAppend').html('');
                    if(res.data.title != null) {
                        $('.modalAppend').append(`<tr><td>Name</td><td>${res.data.title}</td></tr>`)
                    }
                    if(res.data.slug != null) {
                        $('.modalAppend').append(`<tr><td>Slug</td><td>${res.data.slug}</td></tr>`)
                    }
                    if(res.data.sku != null) {
                        $('.modalAppend').append(`<tr><td>SKU</td><td>${res.data.sku}</td></tr>`)
                    }
                    if(res.data.qty != null) {
                        $('.modalAppend').append(`<tr><td>Quantity</td><td>${res.data.qty}</td></tr>`)
                    }
                    if(res.data.product_category != null) {
                        $('.modalAppend').append(`<tr><td>Category Name</td><td>${res.data.product_category.name}</td></tr>`)
                    }
                    if(res.data.brand != null) {
                        $('.modalAppend').append(`<tr><td>Brand Name</td><td>${res.data.brand.name}</td></tr>`)
                    }
                    if(res.data.thumbnail != null) {
                        $('.modalAppend').append(`<tr><td>Image</td><td><img src="{{ asset('${res.data.thumbnail}') }}" height="50" /></td></tr>`)
                    }
                    if(res.data.short_description != null) {
                        $('.modalAppend').append(`<tr><td>Short Description</td><td>${res.data.short_description}</td></tr>`)
                    }
                    if(res.data.description != null) {
                        $('.modalAppend').append(`<tr><td>Description</td><td>${res.data.description}</td></tr>`)
                    }
                    if(res.data.price != null) {
                        $('.modalAppend').append(`<tr><td>Price</td><td>${res.data.price}</td></tr>`)
                    }
                    if(res.data.selling_price != null) {
                        $('.modalAppend').append(`<tr><td>Selling Price</td><td>${res.data.selling_price}</td></tr>`)
                    }
                    
                })
                .catch(err => console.log(err))
        })
    })(jQuery)
</script>
@endsection