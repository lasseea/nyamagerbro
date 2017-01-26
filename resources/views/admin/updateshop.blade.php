@extends('layouts.app')

@section('title')
    Ret Butik
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-defualt">
            <div class="panel-body">
                @foreach($shops as $shop)
                <form action="{{ url('admin/retbutik/' . $shop->id) }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <h3>Ret information om butik</h3>
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
                        <label for="name" class="col-sm-3 control-label">Navn</label>
                        <div class="col-sm-6">
                            <input type="text" name="name" id="name" class="form-control" value="{{ $shop->name }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shop_type" class="col-sm-3 control-label">Butikstype</label>
                        <div class="col-sm-6">
                            @if ($shop->shop_type_id == '1')
                                <div class="radio">
                                    <label><input type="radio" name="shop_type" value="1" checked>Tøj</label>
                                </div>
                            @else
                                <div class="radio">
                                    <label><input type="radio" name="shop_type" value="1">Tøj</label>
                                </div>
                            @endif
                            @if ($shop->shop_type_id == '2')
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="2" checked>Sko</label>
                                    </div>
                                @else
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="2">Sko</label>
                                    </div>
                                @endif
                                @if ($shop->shop_type_id == '3')
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="3" checked>Spisested/Café</label>
                                    </div>
                                @else
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="3">Spisested/Café</label>
                                    </div>
                                @endif
                                @if ($shop->shop_type_id == '4')
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="4" checked>Bolig/Isenkram</label>
                                    </div>
                                @else
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="4">Bolig/Isenkram</label>
                                    </div>
                                @endif
                                @if ($shop->shop_type_id == '5')
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="5" checked>Dagligvarer</label>
                                    </div>
                                @else
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="5">Dagligvarer</label>
                                    </div>
                                @endif
                                @if ($shop->shop_type_id == '6')
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="6" checked>Sport/Fritid</label>
                                    </div>
                                @else
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="6">Sport/Fritid</label>
                                    </div>
                                @endif
                                @if ($shop->shop_type_id == '7')
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="7" checked>Tilbehør/Personlig pleje</label>
                                    </div>
                                @else
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="7">Tilbehør/Personlig pleje</label>
                                    </div>
                                @endif
                                @if ($shop->shop_type_id == '8')
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="8" checked>Andre faciliteter</label>
                                    </div>
                                @else
                                    <div class="radio">
                                        <label><input type="radio" name="shop_type" value="8">Andre faciliteter</label>
                                    </div>
                                @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Adresse</label>
                        <div class="col-sm-6">
                            <input type="text" name="address" id="address" class="form-control" value="{{ $shop->address }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">Telefon</label>
                        <div class="col-sm-6">
                            <input type="text" name="phone" id="phone" class="form-control" value="{{ $shop->phone }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Beskrivelse</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" class="form-control" rows="5">{{ $shop->description }}</textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="logo_img_link" class="col-sm-3 control-label">Logo - upload nyt billede:</label>
                        <div class="col-sm-6">
                            <input type="file" name="logo_img_link" id="logo_img_link" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="remove_logo" class="col-sm-3 control-label">Fjern logo:</label>
                        <div class="col-sm-6">
                            <input type="checkbox" name="remove_logo" id="remove_logo" class="form-inline">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="website" class="col-sm-3 control-label">Hjemmeside</label>
                        <div class="col-sm-6">
                            <input type="url" name="website" id="website" class="form-control" value="{{ $shop->website }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="google_maps_url" class="col-sm-3 control-label">Google Maps URL</label>
                        <div class="col-sm-6">
                            <input type="text" name="google_maps_url" id="google_maps_url" class="form-control" value="{{ $shop->website }}">
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="col-sm-3 control-label"><b>Åbningstider</b></p>
                        <p class="col-sm-3 control-label">(Undlad tider for dage der er lukket)</p>
                    </div>
                    @foreach ($businesshours as $businesshour)
                        @if ($businesshour->day_of_week == 0)
                            <div class="form-group">
                                <label for="monday_start" class="col-sm-3 control-label">Mandag</label>
                                <div class="col-sm-6">
                                    Fra: <input type="time" name="monday_start" id="monday_start" value="{{ $businesshour->open_time }}">
                                    Til: <input type="time" name="monday_end" id="monday_end" value="{{ $businesshour->close_time }}">
                                </div>
                            </div>
                        @elseif ($businesshour->day_of_week == 1)
                            <div class="form-group">
                                <label for="tuesday_start" class="col-sm-3 control-label">Tirsdag</label>
                                <div class="col-sm-6">
                                    Fra: <input type="time" name="tuesday_start" id="tuesday_start" value="{{ $businesshour->open_time }}">
                                    Til: <input type="time" name="tuesday_end" id="tuesday_end" value="{{ $businesshour->close_time }}">
                                </div>
                            </div>
                        @elseif ($businesshour->day_of_week == 2)
                            <div class="form-group">
                                <label for="wednesday_start" class="col-sm-3 control-label">Onsdag</label>
                                <div class="col-sm-6">
                                    Fra: <input type="time" name="wednesday_start" id="wednesday_start" value="{{ $businesshour->open_time }}">
                                    Til: <input type="time" name="wednesday_end" id="wednesday_end" value="{{ $businesshour->close_time }}">
                                </div>
                            </div>
                        @elseif ($businesshour->day_of_week == 3)
                            <div class="form-group">
                                <label for="thursday_start" class="col-sm-3 control-label">Torsdag</label>
                                <div class="col-sm-6">
                                    Fra: <input type="time" name="thursday_start" id="thursday_start" value="{{ $businesshour->open_time }}">
                                    Til: <input type="time" name="thursday_end" id="thursday_end" value="{{ $businesshour->close_time }}">
                                </div>
                            </div>
                        @elseif ($businesshour->day_of_week == 4)
                            <div class="form-group">
                                <label for="friday_start" class="col-sm-3 control-label">Fredag</label>
                                <div class="col-sm-6">
                                    Fra: <input type="time" name="friday_start" id="friday_start" value="{{ $businesshour->open_time }}">
                                    Til: <input type="time" name="friday_end" id="friday_end" value="{{ $businesshour->close_time }}">
                                </div>
                            </div>
                        @elseif ($businesshour->day_of_week == 5)
                            <div class="form-group">
                                <label for="saturday_start" class="col-sm-3 control-label">Lørdag</label>
                                <div class="col-sm-6">
                                    Fra: <input type="time" name="saturday_start" id="saturday_start" value="{{ $businesshour->open_time }}">
                                    Til: <input type="time" name="saturday_end" id="saturday_end" value="{{ $businesshour->close_time }}">
                                </div>
                            </div>
                        @elseif ($businesshour->day_of_week == 6)
                            <div class="form-group">
                                <label for="sunday_start" class="col-sm-3 control-label">Søndag</label>
                                <div class="col-sm-6">
                                    Fra: <input type="time" name="sunday_start" id="sunday_start" value="{{ $businesshour->open_time }}">
                                    Til: <input type="time" name="sunday_end" id="sunday_end" value="{{ $businesshour->close_time }}">
                                </div>
                            </div>
                        @endif
                    @endforeach
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn-success">Ret butik</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
                @endforeach
            </div>
        </div>
    </div>
@endsection