<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Http\Request;
use Validator;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;

class UserController extends Controller
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
        
        return view('avatar.list', ['user' => Auth::user()]);
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('courses.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $course = new Course();
          //$this->validate($request, $courses->rules);

       $message =[
        
                    'name.required' => 'O campo descrição é de preenchimento obrigatório.',
                    'name.min' => 'O Número mínimo para preencher o campo descrição é de 3 caracteres.',
                    'name.max' => 'O Número máximo de caracteres atingido para o campo descrição.'
        
        
                ];
                $validate = Validator::make($request->all(), $course->rules, $message);
        
                if($validate->fails()){
        
                    return Redirect::to('courses/create')
                                    ->WithErrors($validate)
                                    ->withInput();
                }
        $course= $course->create($request->all());

     
        if($course->save()) {
            
        \Session::flash('mensagem_sucesso', 'Curso cadastrado com sucesso');
                        
        return Redirect::to('courses');
        } else {
                    
        \Session::flash('mensagem_sucesso', 'Erro ao cadastrar curso');
                        
        return Redirect::to('courses.create');
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
        $course = Course::findorfail($id);
        
        return view('courses.form',['courses'=> $course]);
          
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
        $course = Course::findorfail($id);

        
           //$this->validate($request, $courses->rules);

       $message =[
        
                    'name.required' => 'O campo descrição é de preenchimento obrigatório.',
                    'name.min' => 'O Número mínimo para preencher o campo descrição é de 3 caracteres.',
                    'name.max' => 'O Número máximo de caracteres atingido para o campo descrição.'
        
        
                ];
                $validate = Validator::make($request->all(), $quota->rules, $message);
        
                if($validate->fails()){
        
                    return Redirect::to("courses/$course->id/edit")
                                    ->WithErrors($validate)
                                    ->withInput();
                }
        $course->update($request->all());

        if($course->save()) {

            \Session::flash('mensagem_sucesso', 'Curso atualizado com sucesso');
            
            return Redirect::to('courses');
        } else {
        
            \Session::flash('mensagem_sucesso', 'Erro ao atualizado curso');
            
            return Redirect::to('courses.edit');
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
         
        $course = Course::findorfail($id);
        
        $course->delete();
        \Session::flash('mensagem_sucesso', 'Curso deletado com sucesso');
        
        return Redirect::to('courses');
     }

    public function confirmDestroy($id)
    {
        
        $course = Course::findorfail($id);
        
        return view('courses.deleteConfirm',['course'=> $course]);


    }
}
