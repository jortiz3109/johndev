<div class="hero is-small">
    <div class="hero-body">
        <div class="container is-max-desktop">
            <div class="level">
                <div class="level-left">
                    <h1 class="title">
                        @lang('posts.titles.admin')
                    </h1>
                </div>
                <div class="level-right">
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
                </div>
            </div>
        </div>
    </div>
</div>
