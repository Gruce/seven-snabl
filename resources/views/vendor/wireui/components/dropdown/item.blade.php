<a {{ $attributes->merge(['class' => $getClasses()]) }}>
    @if ($icon)
        <x-dynamic-component
            :component="WireUiComponent::resolve('icon')"
            :name="$icon"
            class="w-5 h-5 ml-2"
        />
    @endif

    {{ $label ?? $slot }}
</a>
