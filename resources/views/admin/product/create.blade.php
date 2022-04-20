@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
        {{__('adminpage.create.products')}}
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
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{__('home.name')}}:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="name" value="{{ old('name') }}" type="text" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-6 col-md-8 col-sm-12 col-form-label">{{__('adminpage.color')}}:</label>
                            <div class="col-lg-6 col-md-8 col-sm-12">
                                <select name="color">
                                    <option value="White"> {{__('adminpage.color.white')}} </option>
                                    <option value="Black"> {{__('adminpage.color.black')}} </option>
                                    <option value="Red"> {{__('adminpage.color.red')}} </option>
                                    <option value="Orange"> {{__('adminpage.color.orange')}} </option>
                                    <option value="Green"> {{__('adminpage.color.green')}} </option>
                                    <option value="Gray"> {{__('adminpage.color.gray')}} </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-6 col-md-8 col-sm-12 col-form-label">{{__('adminpage.size')}}:</label>
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
                            <label class="col-lg-6 col-md-8 col-sm-12 col-form-label">{{__('home.category')}}:</label>
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
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{('home.price')}}:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="price" value="{{ old('price') }}" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{__('adminpage.q.stock')}}:</label>
                            <div class="col-lg-10 col-md-6 col-sm-12">
                                <input name="quantity_in_stock" value="{{ old('quantity_in_stock') }}" type="number" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col">
                        <div class="mb-3 row">
                            <label class="col-lg-4 col-md-8 col-sm-12 col-form-label"> {{__('home.img')}}:</label>
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
                    <label class="form-label"> {{__('home.desc')}}</label>
                    <textarea class="form-control" name="description" rows="3">{{ old('description') }}</textarea>
                </div>
                <button type="submit" class="btn btn-primary"> {{__('home.submit')}}</button>
            </form>
        </div>
    </div>
@endsection
