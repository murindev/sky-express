<header class="personal-area">
    <div>
        <div>
            <input type="checkbox" id="headerNav"/>
            <label for="headerNav"></label>
            <div class="header">
                <a href="{{route('home')}}" class="header-logo">
                    <img src="{{asset('assets/img/svg-logo.svg')}}" alt="logo"/>
                </a>
                <a href="tel:+72222222222" class="header-tel white">
                    + 7 <em>222</em> 222-22-22
                    <span>Работаем круглосуточно</span>
                </a>
                <a href="javascript:" class="header-bell"></a>
                <a href="{{route('logout')}}" class="header-logout">Выйти</a>
            </div>
        </div>
    </div>


    <div class="personal-greeting">
        <div>
            <livewire:personal.user-header/>

            <div class="personal-greeting-tracking">
                <form>
                    <label class="regular">
                        <input type="text" placeholder="Введите номер заказа"/>
                    </label>
                    <button type="submit" class="btn acc">Отследить</button>
                </form>
            </div>
        </div>
    </div>
</header>
