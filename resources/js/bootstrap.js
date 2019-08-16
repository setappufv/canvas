window._ = require('lodash');

/**
 * We'll load jQuery and the Bootstrap jQuery plugin which provides support
 * for JavaScript based Bootstrap features such as modals and tabs. This
 * code may be modified to fit the specific needs of your application.
 */

try {
    window.Popper = require('popper.js').default;

    window.$ = window.jQuery = require('jquery');

    window.autosize = window.autosize ? window.autosize : require('autosize');

    window.trans = (string) => _.get(window.i18n, string);

    /**
     * Current workaround for using the Autosize library which will only
     * resize elements when clicked, not on the initial page load.
     *
     * @link http://www.jacklmoore.com/autosize/#faq-hidden
     */
    $(function () {
        let textarea = $('textarea');

        autosize(textarea);

        textarea.focus(function () {
            autosize.update(textarea);
        });
    });

    /**
     * Initialize all tooltips on a page by manually opting in.
     *
     * @link https://getbootstrap.com/docs/4.3/components/tooltips/#example-enable-tooltips-everywhere
     */
    $(function () {
        $('[data-toggle="tooltip"]').tooltip()
    });

    require('bootstrap');
} catch (e) {
}

/**
 * We'll load the axios HTTP library which allows us to easily issue requests
 * to our Laravel back-end. This library automatically handles sending the
 * CSRF token as a header based on the value of the "XSRF" token cookie.
 */

window.axios = require('axios');

window.axios.defaults.headers.common['X-Requested-With'] = 'XMLHttpRequest';

/**
 * Next we will register the CSRF Token as a common header with Axios so that
 * all outgoing HTTP requests automatically have it attached. This is just
 * a simple convenience so we don't have to attach every token manually.
 */

let token = document.head.querySelector('meta[name="csrf-token"]');

if (token) {
    window.axios.defaults.headers.common['X-CSRF-TOKEN'] = token.content;
} else {
    console.error('CSRF token not found: https://laravel.com/docs/csrf#csrf-x-csrf-token');
}
