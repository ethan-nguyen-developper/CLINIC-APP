import axios from 'axios';
window.axios = axios;

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

// CSS
import '@fortawesome/fontawesome-free/css/all.min.css';
import 'admin-lte/dist/css/adminlte.min.css';
import '../css/app.css';

// JS
import $ from 'jquery';
window.$ = window.jQuery = $;

import 'admin-lte/dist/js/adminlte.min.js';