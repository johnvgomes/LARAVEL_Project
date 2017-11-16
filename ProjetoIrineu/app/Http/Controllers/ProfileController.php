<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;



class ProfileController extends Controller
{
    public function index()
    {
        $profiles = Profile::all();
       

        return view('profiles.lista',['profiles'=> $profiles]);
    }

    public function novo()
    {
        return view('profiles.formulario');
        
    }

    public function salvar(Request $request)
    {
        $product = new Product();
        
        $product = $product->create($request->all());


        \Session::flash('mensagem_sucesso', 'Produto cadastrado com sucesso');

        return Redirect::to('products/novo');
    }


    public function editar($id)
    {

        $categories = Category::all()->pluck('descricao','id');

        $product = Product::findorfail($id);

        return view('products.formulario', ['categories'=> $categories, 'product' => $product]);
    }
    
    public function atualizar($id, Request $request)
    {

            
        $product = Product::findorfail($id);
        
        $product->update($request->all());

        \Session::flash('mensagem_sucesso', 'Produto atualizado com sucesso');
        
         return Redirect::to('products/'.$product->id.'/editar');
       }


       public function deletar($id)
       {

        $product = Product::findorfail($id);
        
        $product->delete();

        \Session::flash('mensagem_sucesso', 'Produto deletado com sucesso');
       
        return Redirect::to('products');


        }

       public function confirmarDelete($id)
       {

        $product = Product::findorfail($id);
        
        return view('products.deleteConfirm',['product'=> $product]);


        }


}
