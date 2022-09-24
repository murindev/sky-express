<x-guest-layout>


    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />




    <form method="POST" action="{{ route('login') }}" class="auth-form">
        @csrf


        <label class="contrast" for="email">
            <span>Email: <sup>*</sup></span>
            <input type="email" id="email" value="{{old('email')}}" required name="email">
            <small></small>
        </label>

        <label class="contrast" for="password">
            <span>Пароль: <sup>*</sup></span>
            <input type="password" id="password" value="{{old('password')}}" required name="password">
            <small></small>
        </label>

        <button class="accent">Логин</button>

    </form>


    <!-- Remember Me -->
{{--    <div class="block mt-4">
        <label for="remember_me" class="inline-flex items-center">
            <input id="remember_me" type="checkbox" class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50" name="remember">
            <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
        </label>
    </div>--}}

    <a class="auth-link-right" href="{{ route('password.request') }}"> Забыли пароль?</a>




</x-guest-layout>
