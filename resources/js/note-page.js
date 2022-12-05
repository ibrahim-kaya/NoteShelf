import jQuery from 'jquery';

window.$ = jQuery;

$('.confirm-password').click(function () {
    var note_id = $(this).attr('data-id');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var password = $('#password').val();

    $.ajax({
        url: '/note/get-note',
        type: 'POST',
        data: {_token: csrfToken, id: note_id, password: password},
        success: function (data) {
            if (data.status == 'success') {
                $('.note-content div').fadeOut(function () {
                    $('.note-content').html(data.note);
                });
            } else {
                iziToast.error({
                    title: 'HATA!',
                    message: data.message,
                    position: 'topRight',
                    timeout: 5000,
                    transitionIn: 'fadeInDown',
                    transitionOut: 'fadeOutUp',
                    layout: 2,
                });
            }
        },
        error: function (data) {
            try {
                var error = $.parseJSON(data.responseText).message;
            }
            catch (e) {
                var error = data.responseText;
            }
            iziToast.error({
                title: 'HATA!',
                message: error,
                position: 'topRight',
                timeout: 5000,
                transitionIn: 'fadeInDown',
                transitionOut: 'fadeOutUp',
                layout: 2,
            });
        }
    });
});
