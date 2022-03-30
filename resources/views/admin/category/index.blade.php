@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')

    <table class="table container">
        <thead class="thead-dark">
            <tr class="text-center row">
                <th scope="col" class="col">Id</th>
                <th scope="col" class="col">Name</th>
                <th scope="col" class="col">Category</th>
                <th scope="col" class="col">Price</th>
                <th scope="col" class="col">Stock</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($viewData['products'] as $product)
                <tr class="text-center row">
                    <th class="col d-flex align-items-center justify-content-center">{{ $product->getId() }}</th>
                    <td class="col d-flex align-items-center justify-content-center">{{ $product->getName() }}</td>
                    <td class="col d-flex align-items-center justify-content-center">
                        {{ $product->getCategory()->getDescription() }}</td>
                    <td class="col d-flex align-items-center justify-content-center">{{ $product->getPrice() }}</td>
                    @if ($product->getQuantityInStock() === 0)
                        <td class="col red-text d-flex align-items-center justify-content-center">
                            {{ $product->getQuantityInStock() }}</td>
                    @else
                        <td class="col d-flex align-items-center justify-content-center">
                            {{ $product->getQuantityInStock() }} </td>
                    @endif

                    <th>
                        <form action={{ route('admin.product.edit', ['id' => $product->getId()]) }} id="{{ $product->getId().'form-edit' }}" method="GET">
                            @csrf
                            <button type="submit" form="{{ 'form-create' }}" class="btn-list btn btn-info">
                                Edit
                            </button>
                        </form>
                    </th>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
