@extends('templates.main')
@section('main')

    <x-layouts.section class="breadcrumbs">
        <x-blocks.breadcrumbs title="Услуги"/>
    </x-layouts.section>

    <x-layouts.section class="actions">

        <h3>{{$title}}</h3>

        @foreach(@$data as $item)
            <div class="action">
                <div class="action-wpr">

                    <div class="action-img">
                        <a href="{{route('service',$item->slug)}}" class="action-img-nest"
                           style="background-image: url({{asset('/storage/'.$item->image)}})"></a>
                    </div>
                    <div class="action-desc">

                        <div class="action-title">

                                <a href="{{route('service',$item->slug)}}">{{ $item->title }}</a>

                            @isset($item->created_at)
{{--                            <span class="date">{{ $item->created_at->format('d m Y') }}</span>--}}
                            @endisset
                        </div>
                    </div>

                </div>
            </div>
        @endforeach
    </x-layouts.section>

@endsection
