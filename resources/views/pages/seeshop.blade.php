@extends('layouts.app')

@section('title')
    Butik
@endsection

@section('content')
    <div class="container">
        @foreach($shops as $shop)
            <h1><b>{{ $shop->name }}</b><br></h1>
            <h3><b>{{ $shop->address }}</b><br></h3>
            <h3><b>{{ $shop->phone }}</b><br></h3>
            <p> {!! nl2br(e($shop->description)) !!} </p>
        @endforeach
    </div>
@endsection