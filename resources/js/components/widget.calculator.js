export default () => ({
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
    submitForm() {
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
    }
})
