@extends('layouts.app')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">


                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success">
                        {{ session('status') }}
                    </div>
                    @endif
                    <div class="container">
                        <div class="row justify-content-center">

                            </div>
                            <div>
                                <h2 align="center">Lista de Torneos de Mario Kart</h2>
                                <br>
                                <!-- Se inicia el form (ojo todos los elementos de formulario deben ir dentro de esta etiqueta-->
                                <table class="table table-striped table-bordered panel-body">
                  <thead>
                    <tr>
                      <td>Nombre</td>
                      <td>Fecha</td>
                      <td>MaxParticipantes</td>
                      <td>Juego</td>
                      <td>Puntos</td>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach($torneos as $key => $value)
                    <tr>
                      <td><a href="{{ action('TorneoController@Vertorneo',[$value->id] )}}">{{ $value->Nombre }}</td>
                      <td>{{ $value->Fecha }}</td>
                      <td>{{ $value->MaxParticipantes }}</td>
                      <td>{{ $value->Juego }}</td>
                      <td>{{ $value->Puntos }}</td>
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
</form>
</td>
</tr>
</tbody>
</table>
</div>
@endsection