@extends('templates.main')
@section('main')
    <x-layouts.section class="breadcrumbs">
        <x-blocks.breadcrumbs :href="route('services')" :title="$data->title" parent="Услуги" />
    </x-layouts.section>

    <x-layouts.section class="action-page">
        <div class="action-page-content">
            @isset($data->created_at)
{{--                <span class="date">{{ @$data->created_at->format('d m Y') }}</span>--}}
            @endisset
            <h1>{{$data->title}}</h1>
            {!! $data->content !!}
        </div>
        <div class="action-page-img">
            <div class="action-page-img-nest">
                <img src="{{asset('/storage/'.$data->image)}}" alt="image"/>
            </div>
        </div>
    </x-layouts.section>

@endsection
