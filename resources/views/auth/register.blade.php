<x-guest-layout>
    <x-jet-authentication-card>
        <x-slot name="logo">
            <x-jet-authentication-card-logo />
        </x-slot>

        <x-jet-validation-errors class="mb-4" />

        <form method="POST" action="{{ route('register') }}" id="registerForm">
            @csrf

            <input type="hidden" class="g-recaptcha" name="recaptcha_token" id="recaptcha_token">

            <div>
                <x-jet-label for="name" value="{{ __('messages.name') }}" />
                <x-jet-input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <x-jet-label for="email" value="{{ __('messages.email') }}" />
                <x-jet-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>

            <div class="mt-4">
                <x-jet-label for="password" value="{{ __('messages.password') }}" />
                <x-jet-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>

            <div class="mt-4">
                <x-jet-label for="password_confirmation" value="{{ __('messages.confirm password') }}" />
                <x-jet-input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>

            @if (Laravel\Jetstream\Jetstream::hasTermsAndPrivacyPolicyFeature())
                <div class="mt-4">
                    <x-jet-label for="terms">
                        <div class="flex items-center">
                            <x-jet-checkbox name="terms" id="terms"/>

                            <div class="ml-2">
                                {!! __('I agree to the :terms_of_service and :privacy_policy', [
                                        'terms_of_service' => '<a target="_blank" href="'.route('terms.show').'" class="underline text-sm text-gray-600 hover:text-gray-200">'.__('Terms of Service').'</a>',
                                        'privacy_policy' => '<a target="_blank" href="'.route('policy.show').'" class="underline text-sm text-gray-600 hover:text-gray-200">'.__('Privacy Policy').'</a>',
                                ]) !!}
                            </div>
                        </div>
                    </x-jet-label>
                </div>
            @endif

            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-400 hover:text-gray-200" href="{{ route('login') }}">
                    {{ __('messages.Already registered') }}?
                </a>

                <x-buttons.primary type="submit" class="ml-4">
                    {{ __('messages.register') }}
                </x-buttons.primary>
            </div>
        </form>
    </x-jet-authentication-card>

    @push('scripts')
        <script>
            grecaptcha.ready(function () {
                document.getElementById('registerForm').addEventListener("submit", function (event) {
                    event.preventDefault();
                    grecaptcha.execute('{{ config('services.recaptcha.site_key') }}', { action: 'register' })
                        .then(function (token) {
                            document.getElementById("recaptcha_token").value = token;
                            document.getElementById('registerForm').submit();
                        });
                });
            });
        </script>
    @endpush

</x-guest-layout>
