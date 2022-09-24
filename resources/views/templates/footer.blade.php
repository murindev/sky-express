<footer>
    <div>
        <div>
            <div class="footer-menu">
                <a class="footer-logo" href="{{route('home')}}">
                    <img src="{{asset('assets/img/svg-logo.svg')}}" alt="logo"/>
                </a>
                <ul>
                    <li><a href="javascript:">Способы оплаты</a></li>
                    <li><a href="javascript:">Для юридических лиц и ИП</a></li>
                    <li><a href="javascript:">Личный кабинет</a></li>
                    <li><a href="javascript:">Оферта</a></li>
                    <li><a href="javascript:">Услуги</a></li>
                    <li><a href="javascript:">Политика конфиденциальности</a></li>
                </ul>
            </div>

            <div class="footer-socials">
                <button class="btn">
                    <img src="{{asset('assets/img/tel.svg')}}" alt="phone"/>
                    Связаться с нами
                </button>
                <ul>
                    <li><a href="javascript:"><img src="{{asset('assets/img/icons/soc-instagram.svg')}}" alt="instagram"/></a></li>
                    <li><a href="javascript:"><img src="{{asset('assets/img/icons/soc-vk.svg')}}" alt="vk"/></a></li>
                    <li><a href="javascript:"><img src="{{asset('assets/img/icons/soc-telegram.svg')}}" alt="telegram"/></a></li>
                </ul>
                <div class="footer-copyright">
                    © 2021, ООО <a href="javascript:">"Скай Экспресс"</a>
                </div>
            </div>


            <div class="footer-communications">
                <div class="footer-communications_wpr">
                    <a href="tel:+72222222222"> + 7 <b>222</b> 222-22-22 <span>Работаем круглосуточно</span></a>
                    <a href="mailto:info@sky-express.ru">info@sky-express.ru</a>
                    <address>
                        <span>117420, Москва,</span>
                        <span>ул. Наметкина, 9/1,</span>
                    </address>
                </div>

            </div>
        </div>
    </div>
</footer>


@if( config('app.debug') )
    <script src="{{asset('assets/js/socket.js')}}"></script>
@endif
