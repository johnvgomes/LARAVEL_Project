<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\SelectiveProcess;
use Redirect;
use Validator;
class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (! Auth::user()->profile) {
            return redirect()->route('profiles.create')->with('mensagem_sucesso', 'É necessário completar o cadastro');
        }
        else{
        $selectiveprocess =  SelectiveProcess::all();
       
        return view('home', ['selectiveprocess' => $selectiveprocess]);
        }
    }
}
