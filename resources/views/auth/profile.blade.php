@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Min profilinformation</h2>
        <br>
        <p><b>Navn:</b> {{ Auth::user()->name }}</p>
        <p><b>E-mail:</b> {{ Auth::user()->email }}</p>

        <form action="{{ url('tilmeld/tilføjjobopslag') }}" method="post" class="form-horizontal" enctype="multipart/form-data">

        </form>
    </div>
@endsection