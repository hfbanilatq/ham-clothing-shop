@extends('layouts.admin')

@section('title', $viewData['title'])

@section('content')

    <div class="row">
        <div class="col-md-9">
            <form action="{{ route('admin.goal.search') }}" method="GET">
                <div class="row">
                    <div class="col-md-9">
                        <input type="text" class="form-control" name="search" value="{{$viewData['search']}}">
                    </div>
                    <button type="submit" class="btn-list btn btn-info btn-search col-md-2">
                        <i class="bi-search"></i>
                        Search
                    </button>

                </div>
            </form>
        </div>
        <div class="col-md-3">
            <form action={{ route('admin.goal.create') }} id="{{ 'form-create' }}" method="GET">
                @csrf
                <button type="submit" form="{{ 'form-create' }}" class="btn-list btn btn-info">
                    Create new Goal
                    <i class="bi-plus-circle"></i>
                </button>
            </form>
        </div>
    </div>

    <table class="table container">
        <thead class="thead-dark">
            <tr class="text-center row">
                <th scope="col" class="col">Id</th>
                <th scope="col" class="col">Description</th>
                <th scope="col" class="col">Cant Publications</th>
                <th scope="col" class="col">Activable Discount</th>
                <th scope="col" class="col">Action</th>
            </tr>
        </thead>
        <tbody>


            @foreach ($viewData['goals'] as $goal)
                <tr class="text-center row">
                    <td class="col d-flex align-items-center justify-content-center">{{ $goal->getId() }}</td>
                    <td class="col d-flex align-items-center justify-content-center">{{ $goal->getDescription() }}</td>
                    <td class="col d-flex align-items-center justify-content-center">{{ $goal->getCantPublications() }}
                    </td>
                    <td class="col d-flex align-items-center justify-content-center">{{ $goal->getActivableDiscount() }}
                    </td>
                    <td class="col d-flex align-items-center justify-content-center">
                        <div class="form-button-container">
                            <form action={{ route('admin.goal.edit', ['id' => $goal->getId()]) }}
                                id="{{ $goal->getId() . 'form-edit' }}" method="GET">
                                @csrf
                                <button type="submit" form="{{ $goal->getId() . 'form-edit' }}"
                                    class="btn-list btn btn-info">
                                    <i class="bi-pencil-square"></i>
                                </button>
                            </form>
                        </div>

                        <div class="form-button-container">
                            <form action="{{ route('admin.goal.delete', $goal->getId()) }}" method="post">
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
