<?php


namespace App\Http\Controllers;

use App\Models\SpecialNeed;

use App\Models\Profile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;
class SpecialNeedController extends Controller
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
        $spneeds = SpecialNeed::all();
        return view('specialneeds.list',['spneeds'=> $spneeds]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('specialneeds.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
          $spneeds = new SpecialNeed();
        
          $this->validate($request, $spneeds->rules);
          $spneeds = $spneeds->create($request->all());

          \Session::flash('mensagem_sucesso', 'Necessidade especial cadastrada com sucesso');

          return Redirect::to('specialneeds');
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
        $spneeds = SpecialNeed::findorfail($id);
        
        return view('specialneeds.form',['spneeds'=> $spneeds]);
          
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
        $spneeds = SpecialNeed::findorfail($id);

        $this->validate($request, $spneeds->rules);
        
        $spneeds->update($request->all());

        \Session::flash('mensagem_sucesso', 'Necessidade Especial atualizada com sucesso');
        
         return Redirect::to('specialneeds');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         
        $spneeds = SpecialNeed::findorfail($id);
        
        $spneeds->delete();

       \Session::flash('mensagem_sucesso', 'Necessidade Especial deletada com sucesso');
       
        return Redirect::to('specialneeds');
 
     }

    public function confirmdestroy($id)
    {
        
        $spneeds = SpecialNeed::findorfail($id);
        
        return view('specialneeds.deleteConfirm',['spneeds'=> $spneeds]);


    }
}
