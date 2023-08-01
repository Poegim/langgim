@props(['id' => null, 'maxWidth' => null])

<x-old-modal :id="$id" :maxWidth="$maxWidth" {{ $attributes }}>
    <div class="px-6 py-4">
        <div class="text-lg">
            {{ $title }}
        </div>

        <div class="mt-4">
            {{ $content }}
        </div>
    </div>

    <div class="px-6 py-4 bg-slate-900 text-right {{config('settings.color1')}}">
        {{ $footer }}
    </div>
</x-old-modal>
