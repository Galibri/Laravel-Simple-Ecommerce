import Swal from 'sweetalert2'
const countryList = require('country-list');

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('jquery-ui/ui/widgets/slider')

    require('bootstrap');
} catch (e) { }

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';


// Sweetalert2
window.Swal = Swal;
const Toast = Swal.mixin({
    toast: true,
    position: 'top-right',
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