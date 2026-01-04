<x-guest-layout>
    <div>
        <span class="text-3xl font-bold text-gym-500 mb-4">Selamat Datang </span>
    </div>
    <div>
        <span class="text-sm text-slate-800 mt-2 ">Silakan Login terlebih dahulu!</span>
    </div>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    
    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div class="mt-10">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox" class="rounded  border-gray-300 focus:ring-1 focus:ring-red-600 text-red-600 shadow-sm  " name="remember">
                <span class="ms-2 text-sm text-gray-600 ">{{ __('Remember me') }}</span>
            </label>
        </div>

       
        <div class="mt-4 space-y-4">
 

    <x-primary-button class="w-full justify-center">
        {{ __('Login') }}
    </x-primary-button>

   @if (Route::has('password.request'))
        <a href="{{ route('password.request') }}"
           class="block text-sm text-gray-600 hover:text-gym-500 text-start">
            {{ __('Forgot your password?') }}
        </a>
    @endif
</div>

    </form>
</x-guest-layout>
