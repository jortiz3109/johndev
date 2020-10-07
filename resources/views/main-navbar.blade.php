<b-navbar type="is-white" wrapper-class="container is-max-desktop" :transparent="true">
    <template slot="brand">
        <b-navbar-item href="{{ url('') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="{{ config('site.title') }}">
        </b-navbar-item>
    </template>
    <template slot="start">
        @stack('main-navbar-start')
    </template>
    <template slot="end">
        @stack('main-navbar-end')
    </template>
</b-navbar>
