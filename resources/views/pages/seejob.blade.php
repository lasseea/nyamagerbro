@extends('layouts.app')

@section('title')
    Jobopslag
@endsection

@section('content')
    <div class="container">
        @foreach($jobs as $job)
            <h1><b>Stilling:</b><br> {{ $job->title }}</h1>
            <h3><b>Butik:</b><br> <a href="{{ url('butikker/' . $job->shop_id) }}">{{ $job->name }}</h3>
            <img src="{{ $job->logo_img_link }}" class="small_img"></a>
            <h3><b>Beskrivelse:</b></h3>
            <p> {!! nl2br(e($job->full_description)) !!} </p>
        @endforeach
    </div>
@endsection