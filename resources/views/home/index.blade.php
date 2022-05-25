@extends('layouts.app')
@section('content')
    <div id="productos" class="col-md-12 bg-primary mt-3 ps-3 pe-3 text-center">

        <h2 class="pt-3">{{ __('home.products') }}</h2>
        <div class="row d-flex justify-content-around">
            <div class="col-md-8">
                <form action="{{ route('home.search') }}" method="GET">
                    <div class="row">
                        <div class="col-md-6 mt-3">
                            <input type="text" class="form-control" name="search">
                        </div>
                        <select name="category_id" class="btn-list  col-md-2 border">
                            @foreach ($viewData['categories'] as $category)
                                <option value="{{$category->getId()}}">{{$category->getDescription()}}</a></option>
                            @endforeach

                        </select>
                        <button type="submit" class="btn-list btn btn-danger btn-search col-md-2">
                            <i class="bi-search"></i>
                            {{ __('home.search') }}
                        </button>
                    </div>
                    
                </form>
            </div>
            <div class="row bg-primary text-center m-2 mt-3 pt-3 ps-3">
                @foreach ($viewData['products'] as $product)
                    <div class="col-sm-4 mb-3 pb-3 pt-3">
                        <div class="card">
                            <img class="card-img"
                                @if ($storage_type === 'gcp') src="{{ $product->getImage() }}"
                            @else
                            src="{{ asset('/storage/' . $product->getImage()) }}" @endif
                                alt="{{ $product->getName() }}">
                            <div class="card-body">
                                <h4 class="card-title">{{ $product->getName() }}</h4>
                                <h6 class="card-subtitle mb-2 text-muted">
                                    {{ 'Color:' . $product->getColor() }}</h6>
                                <p class="card-text">{{ $product->getDescription() }} </p>
                                <div class="buy d-flex justify-content-between align-items-center">
                                    <div class="price text-success">
                                        <h5 class="mt-4">${{ $product->getPrice() }}</h5>
                                    </div>
                                    <a href="{{ route('product.show', ['id' => $product->getId()]) }}"
                                        class="btn btn-danger mt-3"><i class="fas fa-shopping-cart"></i>
                                        {{ __('home.add.cart') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
