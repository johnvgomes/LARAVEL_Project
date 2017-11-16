<?php

namespace App\Http\Controllers;
use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Redirect;



class ProductsController extends Controller
{
    public function index()
    {
        $products = Product::all();
       

        return view('products.lista',['products'=> $products]);
    }

    public function create()
    {
        $categories = Category::all()->pluck('descricao','id');
             
                
        return view('products.formulario', ['categories'=> $categories]);
    }

    public function store(Request $request)
    {
        $product = new Product();
        
        $product = $product->create($request->all());


        \Session::flash('mensagem_sucesso', 'Produto cadastrado com sucesso');

        return Redirect::to('products/create');
    }


    public function edit($id)
    {

        $categories = Category::all()->pluck('descricao','id');

        $product = Product::findorfail($id);

        return view('products.formulario', ['categories'=> $categories, 'product' => $product]);
    }
    
    public function update($id, Request $request)
    {

            
        $product = Product::findorfail($id);
        
        $product->update($request->all());

        \Session::flash('mensagem_sucesso', 'Produto atualizado com sucesso');
        
         return Redirect::to('products/'.$product->id.'/edit');
    }


    public function destroy($id)
    {

    $product = Product::findorfail($id);
    
    $product->delete();

    \Session::flash('mensagem_sucesso', 'Produto deletado com sucesso');
    
    return Redirect::to('products');


    }

    public function confirmDestroy($id)
    {

    $product = Product::findorfail($id);
    
    return view('products.deleteConfirm',['product'=> $product]);


    }


}
