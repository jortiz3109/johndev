@extends('layouts.admin')
@section('admin-content-top')
    <x-module-main-bar title="{{ trans('posts.titles.edit') }}">
        <x-slot name="right">
            <div class="level-item">
                <b-button
                    tag="a"
                    type="is-primary"
                    icon-left="chevron-left"
                    icon-pack="fas"
                    href="{{ route('admin.posts.show', ['post' => $post['id']]) }}">
                    @lang('common.actions.back')
                </b-button>
            </div>
        </x-slot>
    </x-module-main-bar>
@endsection
@section('admin-content')
    <admin-posts-edit :post="{{ json_encode($post) }}"/>
@endsection
