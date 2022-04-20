@extends('layouts.admin')
@section('title', $viewData["title"])
@section('content')
<div class="card">
    <div class="card-header">
        {{__('adminpage.ap.home.page')}}
    </div>
    <div class="card-body">
        {{__('adminpage.welcome')}}
    </div>
</div>
@endsection