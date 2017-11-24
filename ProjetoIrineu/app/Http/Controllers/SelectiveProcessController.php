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
       

        return view('selectiveprocesses.list',['selectiveprocesses'=> $selectiveprocesses]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('selectiveprocesses.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
          $selectiveprocess = new SelectiveProcess();
        
          $selectiveprocess = $selectiveprocess->create($request->all());


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
        $selectiveprocess = SelectiveProcess::findorfail($id);
        
        return view('selectiveprocesses.form',['selectiveprocesses'=> $selectiveprocess]);
          
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
        $selectiveprocess = SelectiveProcess::findorfail($id);
        
        $selectiveprocess->update($request->all());

        \Session::flash('mensagem_sucesso', 'Processo seletivo atualizado com sucesso!');
        
         return Redirect::to('selectiveprocesses/'.$selectiveprocess->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       $selectiveprocess = SelectiveProcess::findorfail($id);
       
       $selectiveprocess->delete();

      \Session::flash('mensagem_sucesso', 'Processo seletivo deletado com sucesso!');
      
       return Redirect::to('selectiveprocesses');

    }

    public function confirmdestroy($id)
    {
        
        $selectiveprocess = SelectiveProcess::findorfail($id);
        
        return view('selectiveprocesses.deleteConfirm',['selectiveprocesses'=> $selectiveprocess]);

    }
}