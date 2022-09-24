<x-guest-layout>

    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Validation Errors -->
    <x-auth-validation-errors class="mb-4" :errors="$errors" />

    <form method="POST" action="{{ route('password.email') }}" class="auth-form">
        @csrf

        <b>Забыли пароль? Не беспокойтесь, просто отправьте на ваш email, и мы отправим на вашу почту инструкции по восстановлению</b>

        <label class="contrast" for="email">
            <span>Email: <sup>*</sup></span>
            <input type="email" id="email" value="{{old('email')}}" required name="email">
            <small></small>
        </label>

        <button class="accent">Отправить email</button>

    </form>

    <a class="auth-link-right" href="{{ route('login') }}"> Залогиниться</a>

</x-guest-layout>
