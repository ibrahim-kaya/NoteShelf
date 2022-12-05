import jQuery from 'jquery';

window.$ = jQuery;

export var newNoteEditor;

InlineEditor
    .create(document.querySelector('#editor'), {
        placeholder: 'Not içeriği giriniz...'
    })
    .then(editor => {
        newNoteEditor = editor;
    })
    .catch(error => {
        console.error(error);
    });

function showModal(title, content) {

    $('.modal-title p').text(title);
    $('.content-wrapper').html(content);
    $('.content-wrapper a').attr('target','_blank');
    $('#modal-bg').fadeIn();
    $("body").css({ overflow: 'hidden' });
    $('.wrapper').css('display', 'flex');
    setTimeout(function () {
        document.body.classList.add('active');
    }, 100);
}

function showPassModal(note_id) {
    $('#pw_modal').attr('data-id', note_id);
    $('#pw_modal').fadeIn();
    $('#modal-bg').fadeIn();
    $("body").css({ overflow: 'hidden' })
}

function hideModal() {
    document.body.classList.remove('active')
    $('#modal-bg').fadeOut();
    $('#pw_modal').fadeOut();
    $('#pw_modal input').val('');


    setTimeout(function () {
        $('.wrapper').css('display', 'none');
        $('.modal-title p').text('');
        $('.content-wrapper').html('');
        $("body").css({ overflow: 'inherit' })
    }, 300);
}

$('.close-modal').click(function () {
    hideModal();
});

$('[data-modal="note"]').click(function () {
    //$('.content-wrapper').html($(this).closest('.note').data('id'));

    var noteId = $(this).closest('.note').data('id');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');

    $.ajax({
        url: '/note/get-note',
        type: 'POST',
        data: {_token: csrfToken, id: noteId},
        success: function (data) {
            showModal(data.title, data.note);
        },
        error: function (data) {
            try {
                var error = $.parseJSON(data.responseText).message;
            }
            catch (e) {
                var error = data.responseText;
            }
            iziToast.error({
                title: 'Hata!',
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

$('#unlock-note').submit(function (e) {
    e.preventDefault();
    var noteId = $('#pw_modal').attr('data-id');
    var csrfToken = $('meta[name="csrf-token"]').attr('content');
    var password = $('#pw_modal input').val();

    $.ajax({
        url: '/note/get-note',
        type: 'POST',
        data: {_token: csrfToken, id: noteId, password: password},
        success: function (data) {
            if (data.status == 'success') {
                hideModal();
                setTimeout(function () {
                    showModal(data.title, data.note);
                }, 350);
            } else {
                console.log(data);
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
                title: 'Hata!',
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

$('.locked-note').click(function () {
    var noteId = $(this).closest('.note').data('id');
    showPassModal(noteId);
});
