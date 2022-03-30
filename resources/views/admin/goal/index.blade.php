@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')

    <table class="table container">
        <thead class="thead-dark">
            <tr class="text-center row">
                <th scope="col" class="col">Id</th>
                <th scope="col" class="col">Description</th>
                <th scope="col" class="col">Action</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($viewData['categories'] as $category)
                <tr class="text-center row">
                    <th class="col d-flex align-items-center justify-content-center">{{ $category->getId() }}</th>
                    <td class="col d-flex align-items-center justify-content-center">{{ $category->getCategorie() }}</td>
                    <td>
                        <form action={{ route('admin.category.edit', ['id' => $category->getId()]) }} id="{{ $category->getId().'form-edit' }}" method="GET">
                            @csrf
                            <button type="submit" form="{{ $category->getId().'form-edit' }}" class="btn-list btn btn-info">
                                Edit
                            </button>
                        </form>
                    </td>

                </tr>
            @endforeach
        </tbody>
    </table>

@endsection
