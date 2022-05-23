@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">
        <div class="card">
            <div class="card-header">
                {{__('cart.products.cart')}}
            </div>
            <div class="card-body">
                <table class="table table-bordered table-striped text-center">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">{{__('home.name')}}</th>
                            <th scope="col">{{__('home.price')}}</th>
                            <th scope="col">{{__('home.quantity')}}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($viewData['products'] as $product)
                            <tr>
                                <td>{{ $product->getId() }}</td>
                                <td>{{ $product->getName() }}</td>
                                <td>${{ $product->getPrice() }}</td>
                                <td>{{ session('products')[$product->getId()] }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                <div class="row">
                    <div class="text-end">
                        <h1 <b>{{__('cart.total.pay')}}:</b> ${{ $viewData['total'] }}</h1>
                        <a href="{{route('product.index')}}" class="btn btn-primary">{{__('cart.back')}}</a>
                        @if (count($viewData['products']) > 0)
                        <form action="{{ route('cart.purchase') }}" method="GET">
                                <button type="submit" class="btn bg-primary text-white mb-2"
                                {{ $viewData['disabled'] ? 'disabled' : '' }}>{{__('cart.purchase')}} {{ $viewData['disabled'] }}</button>
                        </form>                       
                            <a href="{{ route('cart.delete') }}" class="btn btn-danger mb-2">{{__('cart.remove')}}</a>
                        @endif
                        @if ($viewData['disabled'])
                        <div class="col red-text d-flex align-items-center justify-content-center">
                            {{__('cart.no.money')}}</div>
                        @endif
    
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
