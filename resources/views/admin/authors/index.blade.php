@extends('layouts.admin')
@section('admin-content-top')
    <x-module-main-bar title="{{ trans('authors.titles.index') }}">
        <x-slot name="right">
            <div class="level-item">
                <b-button
                    tag="a"
                    type="is-primary"
                    class="is-fullwidth"
                    icon-left="plus"
                    icon-pack="fas"
                    href="{{ route('admin.authors.create') }}">
                    @lang('common.actions.create')
                </b-button>
            </div>
        </x-slot>
    </x-module-main-bar>
@endsection
@section('admin-content')
    <table class="table is-hoverable is-striped is-fullwidth">
        <thead>
        <tr>
            <th>@lang('authors.avatar')</th>
            <th>@lang('authors.name')</th>
            <th>@lang('authors.email')</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach($authors as $author)
            <tr>
                <td>
                    <img class="image is-rounded is-24x24" src="{{ $author->avatar }}" alt="@lang('author.avatar_for', ['name', $author->name])">
                </td>
                <td>{{ $author->name }}</td>
                <td>{{ $author->email }}</td>
                <td></td></tr>
        @endforeach
        </tbody>
    </table>
@endsection
