<?php

namespace App\Http\Controllers;

use App\Models\SelectiveProcess;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;
use App\Models\Quota;
use App\Models\Course;

class SelectiveProcessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
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
        $selectiveprocesses = SelectiveProcess::all();
        $quotas = Quota::all();
        $courses = Course::all();
        return view('selectiveprocesses.form',['selectiveprocesses'=> $selectiveprocesses,'courses'=> $courses ,'quotas'=> $quotas]);
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $selectiveprocess = new SelectiveProcess();
    
        $selectiveprocess->name = $request->name;
        $selectiveprocess->start_date = $request->start_date;
        $selectiveprocess->end_date = $request->end_date;
        $selectiveprocess->description = $request->description;
        $selectiveprocess->active = $request->active;

        $status = $selectiveprocess->save();

        $selected_courses = array();
        $selected_quotas = array();
     
        foreach ($request->course as $course) {
            if(array_key_exists('id', $course)) {
                $selected_courses[$course['id']] = array('vacancy' => "".$course['vacancy']);
            }
        }

       // dd($selected_courses);

        $selectiveprocess->courses()->sync($selected_courses);


        foreach ($request->quotas as $quotas) {
            if(array_key_exists('id', $quotas)) {
                $selected_quotas[$quotas['id']] = array('vacancy' => "".$quotas['vacancy']);
            }
        }

        $selectiveprocess->quotas()->sync($selected_quotas);

        if ($status){
            \Session::flash('mensagem_sucesso', 'Processo Seletivo cadastrado com sucesso!');
            
             return Redirect::to('selectiveprocesses');
        } else {
            \Session::flash('error', 'Ocorreu algum erro ao cadastrar o Processo Seletivo!');
            
             return Redirect::to('selectiveprocesses/create');
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
        $selectiveprocess = SelectiveProcess::findorfail($id);

        $quotas = Quota::all();
        $courses = Course::all();
        return view('selectiveprocesses.form',['selectiveprocesses'=> $selectiveprocess,'courses'=> $courses ,'quotas'=> $quotas]);
          
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
       $selectiveprocess->courses()->detach();
       $selectiveprocess->quotas()->detach();

       $selectiveprocess->delete();

      \Session::flash('mensagem_sucesso', 'Processo seletivo deletado com sucesso!');
      
       return Redirect::to('selectiveprocesses');

    }

    public function confirmDestroy($id)
    {
        
        $selectiveprocess = SelectiveProcess::findorfail($id);
        
        return view('selectiveprocesses.deleteConfirm',['selectiveprocesses'=> $selectiveprocess]);

    }
}