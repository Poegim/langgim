@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="p-0 sm:p-4 sm:rounded shadow-xl bg-slate-800 max-w-sm sm:max-w-3xl mx-auto mt-6 sm:mt-10">
        <div >
            <div class="text-lg px-4 pt-4">
                <div>
                {{ $title }}
                </div>
            </div>

            <div>
                <div class="p-4">
                    {{ $content }}
                </div>
            </div>
        </div>

        <div class="p-2 bg-slate-900 text-right border-t border-gray-500 sm:border-0">
                <div class="md:mr-1/2">
                    {{ $footer }}
                </div>
        </div>
    </div>

</x-jet-modal>
