@extends('layouts.app')

@section('title')
    Nyheder & Events
@endsection

@section('content')
    <div class="container">
        <h1>Nyheder & Events</h1>
        <br>
        <h3>{{ $events->total() }} nyheder og events i alt</h3>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    @foreach($events as $event)
                        <a href="{{ url('events/' . $event->id) }}">
                            <li class="list-group-item" style="margin-top: 15px">
                                    <img src="{{ $event->small_img_link }}" class="small_img">
                                    <p><b>{{ $event->title }}</b></p>
                                    <p><b>{{ $event->date }}</b></p>
                                    <p>{!! nl2br(e($event->brief_description)) !!}</p>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        {{ $events->links('') }}
    </div>
@endsection