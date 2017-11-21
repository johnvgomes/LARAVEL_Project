<?php

namespace App\Http\Controllers;

use App\Models\SpecialNeed;

use App\Models\Profile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;



class SpecialNeedsController extends Controller
{
    public function index()
    {
        $spneeds = SpecialNeed::all();
        return view('specialneeds.lista',['spneeds'=> $spneeds]);
    }

    public function create()
    {
        return view('specialneeds.formulario');
        
    }
    
    public function store(Request $request)
    {
        return view('specialneeds.teste');
        // $spneeds = new SpecialNeed();
        
        // $spneeds = $spneeds->create($request->all());


        // \Session::flash('mensagem_sucesso', 'Necessidade especial cadastrada com sucesso');

        // return Redirect::to('specialneeds/create');
    }



}
