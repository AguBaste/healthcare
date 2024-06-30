<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-teal-500 dark:bg-gray-200 border border-transparent rounded-md font-semibold text-xs text-white  uppercase ']) }}>
    {{ $slot }}
</button>
