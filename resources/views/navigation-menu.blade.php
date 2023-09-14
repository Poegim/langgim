<nav>
    <div class="w-full sm:min-w-[250px] px-2 bg-black sm:h-screen" x-data="{ expanded: true }"
    @resize.window="
    width = (window.innerWidth > 0) ? window.innerWidth : screen.width;
    if (width > 640) {
        expanded = true
    }
    if (width < 640) {
        expanded = false
    }
    ">
        <!-- Primary Navigation Menu -->
        <div class="flex flex-col justify-between">
            <div>
                <!-- Logo -->
                <div class="items-center text-center mb-4 mt-4 flex space-x-2">
                    <div class="w-full">
                        <a href="{{ route('welcome') }}">
                            <x-jet-application-mark class="block h-10 w-full" />
                        </a>
                    </div>
                    <button type="button" x-cloak x-on:click="expanded = ! expanded" :class="expanded ? '' : 'rotate-180'" class="inline-flex items-center px-4 py-2 bg-gray-800 border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-pink-900 active:bg-gray-900 focus:outline-none focus:border-gray-900 focus:ring focus:ring-gray-300 disabled:opacity-25 transition-all duration-300 sm:hidden">
                        <x-heroicon-s-chevron-up class="w-6 h-6"/>
                    </button>
                </div>

                <!-- Navigation Links -->
                <div class="space-y-2 flex flex-col" x-cloak x-show="expanded" x-collapse>

                    @auth
                    <x-jet-nav-link href="{{ route('dashboard') }}" :active="request()->routeIs('dashboard')">
                        <x-clarity-home-line class="admin-index-icon" /> {{ __('Dashboard') }}
                    </x-jet-nav-link>
                    @endauth

                    <x-jet-nav-link href="{{ route('category.index') }}" :active="request()->routeIs('category.index')">
                        <x-clarity-applications-solid class="admin-index-icon" /> {{ __('Start Learning') }}
                    </x-jet-nav-link>

                    @if ((auth()->check() && (auth()->user()->isAdmin())))
                    <x-jet-nav-link href="{{ route('admin.control-panel') }}"
                        :active="request()->routeIs('admin.control-panel')">
                        <x-clarity-settings-line class="admin-index-icon" /> {{ __('Control Panel') }}
                    </x-jet-nav-link>
                    @endif

                    <x-jet-nav-link href="{{ route('guest') }}" :active="request()->routeIs('guest')">
                        <x-clarity-play-line class="admin-index-icon" />{{ __('Guest Mode') }}
                    </x-jet-nav-link>


                    <!-- Separator -->
                    <div class="grow py-6 h-1 my-10 flex" id="separator">
                        <div class="h-1 bg-pink-900 my-auto w-full">

                        </div>
                    </div>

                    @guest
                    <x-jet-nav-link href="{{ route('login') }}" :active="request()->routeIs('login')">
                        <x-clarity-login-line class="admin-index-icon" /> {{ __('Login') }}
                    </x-jet-nav-link>
                    <x-jet-nav-link href="{{ route('register') }}" :active="request()->routeIs('register')">
                        <x-clarity-assign-user-line class="admin-index-icon" /> {{ __('Register') }}
                    </x-jet-nav-link>
                    @endguest

                    @auth
                    <!-- Authentication -->
                    <form method="POST" action="{{ route('logout') }}" x-data class="">
                        @csrf
                        <x-jet-nav-link href="{{ route('logout') }}" @click.prevent="$root.submit();" class="w-full">
                            <x-clarity-logout-line class="admin-index-icon" />{{ __('Log Out') }}
                        </x-jet-nav-link>
                    </form>
                    @endauth

                </div>
            </div>
        </div>
    </div>
</nav>
