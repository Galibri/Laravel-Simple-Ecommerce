@extends('layouts.admin')
@section('title', 'Shipping')


@section('content')
<form action="{{ route('admin.shipping.update', $shipping->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Shipping</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Shipping name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $shipping->name }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="countries">Countries</label>
                                <select name="countries[]" id="countries" class="form-control select2"
                                    multiple="multiple">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Shipping description</label>
                        <textarea name="description" id="description" cols="30" rows="4"
                            class="form-control textarea">{{ $shipping->description }}</textarea>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-md-3 offset-md-1">
            <div class="card">
                <div class="card-header">
                    <label for="status">Status</label>
                </div>
                <div class="card-body">
                    <select name="status" id="status" class="form-control">
                        <option value="1" {{ $shipping->status == 1  ? "selected='selected'" : '' }}>
                            Active
                        </option>
                        <option value="0" {{ $shipping->status == 0  ? "selected='selected'" : '' }}>
                            Inactive
                        </option>
                    </select>
                </div>
            </div>
            <div class="card">
                <div class="card-header">
                    <label for="amount">Amount</label>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <input type="number" name="amount" id="amount" step="any" min="0" class="form-control"
                            value="{{ $shipping->amount }}">
                        @error('amount')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                </div>
            </div>
            <div class="card">
                <div class="card-body">
                    <button type="submit" class="btn btn-primary text-light btn-block">Save</button>
                </div>
            </div>
        </div>
    </div>
</form>
@endsection

@section('scripts')
<script>
    let option_list = ''
    let selected = ''
    let selected_str = '{!! $shipping->countries !!}'
    selected_arr = JSON.parse(selected_str)

    countryList.getNames().forEach(element => {
        selected = selected_arr.includes(element) ? "selected='selected'" : ''
        option_list += "<option value='"+element+"' "+selected+">"+element+"</option>";
    })
    $('#countries').html(option_list)
</script>
@endsection