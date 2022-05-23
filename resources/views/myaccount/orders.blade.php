@extends('layouts.app')
@section('title', $viewData['title'])
@section('subtitle', $viewData['subtitle'])
@section('content')
    <div class="container">

        @forelse ($viewData["orders"] as $order)
            <div class="card mb-4">
                <div class="card-header">
                    {{ __('home.order') }} #{{ $order->getId() }}
                </div>
                <div class="card-body">
                    <b>Date:</b> {{ $order->getCreatedAt() }}<br />
                    <b>Total:</b> ${{ $order->getTotal() }}<br />
                    <table class="table table-bordered table-striped text-center mt-3">
                        <thead>
                            <tr>
                                <th scope="col">ID</th>
                                <th scope="col">{{ __('home.name') }}</th>
                                <th scope="col">{{ __('home.price') }}</th>
                                <th scope="col">{{ __('home.quantity') }}</th>
                                <th scope="col">{{ __('order.add-publication') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($order->getItems() as $item)
                                <tr>
                                    <td>{{ $item->getId() }}</td>
                                    <td>
                                        <a class="link-success"
                                            href="{{ route('product.show', ['id' => $item->getProduct()->getId()]) }}">
                                            {{ $item->getProduct()->getName() }}
                                        </a>
                                    </td>
                                    <td>${{ $item->getPrice() }}</td>
                                    <td>{{ $item->getQuantity() }}</td>
                                    <td class="text-center">
                                        <div class="form-container">
                                            <form method="POST" action="{{ route('publication.store') }}"
                                                enctype="multipart/form-data">
                                                @csrf
                                                <input class="form-control" type="hidden" name="productId"
                                                    value="{{ $item->getProduct()->getId() }}">
                                                <div class="row">
                                                    <div class="col">
                                                        <div class="mb-3 row">
                                                            <div class="col-lg-6 col-md-10 ">
                                                                <input class="form-control" type="file" name="image">
                                                            </div>

                                                            <button class="col-lg-4 col-md-6 col-sm- col-form-label"
                                                                type="submit" class="btn btn-primary">
                                                                {{ __('order.add-publication') }}</button>
                                                        </div>
                                                    </div>
                                                </div>
                                            </form>
                                        </div>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        @empty
            <div class="alert alert-danger" role="alert">
                {{ __('orders.nothing') }}
            </div>
        @endforelse
    </div>
@endsection
