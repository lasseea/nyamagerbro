@extends('layouts.app')

@section('title')
    Butikker
@endsection

@section('content')
    <div class="container">
        <h1>Butikker</h1>
        <br>
        <h3>{{ $shops->total() }} butikker i alt</h3>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    @foreach($shops as $shop)
                        <a href="{{ url('butikker/' . $shop->id) }}">
                            <li class="list-group-item" style="margin-top: 15px">
                            <span>
                                <b>Stilling:</b> {{ $shop->name }}
                            </span>
                                <span>
                                <b>Butik:</b> {{ $shop->name }}
                            </span>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        {{ $shops->links('') }}
    </div>
@endsection