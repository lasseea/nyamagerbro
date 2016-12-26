@extends('layouts.app')

@section('title')
    Ret Event/Nyhed
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-defualt">
            <div class="panel-body">
                @foreach($events as $event)
                    <form action="{{ url('admin/tilføjevent') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <h3>Ret information om event/nyhed</h3>
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
                                <input type="text" name="title" id="title" class="form-control" value="{{ $event->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="date" class="col-sm-3 control-label">Dato</label>
                            <div class="col-sm-6">
                                <input type="date" name="date" id="date" class="form-control" value="{{ $event->date }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brief_description" class="col-sm-3 control-label">Kort beskrivelse</label>
                            <div class="col-sm-6">
                                <textarea name="brief_description" id="brief_description" class="form-control" rows="3">{{ $event->brief_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="full_description" class="col-sm-3 control-label">Fuld beskrivelse</label>
                            <div class="col-sm-6">
                                <textarea name="full_description" id="full_description" class="form-control" rows="5">{{ $event->full_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="event_img_link" class="col-sm-3 control-label">Event/Nyhed billede - upload nyt billede:</label>
                            <div class="col-sm-6">
                                <input type="file" name="event_img_link" id="event_img_link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remove_image1" class="col-sm-3 control-label">Fjern event/nyhed billede:</label>
                            <div class="col-sm-6">
                                <input type="checkbox" name="remove_image1" id="remove_image1" class="form-inline">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="small_img_link" class="col-sm-3 control-label">Småt event/nyhed billede - upload nyt billede:</label>
                            <div class="col-sm-6">
                                <input type="file" name="small_img_link" id="small_img_link" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="remove_image2" class="col-sm-3 control-label">Fjern småt event/nyhed billede:</label>
                            <div class="col-sm-6">
                                <input type="checkbox" name="remove_image2" id="remove_image2" class="form-inline">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn-success">Ret event/nyhed</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection