@extends('layouts.admin')
@section('admin-content-top')
    <x-module-main-bar title="{{ trans('posts.titles.index') }}">
        <x-slot name="right">
        <div class="level-item">
            <b-button
                tag="a"
                type="is-primary"
                class="is-fullwidth-mobile"
                icon-left="plus"
                icon-pack="fas"
                href="{{ route('admin.posts.create') }}">
                @lang('common.actions.create')
            </b-button>
        </div>
        </x-slot>
    </x-module-main-bar>
@endsection
@section('admin-content')
    <admin-posts-table></admin-posts-table>
    <delete-item></delete-item>
@endsection
