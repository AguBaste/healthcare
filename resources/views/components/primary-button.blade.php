<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center p-2 bg-teal-500  border shadow-xl   rounded font-semibold text-xs text-white  uppercase ']) }}>
    {{ $slot }}
</button>
