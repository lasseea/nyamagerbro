@extends('layouts.app')

@section('title')
    Jobopslag
@endsection

@section('content')
    <div class="container">
        <h2>Jobsopslag opdater/slet</h2>
        <br>
        <h3>{{ $jobs->total() }} jobopslag i alt</h3>
        <p><b>På denne side ({{ $jobs->count() }} jobopslag)</b></p>
        @if(Session::has('status'))
            <div class="alert alert-success"><em> {!! session('status') !!}</em></div>
        @endif
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    @foreach($jobs as $job)
                    <li class="list-group-item" style="margin-top: 15px">
                        <span>
                            <b>Stilling:</b> {{ $job->title }}
                        </span>
                        <span>
                            <b>Butik:</b> {{ $job->name }}
                        </span>
                        <span class="pull-right clearfix">
                            <form action="{{ url('admin/sletjobopslag/' . $job->id) }}" method="post">
                            <button type="submit" class="btn btn-xs btn-danger">Slet</button>
                                {{ method_field('DELETE') }}
                                {{ csrf_field() }}
                            </form>
                        </span>
                        <span class="pull-right clearfix" style="margin-right: 10px">
                            <a href="{{ url('admin/sejobopslag/' . $job->id) }}"><button class="btn btn-xs btn-primary">Opdater</button></a>
                        </span>
                    </li>
                    @endforeach
                </ul>
            </div>

        </div>
        {{ $jobs->links('') }}
    </div>

@endsection