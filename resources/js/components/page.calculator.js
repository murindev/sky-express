export default ($wire) => ({
    // radio: 'tab-calc',
    test: '',

    from: '',
    // fromCities: [],
    // fromCities: this.reactive([]),
    fromCityObj: {},
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
    volumedWeight: null,
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
                volumedWeight: Number(this.volumedWeight),
            })
            this.active = false
        } else {
            this.submitFormText = 'Введите размеры'
        }
    },
/*    setCityFrom(cityObj) {
        this.fromCityObj = cityObj
        this.from = cityObj.name
        this.fromCities = []
    },*/
/*    get fromCities() {
        $wire.tests(this.from).then(result => {
            console.log('dddd', result);
            return result
        })
    },
    set fromCities(arr) {
        return arr
    },*/

    init() {

/*        this.$watch('from', (value) => {
            $wire.tests(value).then(result => {
                this.fromCities = result
            })
        })*/
    },


})
