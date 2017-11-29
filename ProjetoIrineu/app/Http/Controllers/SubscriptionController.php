<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Redirect;

class SubscriptionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $subscriptions = Subscription::all();
       

        return view('subscriptions.lista',['subscriptions'=> $subscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('subscriptions.formulario');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
          $subscriptions = new Subscription();
        
          $subscriptions = $subscriptions->create($request->all());


          \Session::flash('mensagem_sucesso', 'Inscrição feita com sucesso!');

          return Redirect::to('subscriptions/create');
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
        $subscriptions = Subscription::findorfail($id);
        
        return view('subscriptions.formulario',['subscriptions'=> $subscriptions]);
          
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
        $subscriptions = Subscription::findorfail($id);
        
        $subscriptions->update($request->all());

        \Session::flash('mensagem_sucesso', 'Inscrição atualizada com sucesso!');
        
         return Redirect::to('subscriptions/'.$subscriptions->id.'/edit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        
       $subscriptions = Subscription::findorfail($id);
       
       $subscriptions->delete();

      \Session::flash('mensagem_sucesso', 'Inscrição deletada com sucesso!');
      
       return Redirect::to('subscriptions');

    }

    public function confirmDestroy($id)
    {
        
        $subscriptions = Subscription::findorfail($id);
        
        return view('subscriptions.deleteConfirm',['subscriptions'=> $subscriptions]);


    }
}
