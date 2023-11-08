<div class="flex pt-6 space-x-2 w-full justify-center">
    @foreach($available_locales as $locale_name => $available_locale)
        @if($available_locale === $current_locale)
            <img class="rounded-md h-5 w-5" src="{{asset('images/flags/'.lcfirst($locale_name).'.svg')}}" alt="{{$locale_name}}">
        @else
            <a href="{{route('language-switch', $available_locale)}}">
                <img class="rounded-md h-5 w-5" src="{{asset('images/flags/'.lcfirst($locale_name).'.svg')}}" alt="{{$locale_name}}">
            </a>
        @endif
    @endforeach
</div>
