import Alpine from "alpinejs"
window.Alpine = Alpine
import widgetCalculator from '../components/widget.calculator'

window.Alpine.data('widgetCalculator', widgetCalculator)
window.Alpine.start();
