<?php


namespace App\Http\Controllers;

use App\Models\SpecialNeed;
use Validator;
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
            // $this->validate($request, $spneeds->rules);
            $message =[
                
                            'description.required' => 'O campo descrição é de preenchimento obrigatório.',
                            'description.min' => 'O Número mínimo para preencher o campo descrição é de 3 caracteres.',
                            'description.max' => 'O Número máximo de caracteres foi atingido para o campo descrição.'
                            
                
                
                        ];
                        $validate = Validator::make($request->all(), $spneeds->rules, $message);
                
                        if($validate->fails()){
                
                            return Redirect::to('specialneeds/create')
                                            ->WithErrors($validate)
                                            ->withInput();
                        }
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

       // $this->validate($request, $spneeds->rules);
        $message =[

            'description.required' => 'Ocampo descrição é de preenchimento obrigatorio',
            'description.min' => 'O Número minimo para preencher o campo descrição é de 3 caracteres',
            'description.max' => 'O Número máximo de caracteres foi atingido para o campo descrição.'



        ];
        $validate = Validator::make($dataForm, $spneeds->rules, $message);

        if($validate->fails()){

            return Redirect::to("specialneeds/$spneeds->id/edit")
                            ->WithErrors($validate)
                            ->withInput();
        }

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
