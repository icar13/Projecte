@extends('layouts.app')
@section('content')
<div>                
  <div class="row justify-content-center">
    <div class="content">
      <div class="col-md-offset-2">
        <div class="panel panel-default">
          <div class="panel-body">
            <div align="center"><h3>Lista Torneos</h3></div>
            <div class="pull-right">
              <div class="btn-group">
             </div>
             <div class="row justify-content-center">
              <a href="{{ url('/CrearTorneo') }}" id="botó" class="btn btn-primary">Crear torneo</a> </div>
              <div><br>
                <table class="table table-striped table-bordered panel-body">
                  <thead>
                    <tr>
                      <td>ID</td>
                      <td>Nombre</td>
                      <td>Fecha</td>
                      <td>MaxParticipantes</td>
                      <td>Juego</td>
                      <td>Puntos</td>
                      <td>Estado</td>
                      <td>Creador</td>
                      <td>Actions</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($torneos as $key => $value)
                    <tr>
                      <td>{{ $value->id }}</td>
                      <td><a href="{{ route('Torneo.show',[$value->id] )}}">{{ $value->Nombre }}</a></td>
                      <td>{{ $value->Fecha }}</td>
                      <td>{{ $value->MaxParticipantes }}</td>
                      <td>{{ $value->Juego }}</td>
                      <td>{{ $value->Puntos }}</td>
                       <td>{{ $value->Estado }}</td>
                      <td>{{ $value->name_user_create }}</td>
                     <td> <form action="{{action('TorneoController@destroy', $value->id)}}" method="post" >
                   {{csrf_field()}}
                   <input name="_method" type="hidden" value="DELETE">
              
                   <button class="btn btn-danger btn-xs" onclick="return confirm('Seguro que quieres eliminar este torneo?');" type="submit"><img class='icon' src="img/delete.png"></button>
                 </td>
                  </tr>
                  @endforeach
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>
@endsection