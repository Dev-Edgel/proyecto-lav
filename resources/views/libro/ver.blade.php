<div>{{$libro->titulo}} - <strong>{{$libro->autor}}</strong></div>
<div>{{$libro->isbn}}</div>
<div><img src="{{Storage::url("imagenes/caratulas/$libro->foto")}}" alt="Caratula del libro" width="100%"></div>