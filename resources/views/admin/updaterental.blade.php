@extends('layouts.app')

@section('title')
    Ret Lokale
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-defualt">
            <div class="panel-body">
                @foreach ($rentals as $rental)
                    <form action="{{ url('admin/retlokale/' . $rental->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <h3>Ret information om lokale</h3>
                        <br>
                        @if(Session::has('status'))
                            <div class="alert alert-success"><em> {!! session('status') !!}</em></div>
                        @endif
                        @if (count($errors) > 0)
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                        <div class="form-group">
                            <label for="title" class="col-sm-3 control-label">Titel</label>
                            <div class="col-sm-6">
                                <input type="text" name="title" id="title" class="form-control" value="{{ $rental->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="address" class="col-sm-3 control-label">Adresse</label>
                            <div class="col-sm-6">
                                <input type="text" name="address" id="address" class="form-control" value="{{ $rental->address }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brief_description" class="col-sm-3 control-label">Kort beskrivelse</label>
                            <div class="col-sm-6">
                                <textarea name="brief_description" id="brief_description" class="form-control" rows="3">{{ $rental->brief_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="full_description" class="col-sm-3 control-label">Fuld beskrivelse</label>
                            <div class="col-sm-6">
                                <textarea name="full_description" id="full_description" class="form-control" rows="5">{{ $rental->full_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label class="col-sm-3 control-label">Nuværende billede:</label>
                            <div class="col-sm-6">
                                <img src="{{ $rental->room_img_link }}" class="small_img" title="Intet billede">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="room_img_link" class="col-sm-3 control-label">Lokale - upload nyt billede:</label>
                            <div class="col-sm-6">
                                <input type="file" name="room_img_link" id="room_img_link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remove_image" class="col-sm-3 control-label">Fjern billede:</label>
                            <div class="col-sm-6">
                                <input type="checkbox" name="remove_image" id="remove_image" class="form-inline">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn-success">Ret lokale</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection