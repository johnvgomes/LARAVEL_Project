<?php

namespace App\Http\Controllers;

use App\Models\Subscription;
use App\Models\Course;
use App\Models\Quota;
use App\Models\SelectiveProcess;
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

        return view('subscriptions.list',['subscription'=> $subscriptions]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 

        $subscriptions = Subscription::all();
        $courses = Course::all();
        $quotas = Quota::all();
        $selectiveprocesses = SelectiveProcess::all();
       

        return view('subscriptions.form',['subscription'=> $subscriptions,'courses'=> $courses, 'quotas'=> $quotas, 'selectiveprocesses'=> $selectiveprocesses]);
        
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
        
        //$subscriptions->selective_process_id = Auth::user()->id;
        
        //$subscriptions->user_id = Auth::user()->id;
        
       
        $selected_selective_proccess = array();
        
                foreach ($request->selective_proccess as $sp) {
                    
                                        
                    if(array_key_exists('id', $sp)) {
                        
                       
                        $selected_selective_proccess[$sp['id']] = $sp['id'];
                    }
                }

                dd($selected_selective_proccess);
        
                $subscriptions->selectiveprocess()->sync($selected_selective_proccess);
        
        
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
        
        return view('subscriptions.form',['subscriptions'=> $subscriptions]);
          
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