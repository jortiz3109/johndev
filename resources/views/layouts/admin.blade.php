@extends('layouts.app')
@push('main-navbar-start')
    <b-navbar-dropdown label="{{ __('admin.navbar.manage') }}" boxed>
        <b-navbar-item href="{{ route('admin.posts.index') }}">
            {{ __('posts.titles.index') }}
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
