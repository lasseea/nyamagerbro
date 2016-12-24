@extends('layouts.app')

@section('title')
    Lokaleudlejning
@endsection

@section('content')
    <div class="container">

        <h2>Lokaleudlejning opdater/slet</h2>
        <br>
        <h3>{{ $rentals->total() }} Lokaler til udleje i alt</h3>
        <p><b>På denne side ({{ $rentals->count() }} Lokaler til udleje)</b></p>
        @if(Session::has('status'))
            <div class="alert alert-success"><em> {!! session('status') !!}</em></div>
        @endif
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    @foreach($rentals as $rental)
                        <li class="list-group-item" style="margin-top: 15px">
                        <span>
                            <b>Navn:</b> {{ $rental->title }}
                        </span>
                            <span class="pull-right clearfix">
                            <form action="{{ url('admin/sletlokale/' . $rental->id) }}" method="post">
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
        {{ $rentals->links('') }}
    </div>
@endsection