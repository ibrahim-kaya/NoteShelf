@extends('layouts.app')

@section('content')

    <div class="dropdown-bg"></div>

    @include('includes.modal')

    <h2>Son Notlarınız</h2>

    <div class="wrapper">
        <div class="button" onclick="document.body.classList.add('active')">
            <span class="button-text">Press</span>
            <div class="button-backgrounds">
                <div class="button-circle button-circle1"></div>
                <div class="button-circle button-circle2"></div>
                <div class="button-circle button-circle3"></div>
                <div class="button-circle button-circle4"></div>
            </div>
        </div>
    </div>

    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mt-4">

        @foreach ($notes as $note)
            @include('includes.home-note-card', ['note' => $note])
        @endforeach

    </div>

@endsection


@section('scripts')
    @vite(['resources/js/homepage.js'])
@endsection
