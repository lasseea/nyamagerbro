@extends('layouts.app')

@section('title')
    Events
@endsection

@section('content')
    <div class="container">
        <h2>Events/Nyheder opdater/slet</h2>
        <br>
        <h3>{{ $events->total() }} Events/Nyheder i alt</h3>
        <p><b>På denne side ({{ $events->count() }} events/nyheder)</b></p>
        @if(Session::has('status'))
            <div class="alert alert-success"><em> {!! session('status') !!}</em></div>
        @endif
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    @foreach($events as $event)
                        <li class="list-group-item" style="margin-top: 15px">
                        <span>
                            <b>Titel:</b> {{ $event->title }}
                        </span>
                            <span>
                            <b>Dato:</b> {{ $event->date }}
                        </span>
                            <span class="pull-right clearfix">
                            <form action="{{ url('admin/sletevent/' . $event->id) }}" method="post">
                            <button type="submit" class="btn btn-xs btn-danger">Slet</button>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                        </span>
                            <span class="pull-right clearfix" style="margin-right: 10px">
                            <button class="btn btn-xs btn-primary">Opdater</button>
                        </span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        {{ $events->links('') }}
    </div>
@endsection