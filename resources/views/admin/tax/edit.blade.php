@extends('layouts.admin')
@section('title', 'Tax')


@section('content')
<form action="{{ route('admin.tax.update', $tax->id)}}" method="POST" enctype="multipart/form-data">
    @csrf
    @method('PUT')
    <div class="row mt-3">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <h3>Edit Tax</h3>
                </div>
                <div class="card-body">
                    <div class="form-group">
                        <label for="name">Tax name</label>
                        <input type="text" class="form-control" name="name" id="name" value="{{ $tax->name }}">
                        @error('name')
                        <span class="text-danger">{{ $message }}</span>
                        @enderror
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="country">Country</label>
                                <select name="country" id="country" class="form-control">
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description">Tax description</label>
                        <textarea name="description" id="description" cols="30" rows="4"
                            class="form-control textarea">{{ $tax->description }}</textarea>
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
                        <option value="1" {{ $tax->status == 1  ? "selected='selected'" : '' }}>
                            Active
                        </option>
                        <option value="0" {{ $tax->status == 0  ? "selected='selected'" : '' }}>
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
                            value="{{ $tax->amount }}">
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

    countryList.getNames().forEach(element => {
        selected = '{{ $tax->country }}' == element ? "selected='selected'" : ''
        option_list += "<option value='"+element+"' "+selected+">"+element+"</option>";
    })
    $('#country').html(option_list)
</script>
@endsection