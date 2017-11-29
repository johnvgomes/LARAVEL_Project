<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Exemption;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;

class ExemptionController extends Controller
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
        $exemption = Exemption::all();
        return view('exemptions.list',compact('exemption'));
   
    }


    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('exemptions.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        $exemption = new Exemption();
        $exemption = $exemption->create($request->all());


        if($exemption->save()) {
            return redirect()->route('exemptions.index')->with('success_message', 'Isenção solicitada com sucesso!');
        } else {
            return redirect()->route('exemptions.create', $id)->with('error_message', 'Houve um erro ao solicitar a isenção!');
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
        $exemption = Exemption::findorfail($id);
        
        return view('exemptions.form',['exemptions'=> $exemption]);
          
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
        $exemption = Exemption::findorfail($id);

        $exemption->update($request->all());

        if($exemption->save()) {
            return redirect()->route('exemptions.index')->with('success_message', 'isenção alterada com sucesso!');
        } else {
            return redirect()->route('exemptions.edit', $id)->with('error_message', 'Houve um erro ao alterar a isenção!');
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
        $exemption = Exemption::findorfail($id);

        $exemption->delete();

        return redirect()->route('exemptions.index')->with('success_message', 'Isenção deletada com sucesso.');
 
     }

    public function confirmDestroy($id)
    {
        
        $exemption = Exemption::findorfail($id);
        
        return view('exemptions.deleteConfirm',['exemption'=> $exemption]);


    }
}
