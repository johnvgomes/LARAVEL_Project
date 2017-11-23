<?php

namespace App\Http\Controllers;

use App\Models\SelectiveProcess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class SelectiveProcessController extends Controller
{
    public function index()
    {
        $selectiveprocesses = SelectiveProcess::all();
       

        return view('selectiveprocesses.lista',['selectiveprocesses'=> $selectiveprocesses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('selectiveprocesses.formulario');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
          $selectiveprocesses = new SelectiveProcess();
        
          $selectiveprocesses = $selectiveprocesses->create($request->all());


          \Session::flash('mensagem_sucesso', 'processo seletivo criado com sucesso!');

          return Redirect::to('selectiveprocesses/create');
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
        $selectiveprocesses = SelectiveProcess::findorfail($id);
        
        return view('selectiveprocesses.formulario',['selectiveprocesses'=> $selectiveprocesses]);
          
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
        $selectiveprocesses = SelectiveProcess::findorfail($id);
        
        $selectiveprocesses->update($request->all());

        \Session::flash('mensagem_sucesso', 'Processo seletivo atualizado com sucesso!');
        
         return Redirect::to('selectiveprocesses/'.$selectiveprocesses->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       $selectiveprocesses = SelectiveProcess::findorfail($id);
       
       $selectiveprocesses->delete();

      \Session::flash('mensagem_sucesso', 'Processo seletivo deletado com sucesso!');
      
       return Redirect::to('selectiveprocesses');

    }

    public function confirmdestroy($id)
    {
        
        $selectiveprocesses = SelectiveProcess::findorfail($id);
        
        return view('selectiveprocesses.deleteConfirm',['selectiveprocesses'=> $selectiveprocesses]);


    }
}