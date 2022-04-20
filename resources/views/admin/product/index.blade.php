@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')
    <div class="row">
        <div class="col-md-9">
            <form action="{{ route('admin.product.search') }}" method="GET">
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="search" value="{{$viewData['search']}}">
                    </div>
                    <button type="submit" class="btn-list btn btn-info btn-search col-md-2">
                        <i class="bi-search"></i>
                            {{__('home.search')}}
                    </button>

                </div>
            </form>
        </div>

        <div class="col-md-3">
            <form action={{ route('admin.product.create') }} id="{{ 'form-create' }}" method="GET">
                @csrf
                <button type="submit" form="{{ 'form-create' }}" class="btn-list btn btn-info">
                {{__('adminpage.create.new.product')}}
                    <i class="bi-plus-circle"></i>
                </button>
            </form>
        </div>
    </div>
    <table class="table container">
        <thead class="thead-dark">
            <tr class="text-center row">
                <th scope="col" class="col">Id</th>
                <th scope="col" class="col">{{__('home.name')}}</th>
                <th scope="col" class="col">{{__('home.category')}}</th>
                <th scope="col" class="col">{{__('home.price')}}</th>
                <th scope="col" class="col">{{__('adminpage.stock')}}</th>
                <th scope="col" class="col">{{__('home.actions')}}</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($viewData['products'] as $product)
                <tr class="text-center row">
                    <td class="col d-flex align-items-center justify-content-center">{{ $product->getId() }}</td>
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

                    <td class="col d-flex align-items-center justify-content-center">
                        <div class="form-button-container">
                            <form action={{ route('admin.product.edit', ['id' => $product->getId()]) }}
                                id="{{ $product->getId() . 'form-edit' }}" method="GET">
                                @csrf
                                <button type="submit" form="{{ $product->getId() . 'form-edit' }}"
                                    class="btn-list btn btn-info">
                                    <i class="bi-pencil-square"></i>
                                </button>
                            </form>
                        </div>

                        <div class="form-button-container">
                            <form action="{{ route('admin.product.delete', $product->getId()) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger">
                                    <i class="bi-trash"></i>
                                </button>
                            </form>
                        </div>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>


@endsection
