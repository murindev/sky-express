<div class="breadcrumbs-links">
    <a href="{{route('home')}}">Главная</a>
    @isset($attributes['parent'])
        <i></i>
        <a href="{{$attributes['href']}}">{{$attributes['parent']}}</a>
    @endisset

    <i></i>
    <span>{{$attributes['title']}}</span>
</div>
<div class="breadcrumbs-back">
    @if(isset($attributes['parent']))
        <a href="{{$attributes['href']}}">Вернуться назад</a>
    @else
        <a href="{{route('home')}}">Вернуться назад</a>
    @endif

</div>

