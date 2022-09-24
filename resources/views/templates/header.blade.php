<header>
    <div>
        <div class="wpr">

            <input type="checkbox" id="headerNav"/>
            <label for="headerNav"></label>
            <div class="header">
                <a href="{{route('home')}}" class="header-logo">
                    @if(Illuminate\Support\Facades\Route::currentRouteName() === 'home')
                        <img src="{{asset('assets/img/svg-logo.svg')}}" alt="logo"/>
                    @else
                        <img src="{{asset('assets/img/svg-logo-regular.svg')}}" alt="logo"/>
                    @endif
                </a>
                <a href="tel:+72222222222" class="header-tel">
                    + 7 <em>222</em> 222-22-22
                    <span>Работаем круглосуточно</span>
                </a>



                <a href="/personal" class="header-login btn">
                    @if(auth()->user())
                        Личный кабинет
                    @else
                        Войти в кабинет
                    @endif

                </a>
            </div>

            <x-top-menu/>

        </div>
    </div>
</header>

