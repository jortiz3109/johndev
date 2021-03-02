<x-module-main-bar title="{{ $texts['title'] }}">
    <x-slot name="right">
        <div class="level-item">
            <b-button
                tag="a"
                type="is-primary"
                icon-left="chevron-left"
                class="is-fullwidth"
                icon-pack="fas"
                href="{{ $routes['back'] }}">
                {{ $texts['back'] }}
            </b-button>
        </div>
    </x-slot>
</x-module-main-bar>
