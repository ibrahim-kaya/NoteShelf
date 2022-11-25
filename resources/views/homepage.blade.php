@extends('layouts.app')

@section('content')

    <div class="dropdown-bg"></div>

    <div class="hidden py-12 bg-gray-700 z-20 absolute top-0 right-0 bottom-0 left-0" id="modal">
        <div class="mx-auto w-11/12 md:w-2/3 max-w-lg">
            <div class="relative py-8 px-5 md:px-10 bg-white shadow-md rounded border border-gray-400">

                <div>
                    content
                </div>

                <div class="flex items-center justify-end w-full">
                    <button class="focus:outline-none transition duration-150 ease-in-out hover:bg-indigo-600 bg-indigo-700 rounded text-white px-8 py-2 text-sm">Submit</button>
                    <button class="focus:outline-none ml-3 bg-gray-100 transition duration-150 text-gray-600 ease-in-out hover:border-gray-400 hover:bg-gray-300 border rounded px-8 py-2 text-sm close-modal">Cancel</button>
                </div>
                <button class="cursor-pointer absolute top-0 right-0 mt-4 mr-5 text-gray-400 hover:text-gray-600 transition duration-150 ease-in-out rounded focus:outline-none close-modal" aria-label="close modal" role="button">
                    <svg  xmlns="http://www.w3.org/2000/svg"  class="icon icon-tabler icon-tabler-x" width="20" height="20" viewBox="0 0 24 24" stroke-width="2.5" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" />
                        <line x1="18" y1="6" x2="6" y2="18" />
                        <line x1="6" y1="6" x2="18" y2="18" />
                    </svg>
                </button>
            </div>
        </div>
    </div>

    <h2>Son Notlarınız</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">

        @foreach ($notes as $note)
            @include('includes.home-note-card', ['note' => $note])
        @endforeach

    </div>


@endsection


@section('scripts')
    <script>
        $('.note-title, .locked-note').click(function () {
            alert($(this).closest('.note').data('id'));
        });

        $('.options').click(function () {
            var menu = $(this).next();
            menu.css('display', 'block');
            menu.removeClass('swing-out-top-bck').addClass('swing-in-top-fwd');

            if(menu.hasClass('note-dropdown-alt')) $('.new-note-container').css('max-height', '+=' + menu.height() + 'px');

            $('.dropdown-bg').fadeIn();
        });

        $('.dropdown-bg').click(function () {
            hideDropDown();
        });

        function hideDropDown() {
            var menu = $('.note-dropdown.swing-in-top-fwd');
            menu.fadeOut('slow');
            menu.removeClass('swing-in-top-fwd').addClass('swing-out-top-bck');
            if(menu.hasClass('note-dropdown-alt')) $('.new-note-container').css('max-height', '-=' + menu.height() + 'px');
            $('.dropdown-bg').fadeOut();
        }
    </script>
@endsection
