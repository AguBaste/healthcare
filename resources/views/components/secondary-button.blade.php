<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center p-2  font-semibold text-xs text-white  uppercase']) }}>
    {{ $slot }}
</button>
