<button {{ $attributes->merge(['type' => 'submit', 'class' => 'secondary-bg hover:bg-amber-400 focus:outline-none focus:bg-amber-400 focus:ring focus:ring-gray-200 active:bg-red-600  inline-flex items-center justify-center px-4 py-2 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest disabled:opacity-25 transition transition-all duration-300']) }}>
    <span class="w-full">{{ $slot }}</span>
</button>
