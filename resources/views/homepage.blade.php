@extends('layouts.app')

@section('content')

    <div class="dropdown-bg"></div>

    @include('includes.modal')

    <h2>Son Notlarınız</h2>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">

        @foreach ($notes as $note)
            @include('includes.home-note-card', ['note' => $note])
        @endforeach

    </div>

@endsection


@section('scripts')
    @vite(['resources/js/homepage.js'])
@endsection
