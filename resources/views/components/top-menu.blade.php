<ul class="header-nav">
    <li>
        <a href="{{route('calculator')}}">
            <span class="header-nav-icon"><img src="{{asset('assets/img/icons/nav/1.png')}}" alt="icon"/></span>
            Рассчитать доставку
        </a>
    </li>

    <li class="parent">
        <a href="{{route('individuals')}}">
            <span class="header-nav-icon"><img src="{{asset('assets/img/icons/nav/2.png')}}" alt="icon"/></span>
            Физ. лицам
        </a>
        <ul>
            @foreach($individuals as $item)
                <li><a href="{{route('individual', $item->slug)}}">{{$item->title}}</a></li>
            @endforeach
                <li><a href="{{route('actions')}}">Акции</a></li>
                <li><a href="{{route('faq')}}">Полезная информация</a></li>
        </ul>
    </li>

    <li class="parent">
        <a href="{{route('legals')}}">
            <span class="header-nav-icon"><img src="{{asset('assets/img/icons/nav/3.png')}}" alt="icon"/></span>
            Юр. лицам
        </a>
        <ul>
            @foreach($legals as $item)
                <li><a href="{{route('legal', $item->slug)}}">{{$item->title}}</a></li>
            @endforeach
        </ul>
    </li>

    <li class="parent">
        <a href="{{route('services')}}">
            <span class="header-nav-icon"><img src="{{asset('assets/img/icons/nav/4.png')}}" alt="icon"/></span>
            Услуги
        </a>
        <ul>
            @foreach($services as $item)
                <li><a href="{{route('service', $item->slug)}}">{{$item->title}}</a></li>
            @endforeach
        </ul>
    </li>

    <li class="parent">
        <a href="{{route('add-services')}}">
            <span class="header-nav-icon"><img src="{{asset('assets/img/icons/nav/5.png')}}" alt="icon"/></span>
            Доп. услуги
        </a>
        <ul>
            @foreach($addServices as $item)
                <li><a href="{{route('add-service', $item->slug)}}">{{$item->title}}</a></li>
            @endforeach
        </ul>
    </li>

    <li>
        <a href="{{route('offices')}}">
            <span class="header-nav-icon"><img src="{{asset('assets/img/icons/nav/6.png')}}" alt="icon"/></span>
            Офисы
        </a>
    </li>

    <li>
        <a href="javascript:">
            <span class="header-nav-icon"><img src="{{asset('assets/img/icons/nav/6.png')}}" alt="icon"/></span>
            О компании
        </a>
    </li>

</ul>
