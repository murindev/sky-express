<x-guest-layout>


    <x-auth-validation-errors class="auth-errors" :errors="$errors"/>


    <form method="POST" action="{{ route('password.confirm') }}" class="auth-form">
        @csrf

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


        <button class="accent" > Подтвердить </button>

    </form>

</x-guest-layout>
