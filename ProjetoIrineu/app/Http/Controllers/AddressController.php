<?php


namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\Address;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;
class AddressController extends Controller
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
        $address = Address::all();
        return view('addresses.list',['addresses'=> $address]);
   
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    { 
        return view('addresses.form');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $address = new Address();
        $address->street = $request->street;
        $address->number = $request->number;
        $address->cep = $request->cep;
        $address->neighborhood = $request->neighborhood;
        $address->typeaddress = $request->typeaddress;
        $address->city = $request->city;
        $address->state = $request->state;
        $address->country = $request->country;
        $address->profile_id = $request->profile_id;

        if ($address->save()){
            \Session::flash('mensagem_sucesso', 'Endereço cadastrado com sucesso');
            
                return Redirect::to('addresses');
        }

        else{
            \Session::flash('mensagem_sucesso', 'Perfil cadastrado com sucesso');
            
                return Redirect::to('addresses/create');
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
        $address = Address::findorfail($id);
        
        return view('addresses.form',['addresses'=> $address]);
          
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
        $address = Address::findorfail($id);
        
        $address->update($request->all());

        \Session::flash('mensagem_sucesso', 'Endereço atualizado com sucesso!');
        
         return Redirect::to('addresses');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
     public function destroy($id)
     {
         
        $address = Address::findorfail($id);
        
        $address->delete();

       \Session::flash('mensagem_sucesso', 'Endereço deletado com sucesso');
       
        return Redirect::to('addresses');
 
     }

    public function confirmdestroy($id)
    {
        
        $address = Address::findorfail($id);
        
        return view('addresses.deleteConfirm',['address'=> $address]);


    }
}
