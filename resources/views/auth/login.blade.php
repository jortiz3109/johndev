@extends('layouts.app')
@section('content')
    <div class="hero is-medium">
        <div class="hero-body">
            <div class="container">
                <div class="box column is-6 is-offset-3">
                    @if (session('status'))
                        <div class="notification is-primary is-light">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        <b-field label="{{ __('Email') }}"
                                 type="{{ $errors->has('email') ? 'is-danger' : null }}"
                                 message="{{ $errors->first('email') }}">
                            <b-input type="email"
                                     name="email"
                                     id="email"
                                     value="{{ old('email') }}"
                                     maxlength="30"
                                     icon-pack="fas"
                                     icon="envelope"
                                    required>
                            </b-input>
                        </b-field>

                        <b-field label="{{ __('Password') }}"
                                 type="{{ $errors->has('password') ? 'is-danger' : null }}"
                                 message="{{ $errors->first('password') }}">
                            <b-input type="password"
                                     name="password"
                                     id="password"
                                     value="{{ old('password') }}"
                                     maxlength="30"
                                     icon-pack="fas"
                                     icon="lock"
                                     required>
                            </b-input>
                        </b-field>

                        <label class="checkbox mb-5">
                            <input type="checkbox" name="remember" id="remember">
                            @lang('Remember me')
                        </label>

                        <button type="submit" class="button is-primary is-fullwidth">
                            <b-icon pack="fas" icon="save"></b-icon>&nbsp;
                            @lang('Login')
                        </button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
