@extends('templates.main')
@section('main')
    <x-layouts.section  class="breadcrumbs">
        <x-blocks.breadcrumbs title="Рассчитать доставку" />
    </x-layouts.section>

    <x-layouts.section class="calculator-wpr">
        <livewire:calculator-page/>
    </x-layouts.section>

    <button class="save-result">
        Сохранить
    </button>
    <button class="clear-result">
        Очистить
    </button>

@endsection

@push('alpinejs')
<script src="{{asset('js/pages/calculator.js')}}"></script>
@endpush
{{--

<script>
    function pageCalculator($wire) {
        return {
            init() {
                $wire.on('from',() => {
                    console.log('dfsdfsdf', $wire.get('fromList'));

                })

                this.$watch('test', function (value) {
                    $wire.call('tests').then(result => {
                        console.log('value', result);
                    });
                    // console.log('gg', rr);
/*                        .then(result => {
                        console.log('value', result);
                    });*/

                })
            },
            radio: 'tab-calc',
            test: '',
            from: '',
            to: '',
            gg: '',
            active: false,
            model: 'Размер отправления',
            currentTab: 'PackageCustom',
            standardId: 0,
            length: null,
            width: null,
            height: null,
            weight: null,
            disabled: true,
            submitFormText: 'Применить',
            calculate() {
                if (this.length && this.width && this.height && this.weight) {
                    this.disabled = false
                    this.submitFormText = 'Применить'
                    Livewire.emit('applyDimensions', {
                        length: Number(this.length),
                        width: Number(this.width),
                        height: Number(this.height),
                        weight: Number(this.weight),
                    })
                    this.active = false
                } else {
                    this.submitFormText = 'Введите размеры'
                }
            },
        }
    }
</script>
--}}
