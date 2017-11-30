<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Address;
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

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $profile = Profile::all();
        return view('profiles.list',['profiles'=> $profile]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('profiles.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
          $profile = new Profile();
            $profile->date = $request->date;
            $profile->rg = $request->rg;
            $profile->rgemitter = $request->rgemitter;
            $profile->cpf = $request->cpf;
            $profile->sex = $request->sex;
            $profile->namefather = $request->namefather;
            $profile->namemother = $request->namemother;
            $profile->passport = $request->passport;
            $profile->naturaless = $request->naturaless;
            $profile->phone = $request->phone;
            $profile->mobile = $request->phone;
            $profile->scholarity = $request->scholarity;
            $profile->user_id = Auth::user()->id;

            if ($profile->save()){
                \Session::flash('mensagem_sucesso', 'Perfil cadastrado com sucesso');
                
                 return Redirect::to('profiles');
            }

            else{
                \Session::flash('mensagem_sucesso', 'Perfil cadastrado com sucesso');
                
                 return Redirect::to('profiles/create');
            }
            
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
        $profile = Profile::findorfail($id);
        
        return view('profiles.form',['profiles'=> $profile]);
          
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
        $profile = Profile::findorfail($id);
        
        $profile->update($request->all());

        \Session::flash('mensagem_sucesso', 'Perfil atualizado com sucesso');
        
         return Redirect::to('profiles');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         
        $profile = Profile::findorfail($id);
        
        $profile->delete();

       \Session::flash('mensagem_sucesso', 'Perfil deletado com sucesso');
       
        return Redirect::to('profiles');
 
     }

    public function confirmdestroy($id)
    {
        
        $profile = Profile::findorfail($id);
        
        return view('profiles.deleteConfirm',['profile'=> $profile]);


    }
}
