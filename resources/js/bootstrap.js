import _ from 'lodash';
import axios from 'axios';
import 'bootstrap';
import { createPopper } from '@popperjs/core';
import $ from 'jquery';

window._ = _;
window.Popper = createPopper;
window.$ = window.jQuery = $;

window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
