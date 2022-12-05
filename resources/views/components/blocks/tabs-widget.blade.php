<div class="tabsWidget" x-data="tabsWidget()">
    <div class="tabsWidget-tabs">

        <template x-for="tab in tabs">
            <button :class="currentTab === tab.code ? 'active' : ''" x-html="tab.title" x-on:click="changeTab(tab.code)" />
        </template>

    </div>
    <div class="tabsWidget-body">
        <div x-show="currentTab === 'calculator'">
{{--            <x-forms.tab-calculator />--}}
            <h3>Калькулятор стоимости доставки</h3>
            <livewire:calculator-widget/>
        </div>
        <div x-show="currentTab === 'package'">
            <x-forms.tab-tracking/>
        </div>


{{--        <template x-show="currentTab === 'calculator'"><x-forms.tab-calculator/></template>--}}
{{--        <template x-show="currentTab === 'package'"><x-forms.tab-tracking/></template>--}}
    </div>
</div>


<script>
    function tabsWidget() {
        return {
            currentTab: 'calculator',
            tabs: [
                {title:'Калькулятор', code: 'calculator'},
                {title:'Отследить посылку', code: 'package'}
            ],

            changeTab(code) {
                this.currentTab = code
            }

        }
    }
</script>

