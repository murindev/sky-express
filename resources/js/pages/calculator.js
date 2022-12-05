import Alpine from "alpinejs"
window.Alpine = Alpine
import pageCalculator from '../components/page.calculator'
import storeCalculator from '../store/store.calculator'

document.addEventListener('alpine:init', () => {
    window.Alpine.store('calc', storeCalculator)
    window.Alpine.data('pageCalculator', pageCalculator)
})



window.Alpine.start();


