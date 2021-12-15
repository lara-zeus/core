<nav x-data="{ open: false }" class="bg-white border-0 border-gray-100">
    <div class="max-w-7xl mx-auto">
        <div class="flex justify-between h-16">
            <div class="flex">
                <div class="flex-shrink-0 flex items-center">
                    <a class="italic flex gap-2 group" href="{{ url(config('zeus.path')) }}">
                        <img class="w-7" src="{{ asset('vendor/zeus/images/zeus-logo.png') }}" alt="{{ config('zeus.name', config('app.name', 'Laravel')) }}">
                        @zeus
                    </a>
                </div>

                <!-- Navigation Links -->
                <div class="hidden space-x-8 sm:-my-px sm:ml-10 sm:flex"></div>

            </div>
            <div class="hidden sm:flex sm:items-center sm:ml-6">
                @auth
                    <div class="ml-3 relative">
                        <x-zeus::dropdown.main>
                            <x-slot name="icon">
                                <img class="h-8 w-8 rounded-full object-cover" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"/>
                            </x-slot>

                            <x-zeus::dropdown.head type="button" class="flex items-center space-x-2 cursor-default">
                                <span>{{ __('Manage Account') }}</span>
                            </x-zeus::dropdown.head>
                            <div class="border-t border-gray-100"></div>

                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <x-zeus::dropdown.item type="button" href="{{ route('logout') }}" class="flex items-center space-x-2" onclick="event.preventDefault(); this.closest('form').submit();">
                                    <span class="text-red-600">{{ __('Log Out') }}</span>
                                </x-zeus::dropdown.item>
                            </form>

                        </x-zeus::dropdown.main>
                    </div>
                @else
                    @if (Route::has('login'))
                        <a href="{{ route('login') }}" class="text-sm text-gray-700 underline">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 underline">Register</a>
                        @endif
                    @endif
                @endauth
            </div>

            <!-- Hamburger -->
            <div class="-mr-2 flex items-center sm:hidden">
                <button @click="open = ! open" class="inline-flex items-center justify-center p-2 rounded-md text-gray-400 hover:text-gray-500 hover:bg-gray-100 focus:outline-none focus:bg-gray-100 focus:text-gray-500 transition">
                    <x-heroicon-o-menu class="h-6 w-6" />
                </button>
            </div>
        </div>
    </div>

    <!-- Responsive Navigation Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden sm:hidden">
        <div class="pt-2 pb-3 space-y-1">
            {{ __('bolt') }}
        </div>

        <div class="pt-4 pb-1 border-t border-gray-200">
            <div class="flex items-center px-4">
                @auth
                    <div class="flex-shrink-0 mr-3">
                        <img class="h-10 w-10 rounded-full object-cover" src="{{ auth()->user()->profile_photo_url }}" alt="{{ auth()->user()->name }}"/>
                    </div>

                    <div>
                        <div class="font-medium text-base text-gray-800">{{ auth()->user()->name }}</div>
                        <div class="font-medium text-sm text-gray-500">{{ auth()->user()->email }}</div>
                    </div>
                @endauth
            </div>

            <div class="mt-3 space-y-1">
                @auth
                    <a href="{{ route('profile.show') }}">
                        {{ __('Profile') }}
                    </a>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf

                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); this.closest('form').submit();">
                            {{ __('Log Out') }}
                        </a>
                    </form>
                @endauth
            </div>
        </div>
    </div>
</nav>