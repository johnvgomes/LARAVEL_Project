<?php


namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

use App\Http\Controllers\Controller;
use Redirect;

class CategoriesController extends Controller
{


    public function index()
    {
        $category = Category::get();
        return view('categories.lista',['category'=> $category]);
    }

    public function create()
    {
        return view('categories.formulario');
    }

    public function store(Request $request)
    {
        $category = new Category();

        $category = $category->create($request->all());

        \Session::flash('mensagem_sucesso', 'Categoria cadastrada com sucesso');

        return Redirect::to('categories/create');
    }


    public function edit($id)
    {

        $category = Category::findorfail($id);

        return view('categories.formulario',['category'=> $category]);
    }
    
    public function update($id, Request $request)
    {

            
        $category = Category::findorfail($id);
        
        $category->update($request->all());

        \Session::flash('mensagem_sucesso', 'Categoria atualizada com sucesso');
        
         return Redirect::to('categories/'.$category->id.'/edit');
       }


       public function destroy($id)
       {

        $category = Category::findorfail($id);
        
        $category->delete();

       \Session::flash('mensagem_sucesso', 'Categoria deletada com sucesso');
       
        return Redirect::to('categories');


        }

       public function confirmDestroy($id)
       {

        $category = Category::findorfail($id);
        
        return view('categories.deleteConfirm',['category'=> $category]);


        }
}
