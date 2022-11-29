import jQuery from 'jquery';
window.$ = jQuery;

$('.note-title, .locked-note').click(function () {
    alert($(this).closest('.note').data('id'));
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

function hideDropDown() {
    var menu = $('.note-dropdown.swing-in-top-fwd');
    menu.fadeOut('slow');
    menu.removeClass('swing-in-top-fwd').addClass('swing-out-top-bck');
    if (menu.hasClass('note-dropdown-alt')) $('.new-note-container').css('max-height', '-=' + menu.height() + 'px');
    $('.dropdown-bg').fadeOut();
}
