@extends('layouts.app')

@section('title')
    Butikker
@endsection

@section('content')
    <div class="container">
        <h1>Butikker</h1>
        <br>
        @if ($shoptypes->count())
        <div class="dropdown">
            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Vælg butikstype
                <span class="caret"></span></button>
            <ul class="dropdown-menu">
                @foreach($shoptypes as $shoptype)
                <li><a href="{{ url('butikker/' . $shoptype->id) }}">{{ $shoptype->shop_type }}</a></li>
                @endforeach
            </ul>
        </div></br>
        @endif
        @if (!$selectedtype['shop_type'] == null)
            <p><b>Valgte butikstype: </b>{{ $selectedtype['shop_type'] }}</p>
        @endif

        <h3>{{ $shops->total() }} butikker i alt</h3>
        <div class="row">
            <div class="col-md-6 col-md-offset-3">
                <ul class="list-group">
                    @foreach($shops as $shop)
                        <a href="{{ url('butikker/butik/' . $shop->id) }}">
                            <li class="list-group-item" style="margin-top: 15px">
                                <p><b>Butik:</b> {{ $shop->name }}</p>
                                <p><b>Adressse:</b> {{ $shop->address }}</p>
                                <p><b>Type:</b> {{ $shop->shop_type }}</p>
                                <img src="{{ $shop->logo_img_link }}" class="small_img">
                            </li>
                        </a>
                    @endforeach
                </ul>
            </div>
        </div>
        {{ $shops->links('') }}
    </div>
@endsection