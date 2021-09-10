@extends('layouts.admin.app')

@section('admin-content')
<a href="{{ url()->previous() }}" class="btn btn-outline-primary" role="button" aria-pressed="true">
    <span data-feather="arrow-left-circle"></span> Back
</a>
<fieldset>
    <legend>New Meal</legend>
    <form action="{{ route('admin.meals.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="row">
            <div class="col">
                <div class="form-group">
                    <label for="name">Name</label>
                    <input type="text" name="name" id="name" value="{{ old('name') }}" class="form-control @error('name') {{'is-invalid'}} @enderror" placeholder="" >
                    @error('name')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                    <label for="photo">Photo</label>
                    <input type="file" name="photo" id="photo" value="{{ old('photo') }}" class="form-control @error('photo') {{'is-invalid'}} @enderror" placeholder="" >
                    @error('photo')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
        <div class="form-group">
            <label for="description">Description</label>
            <textarea name="description" id="description" class="form-control @error('description') {{'is-invalid'}} @enderror" placeholder="" >{{ old('description') }}</textarea>
            @error('description')<div class="text-danger">{{ $message }}</div>@enderror
        </div>
        <div class="row">
            <div class="col">
                <div class="form-group">
                  <label for="stock_quantity">Quantity in stock</label>
                  <input type="number" name="stock_quantity" min="1" id="stock_quantity" value="{{ old('stock_quantity') }}" class="form-control @error('stock_quantity') {{'is-invalid'}} @enderror" placeholder="" >
                  @error('stock_quantity')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="buy_price">Buy price</label>
                  <input type="number" name="buy_price" min="0" id="buy_price" value="{{ old('buy_price') }}" class="form-control @error('buy_price') {{'is-invalid'}} @enderror" placeholder="" >
                  @error('buy_price')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            </div>
            <div class="col">
                <div class="form-group">
                  <label for="sale_price">Sell price</label>
                  <input type="number" name="sale_price" min="0" id="sale_price" value="{{ old('sale_price') }}" class="form-control @error('sale_price') {{'is-invalid'}} @enderror" placeholder="" >
                  @error('sale_price')<div class="text-danger">{{ $message }}</div>@enderror
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <button type="submit" class="btn btn-outline-success btn-block">Save</button>
            </div>
            <div class="col">
                <button type="reset" class="btn btn-outline-warning btn-block">Cancel</button>
            </div>
        </div>
    </form>
</fieldset>
@endsection
