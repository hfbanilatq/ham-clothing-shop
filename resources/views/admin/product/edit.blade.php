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
            <form method="POST" action="{{ route('admin.product.update', ['id' => $viewData['product']->getId()]) }}"
                enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Name:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ $viewData['product']->getName() }}" type="text"
                                    class="form-control">
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
                                    <option value="White" @selected($viewData['product']->getColor() === 'White')> White </option>
                                    <option value="Black" @selected($viewData['product']->getColor() === 'Black')> Black </option>
                                    <option value="Red" @selected($viewData['product']->getColor() === 'Red')> Red </option>
                                    <option value="Orange" @selected($viewData['product']->getColor() === 'Orange')> Orange </option>
                                    <option value="Green" @selected($viewData['product']->getColor() === 'Green')> Green </option>
                                    <option value="Gray" @selected($viewData['product']->getColor() === 'Gray')> Gray </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-6 col-md-8 col-sm-10 col-form-label">Size:</label>
                            <div class="col-lg-6 col-md-8 col-sm-10">
                                <select name="size">
                                    <option value="S" @selected($viewData['product']->getSize() === 'S')> S </option>
                                    <option value="M" @selected($viewData['product']->getSize() === 'M')> M </option>
                                    <option value="XM" @selected($viewData['product']->getSize() === 'XM')> XM </option>
                                    <option value="L" @selected($viewData['product']->getSize() === 'L')> L </option>
                                    <option value="XL" @selected($viewData['product']->getSize() === 'XL')> XL </option>
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
                                        <option value="{{ $category->getId() }}" @selected($viewData['product']->getCategory()->getId() === $category->getId())>
                                            {{ $category->getDescription() }}
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
                                <input name="price" value="{{ $viewData['product']->getPrice() }}" type="number"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Quantitiy In Stock:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="quantity_in_stock" value="{{ $viewData['product']->getQuantityInStock() }}" type="number"
                                    class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-md-8 col-sm-12 col-form-label">Image:</label>
                            <div class="col-lg-8 col-md-6 col-sm-12">
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
                    <textarea class="form-control" name="description" rows="3">{{ $viewData['product']->getDescription() }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection
