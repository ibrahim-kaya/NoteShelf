@extends('layouts.app')

@section('content')

    @if($status == 'locked')
        <p>Bu not kilitli. Kilitli not görüntülemeyi henüz eklemedim. Çok yakında...</p>
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

@endsection
