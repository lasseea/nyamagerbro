@extends('layouts.app')

@section('title')
    Tilføj Jobopslag
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-defualt">
            <div class="panel-body">
                <form action="{{ url('admin/tilføjjobopslag') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <h3>Udfyld information om jobopslag</h3>
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
                            <input type="text" name="title" id="title" class="form-control" value="{{ old('title') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="brief_description" class="col-sm-3 control-label">Kort beskrivelse</label>
                        <div class="col-sm-6">
                            <textarea name="brief_description" id="brief_description" class="form-control" rows="3">{{ old('brief_description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="full_description" class="col-sm-3 control-label">Fuld beskrivelse</label>
                        <div class="col-sm-6">
                            <textarea name="full_description" id="full_description" class="form-control" rows="5">{{ old('full_description') }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shop_name" class="col-sm-3 control-label">Butiksnavn</label>
                        <div class="col-sm-6">
                            <input type="text" name="shop_name" id="shop_name" class="form-control" value="{{ old('shop_name') }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn-success">Tilføj jobopslag</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection