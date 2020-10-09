@extends('layouts.admin')
@section('admin-content-top')
    <x-module-main-bar title="{{ trans('posts.titles.admin') }}">
        <div class="level-item">
            <b-button
                tag="a"
                type="is-primary"
                icon-left="plus"
                icon-pack="fas"
                href="{{ route('admin.posts.create') }}">
                @lang('common.actions.create')
            </b-button>
        </div>
    </x-module-main-bar>
@endsection
@section('admin-content')
    <admin-posts-table></admin-posts-table>
    <delete-item></delete-item>
@endsection
