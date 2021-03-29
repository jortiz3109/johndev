<b-navbar type="is-white" wrapper-class="container" :transparent="true">
    <template slot="brand">
        <b-navbar-item href="{{ url('') }}">
            <img src="{{ asset('images/logo.svg') }}" alt="{{ config('site.title') }}">
        </b-navbar-item>
    </template>
    <template slot="start">
        <b-navbar-item href="{{ route('posts.index') }}">
            @lang('Blog')
        </b-navbar-item>
        @auth()
            <b-navbar-dropdown label="{{ __('admin.navbar.manage') }}" boxed collapsible>
                <b-navbar-item href="{{ route('admin.posts.index') }}">
                    {{ __('posts.titles.index') }}
                </b-navbar-item>
                <b-navbar-item href="{{ route('admin.authors.index') }}">
                    {{ __('authors.titles.index') }}
                </b-navbar-item>
            </b-navbar-dropdown>
        @endauth
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
