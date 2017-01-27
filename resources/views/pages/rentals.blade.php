@extends('layouts.app')

@section('title')
    Udlejning
@endsection

@section('content')
    <div class="container">
        <h1>Lokaleudlejning</h1>
        <br>
        <h3>{{ $rentals->total() }} Lokaler til udleje i alt</h3>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    @foreach($rentals as $rental)
                        <a href="{{ url('udleje/' . $rental->id) }}">
                            <li class="list-group-item" style="margin-top: 15px">
                            <p><b>{{ $rental->title }}</b> </p>
                            <p><b>Adresse:</b> {{ $rental->address }}</p>
                                <p>{{ $rental->brief_description }}</p>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        {{ $rentals->links('') }}
    </div>
@endsection