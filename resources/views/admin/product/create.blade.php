@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Create Products
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.product.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-6 col-md-8 col-sm-12 col-form-label">Color:</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <select name="color">
                                    <option value="White"> White </option>
                                    <option value="Black"> Black </option>
                                    <option value="Red"> Red </option>
                                    <option value="Orange"> Orange </option>
                                    <option value="Green"> Green </option>
                                    <option value="Gray"> Gray </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-6 col-md-8 col-sm-12 col-form-label">Size:</label>
                            <div class="col-lg-6 col-md-8 col-sm-10">
                                <select name="size">
                                    <option value="S"> S </option>
                                    <option value="M"> M </option>
                                    <option value="XM"> XM </option>
                                    <option value="L"> L </option>
                                    <option value="XL"> XL </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-6 col-md-8 col-sm-12 col-form-label">Category:</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <select name="category_id">
                                    @foreach ($viewData['categories'] as $category)
                                        <option value="{{ $category->getId() }}">{{ $category->getDescription() }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Price:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="price" value="{{ old('price') }}" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Quantitiy In Stock:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="quantity_in_stock" value="{{ old('quantity_in_stock') }}" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-md-8 col-sm-12 col-form-label">Image:</label>
                            <div class="col-lg-8 col-md-12 ">
                                <input class="form-control" type="file" name="image">
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        &nbsp;
                    </div>
                </div>
                <div class="mb-3">
                    <label class="form-label">Description</label>
                    <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
