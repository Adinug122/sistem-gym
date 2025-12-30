<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-gym-500 border border-transparent rounded-md font-semibold text-xs text-white  uppercase tracking-widest hover:bg-red-400  focus:bg-gray-700  active:bg-red-500  focus:outline-none focus:ring-2 focus:red-600 focus:ring-offset-2  transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
