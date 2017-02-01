@extends('layouts.app')

@section('title')
    Butik
@endsection

@section('content')
    <div class="container">
        @foreach($shops as $shop)
            <h1><b>{{ $shop->name }}</b><br></h1>
            <img src="{{ $shop->logo_img_link }}" class="small_img">
            <h3><b>{{ $shop->address }}</b><br></h3>
            <p><b>Om butikken:</b></p>
            <p> {!! nl2br(e($shop->description)) !!} </p>
            <p><b>Telefon:</b> {{ $shop->phone }}<br></p>
            <p><b>Hjemmeside: </b><a href="{{ $shop->website }}">{{ $shop->website }}</a></p>
            <p><b><a href="{{ $shop->google_maps_url }}">Se på Google Maps</a></b></p>
        @endforeach
            <h4><b>Åbningstider:</b></h4>
        @foreach($businesshours as $businesshour)
            <p>{{ $businesshour->open_time }} - {{ $businesshour->close_time }}</p>
        @endforeach
    </div>
@endsection