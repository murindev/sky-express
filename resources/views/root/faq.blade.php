@extends('templates.main')
@section('main')

    <breadcrumbs title="Полезная информация"/>
    <x-layouts.section class="info-nav">
        <nav>
            <a>{{@$title}}</a>
        </nav>
    </x-layouts.section>

    <x-layouts.section class="info">
        <div class="info-faq">

            @foreach(@$data as $item)
                <h2>{{@$item->title}}</h2>
                @foreach(@$item->questions as $question)

                    <div class="info-faq-item">
                        <input type="checkbox" id="faq-{{$item->id}}"/>
                        <label class="info-faq-item_title" for="faq-{{$item->id}}">
                           {{@$question->title}}
                        </label>
                        <div class="info-faq-item_text">
                            {!! @$question->text !!}
                        </div>
                    </div>

                @endforeach
            @endforeach

        </div>

        <div class="info-contact">

            <div class="info-contact-block">
                <p>
                    Если не нашли свой вопрос, то вы можете обратиться к нашим консультантам.
                </p>

                <button >
                    Связаться с нами
                </button>
            </div>
        </div>

    </x-layouts.section>

@endsection
