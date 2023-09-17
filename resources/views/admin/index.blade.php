<x-app-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>


    <div class="flex justify-center">
        <div class="space-y-2 sm:space-y-0 block bg-slate-800 p-4 rounded w-full max-w-md">
            <div>
                <a href="{{route('admin.categories.index')}}">
                    <button type="button" class="admin-index-btn">
                        <x-clarity-applications-solid class="admin-index-icon"/>
                        <div class="my-auto">
                            Categories
                        </div>
                    </button>
                </a>
            </div>
            <div>
                <a href="{{route('admin.words.index')}}">
                    <button type="button" class="admin-index-btn">
                    <x-clarity-bullet-list-line class="admin-index-icon" />
                    <div class="my-auto">
                        Words
                    </div>
                    </button>
                </a>
            </div>

            <div>
                <a href="{{route('admin.users.index')}}">
                    <button type="button" class="admin-index-btn">
                        <x-clarity-users-line class="admin-index-icon" />
                        <div class="my-auto">
                        Users
                        </div>
                    </button>
                </a>
            </div>
            <div>
                <a href="{{route('admin.errors')}}">
                    <button type="button" class="admin-index-btn">
                        <x-clarity-error-line class="admin-index-icon" />
                        <div class="my-auto">
                            Errors
                        </div>
                    </button>
                </a>
            </div>

        </div>
    </div>
</x-app-layout>
