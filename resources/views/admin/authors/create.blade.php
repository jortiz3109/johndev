@extends('layouts.admin')
@section('admin-content-top')
    @include('admin.partials.module_main_bar')
@endsection
@section('admin-content')
    <form action="{{ $routes['action'] }}" method="POST" id="authorForm" enctype="multipart/form-data">
        @include('admin.authors.partials.form')
    </form>
@endsection
