@extends('layouts.app')

@section('title')
    Nyhed/Event
@endsection

@section('content')
    <div class="container">
        @foreach($events as $event)
            <h1><b>{{ $event->title }}</b><br></h1>
            <h3><b>{{ $event->date }}</b><br></h3>
            <img src="{{ $event->event_img_link }}" class="large_img"></a>
            <p> {!! nl2br(e($event->full_description)) !!} </p>
        @endforeach
    </div>
@endsection