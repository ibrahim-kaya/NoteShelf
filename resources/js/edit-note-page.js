import jQuery from 'jquery';
import {newNoteEditor} from './homepage.js';

window.$ = jQuery;


$('#edit-note-form').submit(function (e) {
    e.preventDefault();

    var id = $(this).attr('data-id');

    var formData = $(this).serialize();
    formData += '&note=' + newNoteEditor.getData();
    formData += '&_token=' + $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/notes/' + id,
        type: 'PUT',
        data: formData,
        success: function (response) {
            iziToast.success({
                title: 'Başarılı!',
                message: 'Not başarıyla güncellendi.',
                position: 'center',
                overlay: true,
                close: false,
                timeout: false,
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp',
                buttons: [
                    ['<button>Notu Görüntüle</button>', function (instance, toast) {
                        window.location.href = '/notes/' + id;
                    } , true],
                ],
            });
        },
        error: function (response) {
            var errors = "";
            $.each(response.responseJSON.errors, function (key, value) {
                errors += value + "<br>";
            });
            iziToast.error({
                title: 'Bazı hatalar var!',
                message: errors,
                position: 'topRight',
                timeout: 5000,
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp',
                layout: 2,
            });
        }
    });
});
