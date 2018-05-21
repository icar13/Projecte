<?php

namespace App\Http\Controllers;
use Session;
use App\torneo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Support\Facades\Auth;
use View;

class TorneoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
           $request->user()->authorizeRoles('admin');
           $torneos =Torneo::all();

        // load the view and pass the nerds
          return view('index')
             ->with("torneos", $torneos);
      }      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View('Torneo.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          $rules = array(
            'Nombre'       => 'required',
            'Fecha'      => 'required',
            'MaxParticipantes' => 'required|numeric',
            'Juego'=>'required|String|max:255'
        );

            $validator = Validator::make(Input::all(), $rules);

              if ($validator->fails()) {
            return Redirect::to('/perfil')
                ->withErrors($validator);
         }
         else {
            // store
            $torneo = new Torneo;
            $torneo->Nombre      = Input::get('Nombre');
            $torneo->Fecha     = Input::get('Fecha');
            $torneo->maxparticipantes = Input::get('MaxParticipantes');
            $torneo->juego     = Input::get('Juego');
            $torneo->Puntos     = Input::get('Puntos');
            $torneo->name_user_create = Auth::user()->name;
            $torneo->Estado = 'Pendiente';

            $torneo->save();

              Session::flash('message', 'Torneo creado satisfactoriamente');
              return Redirect::to('/Torneo');
    }}

    /**
     * Display the specified resource.
     *
     * @param  \App\torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
          $torneo = Torneo::find($id);
         return View('EditTorneo',compact('torneo'));
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function edit(torneo $torneo)
    {
        $torneo=Torneo::find($id);
        return view('Torneo.edit',compact('torneo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
          $rules = array(
            'id'       => 'required',
            'Nombre'       => 'required',
            'Fecha'      => 'required',
            'MaxParticipantes' => 'required|numeric',
            'Juego'=>'required|String|max:255'
        );
    $validator = Validator::make(Input::all(), $rules);

        // process the login
    
            // store
    $torneo = Torneo::find($id);


    $torneo->Nombre     = Input::get('Nombre');
    $torneo->Fecha      = Input::get('Fecha');
    $torneo->MaxParticipantes      = Input::get('MaxParticipantes');
    $torneo->Puntos      = Input::get('Puntos');
    $torneo->Juego      = Input::get('Juego');
    $torneo->Estado      = Input::get('Estado');
    $torneo->save();
             //if ( ! Request::input('password') == '') {
                //Auth::user()->password = bcrypt(Request::input('password'));
              //}with('notice', 'Nueva contraseña guardada correctamente');
            // redirect
    Session::flash('message', 'Actualización satisfactoria!');
    return Redirect::to('/lista');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $torneo=Torneo::find($id);
        $torneo->delete();
          Session::flash('message', 'Successfully deleted the nerd!');
          return Redirect::to('Torneo');
    }
    public function VerMario()
    {

        
           $torneos =Torneo::all()->where('Juego','Mario Kart');

        // load the view and pass the nerds
          return View('TorneosMario',compact('torneos'));
           


      }      
      public function VerLOL()
    {

        
           $torneos =Torneo::all()->where('Juego','League of Legends');

        // load the view and pass the nerds
          return View('TorneosLOL',compact('torneos'));
           


      }     
       public function VerHearthstone()
    {

        
           $torneos =Torneo::all()->where('Juego','Hearthstone');

        // load the view and pass the nerds
          return View('TorneosHearthstone',compact('torneos'));
           


      }       
       public function VerOverwatch()
    {

        
           $torneos =Torneo::all()->where('Juego','Overwatch');

        // load the view and pass the nerds
          return View('TorneosOverwatch',compact('torneos'));
           


      }   
     public function verTorneo($id)
    {   
           $torneo = Torneo::find($id);
         return View('VerTorneoUser',compact('torneo'));
           
      }   


}
