<b-dropdown aria-role="list" position="is-bottom-left">
    <template #trigger>
        <b-button
            icon-pack="fas"
            type="is-primary is-light"
            size="is-small"
            icon-left="bars" />
    </template>

    <b-dropdown-item has-link aria-role="menuitem" align="left">
        <a href="{{ route('admin.posts.show', $post) }}">
            <b-icon pack="fas" icon="eye"></b-icon>
            @lang('common.actions.show')
        </a>
    </b-dropdown-item>

    <b-dropdown-item has-link aria-role="menuitem" align="left">
        <a href="{{ route('admin.posts.edit', $post) }}">
            <b-icon pack="fas" icon="edit"></b-icon>
            @lang('common.actions.edit')
        </a>
    </b-dropdown-item>
</b-dropdown>
