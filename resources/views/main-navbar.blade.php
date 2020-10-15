<b-navbar type="is-white" wrapper-class="container is-max-desktop" :transparent="true">
    <template slot="brand">
        <b-navbar-item href="{{ url('') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="{{ config('site.title') }}">
        </b-navbar-item>
    </template>
    <template slot="start">
        <b-navbar-item href="{{ url('') }}">
            @lang('Blog')
        </b-navbar-item>
        @stack('main-navbar-start')
    </template>
    <template slot="end">
        @auth()
            <b-navbar-dropdown label="{{ auth()->user()->name }}" boxed collapsible>
                <b-navbar-item @click="$emit('auth:logout')">
                    @lang('Logout')
                </b-navbar-item>
            </b-navbar-dropdown>
        @endauth
        @stack('main-navbar-end')
    </template>
</b-navbar>
