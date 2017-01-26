@extends('layouts.app')

@section('title')
    Jobopslag
@endsection

@section('content')
    <div class="container">
        <h1>Jobopslag</h1>
        <br>
        <h3>{{ $jobs->total() }} jobopslag i alt</h3>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    @foreach($jobs as $job)
                        <a href="{{ url('jobs/' . $job->id) }}">
                            <li class="list-group-item" style="margin-top: 15px">
                            <span>
                                <b>Stilling:</b> {{ $job->title }}
                            </span>
                                <span>
                                <b>Butik:</b> {{ $job->name }}
                            </span>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        {{ $jobs->links('') }}
    </div>
@endsection