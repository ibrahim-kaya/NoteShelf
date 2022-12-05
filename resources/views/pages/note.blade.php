@extends('layouts.app')

@section('content')

    @if($status == 'locked')
        <div class="note-content">
            <div class="flex flex-col justify-center items-center">
                <p><i class="fa-solid fa-lock text-4xl"></i></p>

                <h1 class="text-3xl lg:text-4xl mt-5">Bu not şifreli!</h1>

                <p class="text-gray-700 mt-5">Notu görüntülemek için şifresini girin:</p>

                <div class="flex mt-10 justify-center items-center">
                    <input type="password" id="password" class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500" placeholder="•••••••••" required>
                    <button type="button" class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-3 py-2.5 ml-2 dark:bg-blue-600 dark:hover:bg-blue-700 focus:outline-none dark:focus:ring-blue-800 confirm-password" data-id="{{ $note }}"><i class="fa-solid fa-chevron-right"></i></button>
                </div>


            </div>
        </div>
    @elseif($status == 'success')
        <div class="note-header">
            <h1 class="text-2xl font-bold">{{ $note->title }}</h1>

            @if(auth()->user()->id == $note['user_id'])
                <a href="{{ route('notes.edit', $note->id) }}">Düzenle</a>
            @endif
        </div>

        <div class="mt-5">
            {!! $note->note !!}
        </div>
    @else
        <h1 class="text-2xl font-bold">HATA!</h1>

        <p class="mt-5">{{ $message }}</p>
    @endif

@endsection

@section('scripts')

    @vite(['resources/js/note-page.js'])

@endsection
