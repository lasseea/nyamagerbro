@extends('layouts.app')

@section('title')
    Pictures
@endsection

@section('content')


    <div class="container">
        @if(Session::has('status'))
            <div class="alert alert-success"><em> {!! session('status') !!}</em></div>
        @endif
        <h1>Upload billede</h1>
            <p>Her uploades billeder såsom logoer til butikker og billeder til event- og udlejningsopslag.</p>
        <form action="{{ URL::to('admin/billeder') }}" method="post" enctype="multipart/form-data">
            <label>Vælg billede til upload:</label>
            <input type="file" name="file" id="file">
            <input type="submit" value="Upload" name="submit">
            {{ csrf_field() }}
        </form>
    </div>
@endsection