@extends('layouts.admin')
@section('title', 'Tax')


@section('content')
<div class="card mt-3">
    <div class="card-header">
        <h3 class="float-left">Tax</h3>
        <a href="{{ route('admin.tax.create') }}" class="btn btn-primary float-right">Add new</a>
    </div>
    <div class="card-body">
        <table class="table table-hover">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Country</th>
                    <th>Amount</th>
                    <th>Status</th>
                    <th style="width: 150px;">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($taxes as $tax)
                <tr>
                    <td>{{ $tax->name }}</td>
                    <td>{{ $tax->country }}</td>
                    <td>$ {{ $tax->amount }}</td>
                    <td>{{ $tax->tax_status }}</td>
                    <td>
                        <a href="{{ route('admin.tax.edit', $tax->id) }}" class="btn btn-warning btn-sm"><i
                                class="far fa-edit"></i></a>
                        <a href="{{ route('admin.tax.destroy', $tax->id) }}" class="btn btn-danger btn-sm delete"><i
                                class="far fa-trash-alt"></i></a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{ $taxes->links() }}
    </div>
</div>
@endsection