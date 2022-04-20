@extends('layouts.admin')
@section('title', $viewData['title'])
@section('content')
    <div class="card mb-4">
        <div class="card-header">
            {{__('adminpage.create.goal')}}
        </div>
        <div class="card-body">
            @if ($errors->any())
                <ul class="alert alert-danger list-unstyled">
                    @foreach ($errors->all() as $error)
                        <li>- {{ $error }}</li>
                    @endforeach
                </ul>
            @endif
            <form method="POST" action="{{ route('admin.goal.update', ['id' => $viewData['goal']->getId()]) }}" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{__('home.desc')}}</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="description" value="{{ $viewData['goal']->getDescription() }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{('adminpage.cant.publication')}}</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="cant_publications" value="{{ $viewData['goal']->getCantPublications()  }}" type="number" class="form-control">
                        </div>
                    </div>
                </div>
                <div class="col">
                    <div class="mb-3 row">
                        <label class="col-lg-2 col-md-6 col-sm-12 col-form-label">{{('adminpage.act.disc')}}</label>
                        <div class="col-lg-10 col-md-6 col-sm-12">
                            <input name="activable_discount" value="{{ $viewData['goal']->getActivableDiscount()  }}" type="text" class="form-control">
                        </div>
                    </div>
                </div>
            
                <button type="submit" class="btn btn-primary">{{('home.submit')}}</button>
            </form>
        </div>
    </div>
@endsection
