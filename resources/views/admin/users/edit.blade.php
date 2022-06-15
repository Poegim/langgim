<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit User: ').$user->name }}
        </h2>
    </x-slot>


    <div class="flex flex-col">
        <div class="overflow-x-auto">
            <div class="inline-block min-w-full overflow-hidden align-middle">

                <form method="POST" action="{{route('admin.users.update', $user->id)}}">
                    @method('PUT')
                    @csrf

                    <div>
                        <div>
                            <x-jet-label for="name">Name:</x-jet-label>
                            <x-jet-input name="name" id="name" type="text" value="{{$user->name}}" />
                            <x-jet-input-error for="name"/>
                        </div>
                        <div>
                            <x-jet-label for="email">Email:</x-jet-label>
                            <x-jet-input name="email" id="email" type="email" value="{{$user->email}}" />
                            <x-jet-input-error for="email"/>
                        </div>

                        <div>
                            <x-jet-label for="category">Role:</x-jet-label>
                            <select name="role" id="role" class="border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm w-64">
                                <option value="1" @if($user->role == 1) selected="selected" @endif>ADMIN</option>
                                <option value="2" @if($user->role == 2) selected="selected" @endif>PREMIUM USER</option>
                                <option value="3" @if($user->role == 3) selected="selected" @endif>USER</option>
                            </select>
                            <x-jet-input-error for="role"/>
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
