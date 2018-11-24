window.$ = window.jQuery = require('jquery/dist/jquery');
window.moment = require('moment');

import 'fullcalendar';
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */
require('bootstrap');
require('datatables.net');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

//  window.Vue = require('vue');
//
// const app = new Vue({
//     el: '#app'
// });


(function ($, root) {

    let Backend = {
        init: function () {
            console.log('Initializing...');
            this.overview();
            this.planner();
        },

        overview: function() {
            $('#data_table_list tr > td:not(:last)').on('click', function() {
                window.location = $(this).parent('tr').attr('data-employee-url');
            });
        },
        planner: function() {

            $('.beschikbaarheid-table td').on('click', function() {

                let id = $(this).parents('table').attr('data-employee-id');
                let date = $(this).attr('data-date');
                let dagdeel = $(this).attr('data-dagdeel');
                let status = $(this).attr('data-status');
                let cell = $(this);

                if (status > 0) { // 0 is niet beschikbaar

                    if (status == 1) { // 1 is beschikbaar
                        status = 2; // 2 is ingepland
                    } else {
                        status = 1;
                    }

                    $.ajax({
                        type: 'POST',
                        url: '/werknemer/inplannen',
                        data: {
                            id: id,
                            date: date,
                            dagdeel: dagdeel,
                            status : status
                        },
                        headers: {
                                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                            }
                    }).done(function(data) {
                        if (data == '1') {
                            cell.removeClass('beschikbaarheid-status1');
                            cell.removeClass('beschikbaarheid-status2');
                            cell.addClass('beschikbaarheid-status' + status);
                            cell.attr('data-status', status);
                        }
                    });
                };
            });
        }
    };

    Backend.init();
    root.Backend = Backend;

})(window.jQuery, window);
