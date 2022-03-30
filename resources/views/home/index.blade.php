@extends('layouts.app')
@section('content')
<div id="productos" class="col-md-12 bg-primary mt-3 ps-3 pe-3 text-center">
    
        <h2 class="pt-3">Products</h2>
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
                        <button type="submit" class="btn-list btn btn-info btn-search col-md-2">
                            <i class="bi-search"></i>
                            Search
                        </button>
                    </div>
                </form>
  
</div>
<div class="row bg-primary text-center m-2 mt-3 pt-3 ps-3">
    @foreach ($viewData['products'] as $product)
    <div class="col-sm-4 bg-secondary mb-3 pb-3 pt-3">
        <center>
            <figure>
                <h3>{{ $product['name'] }}</h3>
                <img src="{{ asset('/storage/' . $product->getImage()) }}" class="card-img-top">
                <figcaption><a class="button-p" href="{{ route('product.show', ['id' => $product['id']]) }}">$
                        {{ $product['price'] }}
                    </a></figcaption>
            </figure>
        </center>
    </div>
    @endforeach
</div>
</div>
</div>

@endsection