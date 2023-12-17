<div>
    <div class="grid grid-cols-1 lg:grid-cols-2 justify-center mb-4 gap-2">

        <!-- Continue Writing -->
        <!-- Couldnt be just passed a null if subcategory is a null? -->
        @if ($category != NULL)
            <div class="rounded-lg shadow-lg bg-slate-800 flex flex-col">
                <div class="p-4 relative flex h-full space-x-2">
                    <div class="my-auto">
                        <x-clarity-keyboard-line class="w-20 h-20"/>
                    </div>
                    <div class="my-auto">
                        <span class="text-lg font-bold">
                            <span class="capitalize">{{ __("messages.continue") }}</span> {{ __("messages.writing") }}:
                        </span>
                        <div>
                            <span class="text-gray-300 italic">
                                <p>
                                    {{ $category->{$language} }}
                                </p>
                                <p>
                                    {{$category->name}}
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    @if($subcategory != NULL)
                    <a href="{{route('category.show', ['typing', $category, $subcategory->slug])}}">
                        <x-buttons.secondary class="w-full">
                            <div>{{__('messages.continue')}}</div>
                        </x-button.secondary>
                    </a>
                    @else
                    <a href="{{route('category.show', ['typing', $category])}}">
                        <x-buttons.secondary class="w-full">
                            <div>{{__('messages.continue')}}</div>
                        </x-button.secondary>
                    </a>
                    @endif
                </div>
            </div>

        @else
            <div class="rounded-lg shadow-lg bg-slate-800 flex flex-col">
                <div class="p-4 relative flex h-full space-x-2">

                    <div class="my-auto">
                        <x-clarity-keyboard-line class="w-20 h-20"/>
                    </div>
                    <div class="my-auto">
                        {{ __("messages.It looks like you havent tried writing yet, you can start now.") }}
                    </div>
                </div>
                <div class="p-4">
                    <a href="{{route('category.index', ['typing'])}}">
                        <x-buttons.secondary class="w-full">
                            <div>{{ __("messages.writing") }}</div>
                        </x-button.secondary>
                    </a>
                </div>
            </div>
        @endif


        <!-- Continue Quiz -->
        <!-- Couldnt be just passed a null if subcategory is a null? -->
        @if ($quizCategory != NULL)
            <div class="rounded-lg shadow-lg bg-slate-800 flex flex-col">
                <div class="p-4 relative flex h-full space-x-2">
                    <div class="my-auto">
                        <x-tni-question-circle-o class="w-20 h-20"/>
                    </div>
                    <div class="my-auto">
                        <span class="text-lg font-bold">
                            <span class="capitalize">{{ __("messages.continue") }}</span> {{ __("messages.quiz") }}:
                        </span>
                        <div>
                            <span class="text-gray-300 italic">
                                <p>
                                    {{ $quizCategory->{$language} }}
                                </p>
                                <p>
                                    {{$quizCategory->name}}
                                </p>
                            </span>
                        </div>
                    </div>
                </div>
                <div class="p-4">
                    @if($quizSubcategory != NULL)
                    <a href="{{route('category.show', ['quiz', $quizCategory, $quizSubcategory->slug])}}">
                        <x-buttons.secondary class="w-full">
                            <div>{{__('messages.continue')}}</div>
                        </x-button.secondary>
                    </a>
                    @else
                    <a href="{{route('category.show', ['quiz', $quizCategory])}}">
                        <x-buttons.secondary class="w-full">
                            <div>{{__('messages.continue')}}</div>
                        </x-button.secondary>
                    </a>
                    @endif
                </div>
            </div>

        @else
            <div class="rounded-lg shadow-lg bg-slate-800 flex flex-col">
                <div class="p-4 relative flex h-full space-x-2">

                    <div class="my-auto">
                        <x-tni-question-circle-o class="w-20 h-20"/>
                    </div>
                    <div class="my-auto">
                        {{ __("messages.It looks like you havent tried quiz yet, you can start now.") }}
                    </div>
                </div>
                <div class="p-4">
                    <a href="{{route('category.index', ['quiz'])}}">
                        <x-buttons.secondary class="w-full">
                            <div>{{ __("messages.quiz") }}</div>
                        </x-button.secondary>
                    </a>
                </div>
            </div>
        @endif

        <!-- Chose language -->
        @if (empty(auth()->user()->language))
        <x-choose-language />
        @endif

    </div>
</div>
