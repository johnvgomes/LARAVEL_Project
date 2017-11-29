<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Profile;
use App\Models\SpecialNeed;
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
        $profile = Profile::all();
        return view('profiles.list',['profile'=> $profile]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        $profile = Profile::all();
        $specialNeeds = SpecialNeed::all();

        return view('profiles.form',['profile'=> $profile, 'specialNeeds' => $specialNeeds]);
    
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
            $profile->mobile = $request->mobile;
            $profile->scholarity = $request->scholarity;

            $profile->user_id = Auth::user()->id;
            $status = $profile->save();

            $selected_special_needs = array();

            foreach ($request->special_need as $sn) {
                if(array_key_exists('id', $sn)) {
                    $selected_special_needs[$sn['id']] = array('observation' => "". $sn['observation'], 'permanent' => $sn['permanent']);
                }
            }

            $profile->specialNeeds()->sync($selected_special_needs);

            if ($status){
                \Session::flash('mensagem_sucesso', 'Perfil cadastrado com sucesso');
                
                 return Redirect::to('profiles');
            } else {
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
        $specialNeeds = SpecialNeed::all();
       // $spneedselected = $profile->profiles()->findOrFail($id);
       
        
        return view('profiles.form',compact('profile','specialNeeds'));
          
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
        $profile->mobile = $request->mobile;
        $profile->scholarity = $request->scholarity;

        $profile->user_id = Auth::user()->id;
        $status = $profile->save();

        $selected_special_needs = array();

        foreach ($request->special_need as $sn) {
            if(array_key_exists('id', $sn)) {
                $selected_special_needs[$sn['id']] = array('observation' => "". $sn['observation'], 'permanent' => $sn['permanent']);
            }
        }

        $profile->specialNeeds()->sync($selected_special_needs);

        
        if ($status){
            \Session::flash('mensagem_sucesso', 'Perfil atualizado com sucesso');
            
             return Redirect::to('profiles');
        } else {
            \Session::flash('mensagem_sucesso', 'Erro ao atualizar o perfil.');
            
             return Redirect::to('profiles');
        }

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
