@extends('layouts.app')

@section('title')
    Tilføj Butik
@endsection

@section('content')
    <div class="container">
        <div class="panel panel-defualt">
            <div class="panel-body">
                <form action="{{ url('admin/tilføjbutik') }}" method="post" class="form-horizontal" enctype="multipart/form-data">
                    <h3>Udfyld information om butik</h3>
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
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="shop_type" class="col-sm-3 control-label">Butikstype</label>
                        <div class="col-sm-6">
                            <div class="radio">
                                <label><input type="radio" name="shop_type" value="Tøj">Tøj</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="shop_type" value="Sko">Sko</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="shop_type" value="Spisested/Café">Spisested/Café</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="shop_type" value="Bolig/Isenkram">Bolig/Isenkram</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="shop_type" value="Dagligvarer">Dagligvarer</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="shop_type" value="Sport/Fritid">Sport/Fritid</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="shop_type" value="Tilbehør/Personlig pleje">Tilbehør/Personlig pleje</label>
                            </div>
                            <div class="radio">
                                <label><input type="radio" name="shop_type" value="Andre faciliteter">Andre faciliteter</label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="address" class="col-sm-3 control-label">Adresse</label>
                        <div class="col-sm-6">
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="phone" class="col-sm-3 control-label">Telefon</label>
                        <div class="col-sm-6">
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="description" class="col-sm-3 control-label">Beskrivelse</label>
                        <div class="col-sm-6">
                            <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="logo_img_link" class="col-sm-3 control-label">Logo - vælg billede til upload:</label>
                        <div class="col-sm-6">
                            <input type="file" name="logo_img_link" id="logo_img_link" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="website" class="col-sm-3 control-label">Hjemmeside</label>
                        <div class="col-sm-6">
                            <input type="url" name="website" id="website" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="google_maps_url" class="col-sm-3 control-label">Google Maps URL</label>
                        <div class="col-sm-6">
                            <input type="text" name="google_maps_url" id="google_maps_url" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <p class="col-sm-3 control-label"><b>Åbningstider</b></p>
                        <p class="col-sm-3 control-label">(Undlad tider for dage der er lukket)</p>
                    </div>
                    <div class="form-group">
                        <label for="monday_start" class="col-sm-3 control-label">Mandag</label>
                        <div class="col-sm-6">
                            Fra: <input type="time" name="monday_start" id="monday_start">
                            Til: <input type="time" name="monday_end" id="monday_end">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="tuesday_start" class="col-sm-3 control-label">Tirsdag</label>
                        <div class="col-sm-6">
                            Fra: <input type="time" name="tuesday_start" id="tuesday_start">
                            Til: <input type="time" name="tuesday_end" id="tuesday_end">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="wednesday_start" class="col-sm-3 control-label">Onsdag</label>
                        <div class="col-sm-6">
                            Fra: <input type="time" name="wednesday_start" id="wednesday_start">
                            Til: <input type="time" name="wednesday_end" id="wednesday_end">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="thursday_start" class="col-sm-3 control-label">Torsdag</label>
                        <div class="col-sm-6">
                            Fra: <input type="time" name="thursday_start" id="thursday_start">
                            Til: <input type="time" name="thursday_end" id="thursday_end">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="friday_start" class="col-sm-3 control-label">Fredag</label>
                        <div class="col-sm-6">
                            Fra: <input type="time" name="friday_start" id="friday_start">
                            Til: <input type="time" name="friday_end" id="friday_end">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="saturday_start" class="col-sm-3 control-label">Lørdag</label>
                        <div class="col-sm-6">
                            Fra: <input type="time" name="saturday_start" id="saturday_start">
                            Til: <input type="time" name="saturday_end" id="saturday_end">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="sunday_start" class="col-sm-3 control-label">Søndag</label>
                        <div class="col-sm-6">
                            Fra: <input type="time" name="sunday_start" id="sunday_start">
                            Til: <input type="time" name="sunday_end" id="sunday_end">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-6">
                            <button type="submit" class="btn-success">Tilføj butik</button>
                        </div>
                    </div>
                    {{ csrf_field() }}
                </form>
            </div>
        </div>
    </div>
@endsection