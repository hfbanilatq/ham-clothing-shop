@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="card">
        <div class="card-header">
            Products in Cart
        </div>
        <div class="card-body">
            <table class="table table-bordered table-striped text-center">
                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Name</th>
                        <th scope="col">Price</th>
                        <th scope="col">Quantity</th>
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
                    <a class="btn btn-outline-secondary mb-2"><b>Total to pay:</b> ${{ $viewData['total'] }}</a>
                    @if (count($viewData['products']) > 0)

                    <form action="{{ route('cart.purchase') }}" method="GET">
                            <button type="submit" class="btn bg-primary text-white mb-2"
                            {{ $viewData['disabled'] ? 'disabled' : '' }}>Purchase {{ $viewData['disabled'] }}</button>
                    </form>                       

                        <a href="{{ route('cart.delete') }}">
                            <button class="btn btn-danger mb-2">
                                Remove all products from Cart
                            </button>
                        </a>
                    @endif
                    @if ($viewData['disabled'])
                    <div class="col red-text d-flex align-items-center justify-content-center">
                        Doesn't have enough money in your balance</div>
                    @endif

                </div>
            </div>
        </div>
    </div>
@endsection
