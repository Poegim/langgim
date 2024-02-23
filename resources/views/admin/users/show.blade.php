<x-app-layout>
    <div class="w-full rounded-lg shadow-md bg-gray-800 p-4">

        <p class="">
            ID:{{$user->id }}
        </p>
        <h1 class="text-lg font-bold my-4">
            {{__('messages.Name')}}: {{$user->name }}
        </h1>

        <p class="capitalize">
            {{__('messages.Language')}}: {{$user->language()}}
        </p>

        <p class="capitalize">
            {{__('messages.writing')}}: {{$user->learnedWordsOnLevel()}}
        </p>
        <p class="capitalize">
            {{__('messages.quiz')}}: {{$user->learnedQuizWordsOnLevel()}}
        </p>
        <p class="capitalize">
            {{__('messages.Time spend')}}: {{ $user->timer()}}
        </p>
        <p class="capitalize">
            {{__('messages.Last login at')}}: {{ $user->lastLogin()}}
        </p>

        <p class="capitalize">
            {{__('messages.User words count')}}: {{ $user->userWords()->count()}}
        </p>
        <p class="capitalize">
            {{__('messages.User quiz words count')}}: {{ $user->userQuizWords()->count() }}
        </p>

    </div>
</x-app-layout>
