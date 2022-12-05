import jQuery from 'jquery';
window.$ = jQuery;



var anim_cooldown = false;

function hideDropDown() {
    if (anim_cooldown) return;
    anim_cooldown = true;
    var menu = $('.note-dropdown.swing-in-top-fwd');
    menu.fadeOut('slow');
    menu.removeClass('swing-in-top-fwd').addClass('swing-out-top-bck');
    if (menu.hasClass('note-dropdown-alt')) $('.new-note-container').css('max-height', '350px');
    $('.dropdown-bg').fadeOut('slow', function () {
        anim_cooldown = false;
    });
}

$(document).ready(function() {
    $('.new-note-btn').click(function () {
        $('.new-note-container').css('max-height', '350px');
    });
    $('.close-new-note').click(function () {
        $('.new-note-container').css('max-height', '0');
    });

    $('.options').click(function () {
        var menu = $(this).next();
        menu.css('display', 'block');
        menu.removeClass('swing-out-top-bck').addClass('swing-in-top-fwd');

        if (menu.hasClass('note-dropdown-alt')) $('.new-note-container').css('max-height', '+=' + menu.height() + 'px');

        $('.dropdown-bg').fadeIn();
    });

    $('.dropdown-bg').click(function () {
        hideDropDown();
    });


    $('.note-color-opt').click(function () {
        $('.note-color').css('background-color', $(this).data('color'));
        $('input[name="color"]').val($(this).data('colorid'));
        hideDropDown();
    });

    $('.note-icon-opt').click(function () {
        $('input[name="icon"]').val($(this).data('iconid'));
        $('.note-icon').html('<i class="' + $(this).data('icon') + ' text-blue-900"></i>');
        hideDropDown();
    });

    $('.privacy-opt').click(function () {
        $('input[name="privacy"]').val($(this).data('privacy'));
        $('.note-privacy').html('<i class="' + $(this).data('class') + '"></i><p class="new-note-options-text">' + $(this).data('text') + '</p>');
        hideDropDown();
    });

    $('.pass_save').click(function () {
        if ($('#note_password').val()) $('.note_password').html('<i class="fa-solid fa-lock text-blue-900 text-xl sm:text-base"></i><p class="new-note-options-text">Şifreli Not</p>');
        else $('.note_password').html('<i class="fa-solid fa-unlock text-blue-900 text-xl sm:text-base"></i><p class="new-note-options-text">Şifre Yok</p>');
        $('input[name="password"]').val($('#note_password').val());
        hideDropDown();
    });

    $('#new-note-form').submit(function (e) {
        e.preventDefault();

        var formData = $(this).serialize();
        formData += '&note=' + newNoteEditor.getData();
        formData += '&_token=' + $('meta[name="csrf-token"]').attr('content');

        $.ajax({
            url: '/notes',
            type: 'POST',
            data: formData,
            success: function (response) {
                $("#new-note-form").trigger("reset");
                newNoteEditor.setData('');

                iziToast.success({
                    title: 'Başarılı',
                    message: 'Notunuz başarıyla oluşturuldu!',
                    position: 'topRight',
                    timeout: 5000,
                    transitionIn: 'fadeInDown',
                    transitionOut: 'fadeOutUp',
                    progressBarColor: 'rgb(0, 255, 184)'
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
});


