@props(['id' => null, 'maxWidth' => null])

<x-jet-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="p-2 rounded shadow m-2 bg-white">
        <div class="px-6 py-4">
            <div class="grid grid-cols-1 md:grid-cols-3 text-lg">
                <div></div>
                <div>
                {{ $title }}
                </div>
                <div></div>
            </div>

            <div class="mt-4">
                <div class="grid grid-cols-1 md:grid-cols-3">
                    <div></div>
                    <div>
                        {{ $content }}
                    </div>
                    <div></div>
                </div>
            </div>
        </div>

        <div class="px-6 py-4 bg-gray-100 text-right">
            <div class="grid grid-cols-1 md:grid-cols-3">
                <div></div>
                <div class="md:mr-1/3">
                    {{ $footer }}
                </div>
                <div></div>
            </div>
        </div>
    </div>

</x-jet-modal>
