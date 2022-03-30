@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            Create Products
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.goal.store') }}" enctype="multipart/form-data">
                @csrf
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Description</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="description" value="{{ old('description') }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Cant Publications</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="cant_publications" value="{{ old('cant_publications') }}" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">Activable Discount</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="activable_discount" value="{{ old('activable_discount') }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>
@endsection