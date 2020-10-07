@extends('layouts.admin')
@section('admin-content-top')
    @include('admin.posts.__navbar')
@endsection
@section('admin-content')
    <admin-posts-table></admin-posts-table>
    <delete-item></delete-item>
@endsection
