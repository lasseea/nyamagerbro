@extends('layouts.app')

@section('title')
    Butikker
@endsection

@section('content')
    <div class="container">
        <h2>Butikker opdater/slet</h2>
        <br>
        @foreach($shops as $shop)
            {{ $shop->name }}
        @endforeach
    </div>
@endsection