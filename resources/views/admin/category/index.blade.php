@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')

    <table class="table container">
        <thead class="thead-dark">
            <tr class="text-center row">
                <th scope="col" class="col">Id</th>
                <th scope="col" class="col">Description</th>
                <th scope="col" class="col">Actions</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($viewData['categories'] as $category)
                <tr class="text-center row">
                    <td class="col d-flex align-items-center justify-content-center">{{ $category->getId() }}</td>
                    <td class="col d-flex align-items-center justify-content-center">{{ $category->getDescription() }}</td>


                    <td class="col d-flex align-items-center justify-content-center">
                        <form action={{ route('admin.category.edit', ['id' => $category->getId()]) }}
                            id="{{ $category->getId() . 'form-edit' }}" method="GET">
                            @csrf
                            <button type="submit" form="{{ $category->getId() . 'form-edit' }}"
                                class="btn-list btn btn-info">
                                <i class="bi-pencil-square"></i>
                            </button>
                        </form>
                        <form action="{{ route('admin.category.delete', $category->getId()) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-danger">
                                <i class="bi-trash"></i>
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

    <form action={{ route('admin.category.create') }} id="{{ 'form-create' }}" method="GET">
        @csrf
        <button type="submit" form="{{ 'form-create' }}" class="btn-list btn btn-info">
            Create new Category
        </button>
    </form>

@endsection
