@extends('layouts.app')
@section('content')
    <div id="categorias" class="col-sm-2 bg-primary text-center mt-3 ps-4 pe-2 ">
        <h2 class="pt-3">Categorías</h2>
        <nav class="pe-5">
            <ul class=" rounded">
                <li><a href="#hombres">Hombres</a></li>
                <li><a href="#mujeres">mujeres</a></li>
                <li><a href="#juvenil">juvenil</a></li>
                <li><a href="#niños">niños</a></li>
                <li><a href="#bebes">bebes</a></li>
            </ul>
        </nav>
    </div>

    <div id="productos" class="col-sm-10 bg-primary mt-3 ps-3 pe-3 text-center">
        <h2 class="pt-3">Productos</h2>
        <div id="buscador" class="row bg-primary m-1 me-3 text-center d-flex justify-content-around pb-3 pt-3">
            <div class="col-sm-12 bg-secondary ms-3 rounded m-1">
                <form class="d-flex justify-content-around pb-2">
                    <input class="form-control me-2" type="text" placeholder="buscar">
                    <button class="button m-2 border" type="button">Buscar</button>
                    <select name="categorias" id="categorias" class="button m-2 border">
                        <option value="hombres"><a href="#hombres">Hombres</a></option>
                        <option value="mujeres"><a href="#mujeres">Mujeres</a></option>
                        <option value="juveniles"><a href="#juveniles">juveniles</a></option>
                        <option value="niños"><a href="#niños">niños</a></option>
                        <option value="bebes"><a href="#bebes">bebes</a></option>
                    </select>
                </form>
            </div>
            <div class="col-sm-2">
            </div>
        </div>
        <div class="row bg-primary text-center m-2 mt-3 pt-3 ps-3">
            @foreach ($viewData['products'] as $product)
                <div class="col-sm-4 bg-secondary mb-3 pb-3 pt-3">
                    <figure>
                        <h3>{{ $product['name'] }}</h3>
                        <img src="{{ asset('/storage/' . $product->getImage()) }}" class="card-img-top">
                        <figcaption><a class="button-p"
                                href="{{ route('product.show', ['id' => $product['id']]) }}">$ {{ $product['price'] }}
                                pesos</a></figcaption>
                    </figure>
                </div>
            @endforeach
        </div>

    </div>
    </div>
@endsection
