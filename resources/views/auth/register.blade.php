<x-guest-layout>

    <x-auth-validation-errors class="auth-errors" :errors="$errors"/>

{{--

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

--}}



    <div class="tabsWidget" x-data="tabsRegister()">
        <div class="tabsWidget-tabs">

            <template x-for="tab in tabs">
                <button :class="currentTab === tab.code ? 'active' : ''" x-html="tab.title" x-on:click="changeTab(tab.code)" />
            </template>

        </div>
        <div class="tabsWidget-body">
            <div x-show="currentTab === 'calculator'">
                {{--            <x-forms.tab-calculator />--}}
{{--                <h3>Калькулятор стоимости доставки</h3>--}}
{{--                <livewire:calculator-widget/>--}}
            </div>
            <div x-show="currentTab === 'package'">
{{--                <x-forms.tab-tracking/>--}}
            </div>


            {{--        <template x-show="currentTab === 'calculator'"><x-forms.tab-calculator/></template>--}}
            {{--        <template x-show="currentTab === 'package'"><x-forms.tab-tracking/></template>--}}
        </div>
    </div>


    <script>
        function tabsRegister() {
            return {
                currentTab: 'calculator',
                tabs: [
                    {title:'Калькулятор', code: 'calculator'},
                    {title:'Отследить посылку', code: 'package'}
                ],

                changeTab(code) {
                    this.currentTab = code
                }

            }
        }
    </script>

</x-guest-layout>
