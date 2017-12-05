<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Auth;
use App\Models\Subscription;
use App\Models\Course;
use App\Models\Quota;
use App\Models\SelectiveProcess;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
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
    public function create($id)
    { 
        $subscription = Subscription::findorfail($id);       
        $courses = Course::all();
        $quotas = Quota::all();
        $selectiveprocesses = SelectiveProcess::all();
       

        return view('subscriptions.form',['subscription'=> $subscription,'courses'=> $courses, 'quotas'=> $quotas, 'selectiveprocesses'=> $selectiveprocesses]);
        
    }

    public function subscribe($id)
    { 
        $subscription = new Subscription;
        $quotas = Quota::all()->pluck('name','id');
        $courses = Course::all()->pluck('name','id');
        $selectiveprocesses = SelectiveProcess::findOrFail($id);
      
       

        return view('subscriptions.form',['subscription'=> $subscription,'courses'=> $courses, 'quotas'=> $quotas, 'selectiveprocesses'=> $selectiveprocesses]);
        
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
        //dd()

        //$subscriptions->selective_process_id = $request->$selectiveprocesses->id;
        $subscriptions->quota_id = $request->quota_id;
        $subscriptions->course_id = $request->course_id;
        $subscriptions->user_id = Auth::user()->id;
        // save da inscrição
       
        $selected_selective_proccess = array();
        
        foreach ($request->selective_proccess as $sp) {
            
                                
            if(array_key_exists('id', $sp)) {
                

                $subscriptions->selective_processes()->save($select_process);
                
                $selected_selective_proccess[$sp['id']] = $sp['id'];
            }
        }

        
        $subscriptions->selectiveprocess()->sync($selected_selective_proccess);
        

        $selected_quotas = array();
                
        foreach ($request->quota as $qt) {
                    
                                        
            if(array_key_exists('id', $qt)) {
                        
                $selected_quotas[$qt['id']] = $qt['id'];
            }
        }
        
                
        $subscriptions->quota()->sync($selected_quotas);
        
        
        $selected_course = array();
                
        foreach ($request->course as $cs) {
                    
                                        
            if(array_key_exists('id', $cs)) {
                        
                $selected_course[$cs['id']] = $cs['id'];
            }
        }

                
        $subscriptions->quota()->sync($selected_quotas);
        
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