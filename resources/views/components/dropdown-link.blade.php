<a {{ $attributes->merge([
    'class' => 'block w-full px-4 py-2 text-start text-sm leading-5 text-gray-800 bg-white hover:bg-gray-200 focus:outline-none focus:bg-gray-300 transition duration-150 ease-in-out'
]) }}>
    {{ $slot }}
</a>