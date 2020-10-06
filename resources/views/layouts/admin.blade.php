@extends('layouts.app')
@push('main-navbar-start')
    <b-navbar-item href="{{ url('') }}">
        {{ __('site.navbar.blog') }}
    </b-navbar-item>
    <b-navbar-dropdown label="{{ __('admin.navbar.manage') }}" :boxed="true">
        <b-navbar-item href="{{ route('admin.posts.index') }}">
            {{ __('posts.titles.admin') }}
        </b-navbar-item>
    </b-navbar-dropdown>
@endpush
@section('content-top')
    @yield('admin-content-top')
@endsection
@section('content')
    <div class="box container is-max-desktop">
        @yield('admin-content')
    </div>
@endsection
@section('content-bottom')
    <div class="container is-max-desktop">
        @yield('admin-content-bottom')
    </div>
@endsection
