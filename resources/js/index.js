import * as bootstrap from 'bootstrap';
import $ from 'jquery';

$(function () {
    const toastEl = document.getElementById('info-toast');
    if (!toastEl) return;

    const toast = new bootstrap.Toast(toastEl, { delay: 5000, autohide: true });

    $('[data-toast]').on('click', function () {
        toast.show();
        console.log('TOAST показан');
    });
});
