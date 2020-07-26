import Swal from 'sweetalert2'
import flatpickr from "flatpickr"
const countryList = require('country-list');

require('./bootstrap')
// window.Vue = require('vue');
// Vue.component('example-component', require('./components/ExampleComponent.vue').default);
// const app = new Vue({
//     el: '#app',
// });

// Flatpicker for date time pciker
window.flatpickr = flatpickr


// Sweetalert2
window.Swal = Swal
const Toast = Swal.mixin({
    toast: true,
    position: 'top-end',
    showConfirmButton: false,
    timer: 3000,
    timerProgressBar: true,
    onOpen: (toast) => {
        toast.addEventListener('mouseenter', Swal.stopTimer)
        toast.addEventListener('mouseleave', Swal.resumeTimer)
    }
})

window.swtoaster = function (type = 'success', message = '') {
    Toast.fire({
        icon: type,
        title: message
    })
}

/**
 * Country List
 * npm i country-list
 * https://www.npmjs.com/package/country-list
 */
window.countryList = countryList