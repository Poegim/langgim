<button {{ $attributes->merge(['type' => 'submit', 'class' => 'primary-bg hover:bg-gray-700 focus:outline-none focus:bg-gray-700 focus:ring focus:ring-gray-200 active:bg-red-600  inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest disabled:opacity-25 transition']) }}>
    <span class="w-full">{{ $slot }}</span>
</button>
