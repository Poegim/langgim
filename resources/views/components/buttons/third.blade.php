<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 third-bg border border-transparent rounded-xl font-semibold text-lg text-white tracking-widest hover:bg-gray-700 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition hover:shadow-lg']) }}>
    <span class="w-full">{{ $slot }}</span>
</button>
