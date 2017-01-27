@extends('layouts.app')

@section('title')
    Jobopslag
@endsection

@section('content')
    <div class="container">
        @foreach($rentals as $rental)
            <h1>{{ $rental->title }}<br></h1>
            <h3><b>Adressse:</b><br>{{ $rental->address }}</h3>
            <img src="{{ $rental->room_img_link }}" class="large_img">
            <h3><b>Beskrivelse:</b></h3>
            <p> {!! nl2br(e($rental->full_description)) !!} </p>
        @endforeach
    </div>
@endsection