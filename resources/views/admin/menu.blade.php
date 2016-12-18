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
            <a href="{{ url('/admin/nybutik') }}" class="list-group-item list-group-item-action">Butik</a>
            <a href="{{ url('/admin/nyevent') }}" class="list-group-item list-group-item-action">Event/Nyhed</a>
            <a href="{{ url('/admin/nytjobopslag') }}" class="list-group-item list-group-item-action">Jobopslag</a>
            <a href="{{ url('/admin/nytlokale') }}" class="list-group-item list-group-item-action">Lokaleudlejning</a>
        </div>
        <div class="list-group">
            <a href="#" class="list-group-item active">
                Opdater/Slet:
            </a>
            <a href="{{ url('/admin/butikker') }}" class="list-group-item list-group-item-action">Butik</a>
            <a href="{{ url('/admin/events') }}" class="list-group-item list-group-item-action">Event/Nyhed</a>
            <a href="{{ url('/admin/jobopslag') }}" class="list-group-item list-group-item-action">Jobopslag</a>
            <a href="{{ url('/admin/lokaler') }}" class="list-group-item list-group-item-action">Lokaleudlejning</a>
        </div>
    </div>
@endsection