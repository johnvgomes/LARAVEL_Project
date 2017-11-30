<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\Quota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;
class QuotaController extends Controller
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
        $quota = Quota::all();
        return view('quotas.list',compact('quota'));
   
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('quotas.form');
        
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $quota = new Quota();

        $this->validate($request, $quota->rules);
        $quota->name = $request->name;

        $status = $quota->save();
        if($quota->save()) {

            \Session::flash('mensagem_sucesso', 'Cota criada com sucesso');

            return Redirect::to('quotas');
          } else {
           
            \Session::flash('mensagem_sucesso', 'Erro ao criar cota');
            
            return Redirect::to('quotas/create');
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
        $quota = Quota::findorfail($id);
        
        return view('quotas.form',['quotas'=> $quota]);
          
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
        $quota = Quota::findorfail($id);
        
        $this->validate($request, $quota->rules);
        $quota->update($request->all());
        
                
        if($quota->save()) {
            \Session::flash('mensagem_sucesso', 'Cota atualizada com sucesso');
            
             return Redirect::to('quotas');
            
        } else {
           
            \Session::flash('mensagem_sucesso', 'Erro ao atualizar cota');
            
             return Redirect::to('quotas.edit');
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
         
        $quota = Quota::findorfail($id);
        
        $quota->delete();
        \Session::flash('mensagem_sucesso', 'Cota deletada com sucesso');
        
         return Redirect::to('quotas.index');
     }
    public function confirmDestroy($id)
    {
        
        $quota = Quota::findorfail($id);
        
        return view('quotas.deleteConfirm',['quota'=> $quota]);
    }
}