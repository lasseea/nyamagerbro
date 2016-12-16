@extends('layouts.app')

@section('title')
    Admin
@endsection

@section('content')
    <div class="container">
        <h2>Admin panel</h2>
        <br>
        <div class="list-group">
            <a href="#" class="list-group-item active">
                Tilføj:
            </a>
            <a href="#" class="list-group-item list-group-item-action">Butik</a>
            <a href="#" class="list-group-item list-group-item-action">Nyhed/Event</a>
            <a href="#" class="list-group-item list-group-item-action">Jobopslag</a>
            <a href="#" class="list-group-item list-group-item-action">Lokaleudlejning</a>
            <a href="#" class="list-group-item list-group-item-action">Billede/Logo</a>
        </div>
        <div class="list-group">
            <a href="#" class="list-group-item active">
                Opdater/Slet:
            </a>
            <a href="#" class="list-group-item list-group-item-action">Butik</a>
            <a href="#" class="list-group-item list-group-item-action">Nyhed/Event</a>
            <a href="#" class="list-group-item list-group-item-action">Jobopslag</a>
            <a href="#" class="list-group-item list-group-item-action">Lokaleudlejning</a>
            <a href="#" class="list-group-item list-group-item-action">Billede/Logo</a>
        </div>
    </div>
@endsection