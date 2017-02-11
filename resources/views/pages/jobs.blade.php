@extends('layouts.app')

@section('title')
    Jobopslag
@endsection

@section('content')
    <div class="container">
        <h1>Ledige job</h1>
        <p>Skal dit næste job være på Ny Amagerbrogade?</p>
        <br>
        <p>Ny Amagerbrogade er et sted med mange spændende jobs inden for bred række af forskellige områder.</p>
        <p>Her på siden kan du se hvilke jobs der netop nu er ledige.</p>
        <p>Der ud over kan du løbende holde dig opdateret med fremtidige ledige job, ved at oprette en bruger og tilmelde dig vores mail tjeneste for automatisk at modtage information om nye ledige job.</p>
        <h3>{{ $jobs->total() }} jobopslag i alt</h3>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    @foreach($jobs as $job)
                        <a href="{{ url('jobs/' . $job->id) }}">
                            <li class="list-group-item" style="margin-top: 15px">
                                <p><b>Stilling:</b> {{ $job->title }}</p>
                                <p><b>Butik:</b> {{ $job->name }}</p>
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        {{ $jobs->links('') }}
    </div>
@endsection