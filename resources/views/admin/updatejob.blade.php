@extends('layouts.app')

@section('title')
    Ret Jobopslag
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-defualt">
            <div class="panel-body">
                @foreach ($jobs as $job)
                    <form action="{{ url('admin/retjobopslag/' . $job->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                        <h3>Ret information om jobopslag</h3>
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
                                <input type="text" name="title" id="title" class="form-control" value="{{ $job->title }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="brief_description" class="col-sm-3 control-label">Kort beskrivelse</label>
                            <div class="col-sm-6">
                                <textarea name="brief_description" id="brief_description" class="form-control" rows="3">{{ $job->brief_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="full_description" class="col-sm-3 control-label">Fuld beskrivelse</label>
                            <div class="col-sm-6">
                                <textarea name="full_description" id="full_description" class="form-control" rows="5">{{ $job->full_description }}</textarea>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="shop_name" class="col-sm-3 control-label">Butiksnavn</label>
                            <div class="col-sm-6">
                                <input type="text" name="shop_name" id="shop_name" class="form-control" value="{{ $job->name }}">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-6">
                                <button type="submit" class="btn-success">Ret jobopslag</button>
                            </div>
                        </div>
                        {{ csrf_field() }}
                    </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection