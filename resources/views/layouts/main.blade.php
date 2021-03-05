@extends('layouts.app')
@section('main')
    <div id="app">
        @yield('content-top')
        @yield('content')
        @yield('content-bottom')
        @auth()
            <logout-component>
                <form id="logoutForm" action="{{ route('logout') }}" method="POST">
                    @csrf
                </form>
            </logout-component>
        @endauth

        <notification />
    </div>
@endsection
@section('footer')
    @stack('footer-top')
    <footer class="footer">
        <div class="content has-text-centered">
            <p>
                © {{ now()->year }} John Edisson Ortiz, All rights reserved
            </p>
            <a href="https://bulma.io" target="_blank">
                <img src="https://bulma.io/images/made-with-bulma--white.png" alt="Made with Bulma" width="128" height="24">
            </a>
        </div>
    </footer>
@endsection
