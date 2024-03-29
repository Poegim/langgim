<x-jet-form-section submit="updateProfileInformation">
    <x-slot name="title">
        {{ __('Profile Information') }}
    </x-slot>

    <x-slot name="description">
        {{ __('Update your account\'s profile information and email address.') }}
    </x-slot>

    <x-slot name="form">
        <!-- Profile Photo -->
        @if (Laravel\Jetstream\Jetstream::managesProfilePhotos())
        <div x-data="{photoName: null, photoPreview: null}" class="col-span-6 sm:col-span-4">
            <!-- Profile Photo File Input -->
            <input type="file" class="hidden" wire:model="photo" x-ref="photo" x-on:change="
                                    photoName = $refs.photo.files[0].name;
                                    const reader = new FileReader();
                                    reader.onload = (e) => {
                                        photoPreview = e.target.result;
                                    };
                                    reader.readAsDataURL($refs.photo.files[0]);
                            " />

            <x-jet-label for="photo" value="{{ __('Photo') }}" />

            <!-- Current Profile Photo -->
            <div class="mt-2" x-show="! photoPreview">
                <img src="{{ $this->user->profile_photo_url }}" alt="{{ $this->user->name }}"
                    class="rounded-full h-20 w-20 object-cover">
            </div>

            <!-- New Profile Photo Preview -->
            <div class="mt-2" x-show="photoPreview" style="display: none;">
                <span class="block rounded-full w-20 h-20 bg-cover bg-no-repeat bg-center"
                    x-bind:style="'background-image: url(\'' + photoPreview + '\');'">
                </span>
            </div>

            <x-jet-secondary-button class="mt-2 mr-2" type="button" x-on:click.prevent="$refs.photo.click()">
                {{ __('Select A New Photo') }}
            </x-jet-secondary-button>

            @if ($this->user->profile_photo_path)
            <x-jet-secondary-button type="button" class="mt-2" wire:click="deleteProfilePhoto">
                {{ __('Remove Photo') }}
            </x-jet-secondary-button>
            @endif

            <x-jet-input-error for="photo" class="mt-2" />
        </div>
        @endif

        <!-- Name -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="name" value="{{ __('Name') }}" />
            <x-jet-input id="name" type="text" class="mt-1 block w-full" wire:model.defer="state.name"
                autocomplete="name" />
            <x-jet-input-error for="name" class="mt-2" />
        </div>

        <!-- Email -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="email" value="{{ __('Email') }}" />
            <x-jet-input id="email" type="email" class="mt-1 block w-full" wire:model.defer="state.email" />
            <x-jet-input-error for="email" class="mt-2" />
        </div>

        <!-- Default language -->
        <div class="col-span-6 sm:col-span-4 relative">
            @if (auth()->user()->language === '')
            <span class="flex h-3 w-3 absolute -right-3 top-2 z-10">
                <span class="animate-ping absolute inline-flex h-full w-full rounded-full bg-sky-400 opacity-75"></span>
                <span class="inline-flex rounded-full h-3 w-3 bg-pink-500"></span>
            </span>
            @endif
            <x-jet-label for="language" value="{{ __('Default language') }}" />
            <select
                class="text-gray-800 mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                id="language" wire:model.defer="state.language" id="language" name="language">

                <option></option>

                @foreach (config('langgim.allowed_languages') as $language)
                <option value="{{$language}}" @if(auth()->user()->language == $language) selected="selected"
                    @endif>{{ucfirst($language)}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="language" class="mt-2" />
        </div>
        <!-- Default level -->
        <div class="col-span-6 sm:col-span-4">
            <x-jet-label for="level" value="{{ __('Choose prefered level') }}" />
            <select
                class="text-gray-800 mt-1 block w-full border-gray-300 focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 rounded-md shadow-sm"
                id="level" wire:model.defer="state.level" id="level" name="level">

                @foreach (config('langgim.levels') as $key => $level)
                <option value="{{$key+1}}" @if(auth()->user()->level == $level) selected="selected"
                    @endif>{{ucfirst($level)}}</option>
                @endforeach
            </select>
            <x-jet-input-error for="level" class="mt-2" />
        </div>

    </x-slot>

    <x-slot name="actions">
        <x-jet-action-message class="mr-3" on="saved">
            {{ __('Saved.') }}
        </x-jet-action-message>

        <x-buttons.primary wire:loading.attr="disabled" wire:target="photo">
            {{ __('Save') }}
        </x-buttons.primary>
    </x-slot>
</x-jet-form-section>
