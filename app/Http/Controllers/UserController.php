<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Support\Facades\Redirect;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input; 
//use Illuminate\Foundation\Auth\User as  Auth;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{

   public function index()
   {
        //
   }






   public function update($id)

   {
        // validate
        // read more on validation at http://laravel.com/docs/validation
    $rules = array(
        'Nom'       => 'required',
        'email'      => 'required|email',
        'Cuentalol' => 'String',
        'Cuentablizzard' => 'String',
        'Cuentanintendo' =>'String',
        );
    $validator = Validator::make(Input::all(), $rules);

        // process the login
    
            // store
    $user = User::find(Auth::user()->id);


    $user->name     = Input::get('Nom');
    $user->email      = Input::get('email');
    $user->Cuentalol      = Input::get('Cuentalol');
    $user->Cuentablizzard      = Input::get('Cuentablizzard');
    $user->Cuentanintendo      = Input::get('Cuentanintendo');
    $user->save();
             //if ( ! Request::input('password') == '') {
                //Auth::user()->password = bcrypt(Request::input('password'));
              //}with('notice', 'Nueva contraseña guardada correctamente');
            // redirect
    Session::flash('message', 'Actualización satisfactoria!');
    return Redirect::to('/perfil');
}


public function updatepwd($id) {
    $rules = array(
        'password'       => 'required|string|min:6|confirmed',
        );
    $validator = Validator::make(Input::all(), $rules);

    $messages = array(
        'required' => 'El campo :attribute es obligatorio.',
        'min' => 'El campo :attribute no puede tener menos de :min carácteres.'
        );


    $user = User::find(Auth::user()->id);
    $user->password= Hash::make(Input::get('password'));

    if($user->save()){
        return Redirect::to('/perfil')->with('notice', 'Nueva contraseña guardada correctamente');
    }
    else
    {
     return Redirect::to('/Changepwd')->with('notice', 'No se ha podido guardar la nueva contaseña');
    }
}


public function updateimg($id) {
    
    $user = User::find(Auth::user()->id);
    $user->fotoperfil= Input::get('imgavatar');

    $user->save();
    return Redirect::to('/perfil');
}

}
