<x-app-layout>
    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full overflow-hidden align-middle">

                <form method="POST" action="{{route('admin.categories.update', $category->id)}}">
                    @method('PUT')
                    @csrf

                    <div>
                        <div>
                            <x-jet-label for="name">Name:</x-jet-label>
                            <x-jet-input name="name" id="name" type="text" value="{{$category->name}}" />
                            <x-jet-input-error for="name"/>
                        </div>
                    </div>
                    <div class="mt-2">
                        <x-jet-button>Save</x-jet-button>
                    </div>
                </form>


            </div>
        </div>

    </div>

</x-app-layout>
