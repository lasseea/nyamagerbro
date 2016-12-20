@extends('layouts.app')

@section('title')
    Tilføj Lokale
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-defualt">
            <div class="panel-body">
                <form action="{{ url('admin/tilføjlokale') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <h3>Udfyld information om lokale</h3>
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
                            <input type="text" name="title" id="title" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Adresse</label>
                        <div class="col-sm-6">
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="brief_description" class="col-sm-3 control-label">Kort beskrivelse</label>
                        <div class="col-sm-6">
                            <textarea name="brief_description" id="brief_description" class="form-control" rows="3"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="full_description" class="col-sm-3 control-label">Fuld beskrivelse</label>
                        <div class="col-sm-6">
                            <textarea name="full_description" id="full_description" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="room_img_link" class="col-sm-3 control-label">Lokale - vælg billede til upload:</label>
                        <div class="col-sm-6">
                            <input type="file" name="room_img_link" id="room_img_link" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn-success">Tilføj lokale</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection