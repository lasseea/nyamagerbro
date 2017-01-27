@extends('layouts.app')

@section('title')
    Butikker
@endsection

@section('content')
    <div class="container">
        <h2>Butikker opdater/slet</h2>
        <br>
        <h3>{{ $shops->total() }} Butikker i alt</h3>
        <p><b>På denne side ({{ $shops->count() }} butikker)</b></p>
        @if(Session::has('status'))
            <div class="alert alert-success"><em> {!! session('status') !!}</em></div>
        @endif
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    @foreach($shops as $shop)
                        <li class="list-group-item" style="margin-top: 15px">
                            <b>Navn:</b> {{ $shop->name }}
                            <b>Adresse:</b> {{ $shop->address }}
                            <span class="pull-right clearfix">
                            <form action="{{ url('admin/sletbutik/' . $shop->id) }}" method="post">
                            <button type="submit" class="btn btn-xs btn-danger">Slet</button>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                            </span>
                            <span class="pull-right clearfix" style="margin-right: 10px">
                            <a href="{{ url('admin/sebutik/' . $shop->id) }}"><button class="btn btn-xs btn-primary">Opdater</button></a>
                            </span>
                        </li>
                    @endforeach
                </ul>
            </div>

        </div>
        {{ $shops->links('') }}
    </div>
@endsection