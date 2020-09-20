<nav class="navbar is-white" role="navigation" aria-label="main navigation">
    <div class="container">
        <div class="navbar-brand">
            <a class="navbar-item" href="{{ url('') }}">
                <img src="{{ asset('images/logo.svg') }}" alt="{{ config('site.title') }}">
            </a>

            <a role="button" class="navbar-burger burger" aria-label="menu" aria-expanded="false" data-target="siteMainNavbar">
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
                <span aria-hidden="true"></span>
            </a>
        </div>

        <div id="siteMainNavbar" class="navbar-menu">
            <div class="navbar-start">

            </div>
            <div class="navbar-end">
                <div class="navbar-item">
                    <a href="{{ config('site.links.github') }}" class="button is-white">
                        <span class="icon is-small"><i class="fab fa-github"></i></span>
                    </a>
                </div>
                <div class="navbar-item">
                    <a href="{{ config('site.links.twitter') }}" class="button is-white">
                        <span class="icon is-small"><i class="fab fa-twitter"></i></span>
                    </a>
                </div>
                <div class="navbar-item">
                    <a href="{{ url('') }}" class="button is-info">
                        <span class="icon is-small"><i class="fas fa-blog"></i></span>
                        <span>{{ __('site.navbar.blog') }}</span>
                    </a>
                </div>
                <div class="navbar-item">
                    <a href="{{ url('') }}" class="button is-info">
                        <span class="icon is-small"><i class="fas fa-envelope"></i></span>
                        <span>{{ __('site.navbar.contact') }}</span>
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>
