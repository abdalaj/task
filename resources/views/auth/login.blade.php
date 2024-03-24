<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="w-100">
        <div class="w-100">
            <div class="card w-50" style="position: absolute;;top: 50%;left: 50%;transform: translate(-50%,-50%)">
                <div class="card-body">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <!-- Email Address -->
                        <div>
                            <x-input-label for="national_id" :value="__('national_id')" />
                            <x-text-input id="national_id" class="form-control" type="text" name="national_id"
                                :value="old('national_id')" required autofocus autocomplete="username" />
                            <x-input-error :messages="$errors->get('national_id')" class="mt-2" />
                        </div>

                        <!-- Password -->
                        <div class="mt-4">
                            <x-input-label for="password" :value="__('Password')" />

                            <x-text-input id="password" class="form-control" type="password" name="password" required
                                autocomplete="current-password" />

                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>

                        <div class="flex items-center justify-end mt-4">
                            @if (Route::has('register'))
                                <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                                    href="{{ route('register') }}">
                                    {{ __('register ?') }}
                                </a>
                            @endif
                            <br>
                            <br>
                            <x-primary-button class="w-100 btn btn-primary">
                                {{ __('Log in') }}
                            </x-primary-button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
