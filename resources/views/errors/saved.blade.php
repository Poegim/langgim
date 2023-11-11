<x-app-layout>
    <div class="w-full mt-12">
        <div class="flex justify-center">
            <div class="rounded bg-blue-400 text-white font-bold p-2 flex space-x-2">
                <x-clarity-success-standard-line class="h-8 my-auto"/>
                <div class="my-auto">
                    {{__('messages.Error saved, you can now close this window. Thanks.')}}
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
