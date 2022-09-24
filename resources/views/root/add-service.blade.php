
@extends('templates.main')
@section('main')
    <x-layouts.section class="breadcrumbs">
        <x-blocks.breadcrumbs :href="route('add-services')" :title="$data->title" parent="Дополнительные услуги" />
    </x-layouts.section>

    <x-layouts.section class="action-page">
        <div class="action-page-content">
            <span class="date">{{ $data->created_at->format('d m Y') }}</span>
            <h1>{{$data->title}}</h1>
            {!! $data->content !!}

            {{--            <button class="accent">Стать участником</button>--}}

        </div>
        <div class="action-page-img">
            <div class="action-page-img-nest">
                <img src="{{asset('/storage/'.$data->image)}}" alt="image"/>
            </div>
        </div>
    </x-layouts.section>

@endsection
