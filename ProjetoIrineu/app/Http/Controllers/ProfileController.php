<?php


namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;
class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $profiles = Profile::all();
        return view('profiles.lista',['profiles'=> $profiles]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('profiles.formulario');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
          $profiles = new Profile();
        
          $profiles = $profiles->create($request->all());


          \Session::flash('mensagem_sucesso', 'Perfil cadastrado com sucesso');

          return Redirect::to('profiles/create');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $profiles = Profile::findorfail($id);
        
        return view('profiles.formulario',['profiles'=> $profiles]);
          
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $profiles = Profile::findorfail($id);
        
        $profiles->update($request->all());

        \Session::flash('mensagem_sucesso', 'Perfil atualizado com sucesso');
        
         return Redirect::to('profiles/'.$spneeds->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         
        $profiles = Profile::findorfail($id);
        
        $profiles->delete();

       \Session::flash('mensagem_sucesso', 'Perfil deletado com sucesso');
       
        return Redirect::to('profiles');
 
     }

    public function confirmdestroy($id)
    {
        
        $profiles = Profile::findorfail($id);
        
        return view('profiles.deleteConfirm',['profiles'=> $profiles]);


    }
}
