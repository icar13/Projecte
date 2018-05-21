<?php

namespace App\Http\Controllers;

use Session;
use App\Participantes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect; 
use Illuminate\Support\Facades\Auth;

use View;

class ParticipantesController extends Controller
{

	public function index($idtorneo)
    {

        
           $participantes =Participantes::all()->where('torneo_id',$idtorneo);

        // load the view and pass the nerds
          return View('ParticipantsTorneig',compact('participantes'));
           


      }      

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($idtorneo)
    {

            
       				
            // Store
            $participante = new Participantes;
            $participante->user_id = Auth::user()->id;
               $participante->name = Auth::user()->name;
            $participante->torneo_id     = $idtorneo;
           
            $participante->save();

              Session::flash('message', 'Participante inscrito satisfactoriamente');
              return Redirect::to('/');
    
}

    /**
     * Display the specified resource.
     *
     * @param  \App\torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       
       }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function edit(torneo $torneo)
    {
        
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
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\torneo  $torneo
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $participante_torneo=Participantes::find($id);
        $participante_torneo->delete();
          Session::flash('message', 'Successfully deleted the participante!');
          return Redirect::to('/');
    }

    public function VerParticipantes($idtorneo)
    {
           
           $participantes =Participantes::all()->where('torneo_id',$idtorneo);

      
        
                     return View('ParticipantsTorneig',compact('participantes'));

      }    

      public function vista(){
      	  return view('ParticipantsTorneig');
      }
}
