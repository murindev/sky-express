<x-guest-layout>

    <x-auth-validation-errors class="auth-errors" :errors="$errors"/>


    <form method="POST" action="{{ route('register') }}" class="auth-form">
        @csrf

        <label class="contrast" for="name">
            <span>Имя: <sup>*</sup></span>
            <input type="text" id="name" value="{{old('name')}}" required autofocus name="name">
            <small></small>
        </label>

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

        <label class="contrast" for="password_confirmation">
            <span>Повторите пароль: <sup>*</sup></span>
            <input type="password" id="password_confirmation" value="{{old('password')}}" required
                   name="password_confirmation">
            <small></small>
        </label>


        <button class="accent">Зарегистрироваться</button>

    </form>


    <a class="auth-link-right" href="{{ route('login') }}"> Уже зарегистрированы?</a>

</x-guest-layout>
