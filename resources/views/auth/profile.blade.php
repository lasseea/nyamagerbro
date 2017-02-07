@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Min profil</h2>
        <br>
        @if(Session::has('status'))
            <div class="alert alert-success"><em> {!! session('status') !!}</em></div>
        @endif
        <p><b>Navn:</b> {{ Auth::user()->name }}</p>
        <p><b>E-mail:</b> {{ Auth::user()->email }}</p>
        <form action="{{ url('tilmeld/job') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
            <button type="submit" class="btn-success">Tilmeld nyheder om job</button>
        </form>
        <br>
        <form action="{{ url('tilmeld/lokale') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
            <button type="submit" class="btn-success">Tilmeld nyheder om lokaler</button>
        </form>
        <br>
        <form action="{{ url('tilmeld/event') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
            <button type="submit" class="btn-success">Tilmeld events og nyheder</button>
        </form>
        <br>
        <br>

        <form action="{{ url('afmeld/job') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
            <button type="submit" class="btn-danger">Afmeld nyheder om jobs</button>
            {{ method_field('DELETE') }}
        </form>
        <br>
        <form action="{{ url('afmeld/lokale') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
            <button type="submit" class="btn-danger">Afmeld nyheder om lokaler</button>
            {{ method_field('DELETE') }}
        </form>
        <br>
        <form action="{{ url('afmeld/event') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
            {{ csrf_field() }}
            <input type="hidden" name="user_id" value={{ Auth::user()->id }}>
            <button type="submit" class="btn-danger">Afmeld events og nyheder</button>
            {{ method_field('DELETE') }}
        </form>
        <br>
    </div>
@endsection