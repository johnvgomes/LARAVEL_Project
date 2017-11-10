<?php


namespace App\Http\Controllers;

use App\Category;
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

    public function novo()
    {
        return view('categories.formulario');
    }

    public function salvar(Request $request)
    {
        $category = new Category();

        $category = $category->create($request->all());

        \Session::flash('mensagem_sucesso', 'Categoria cadastrada com sucesso');

        return Redirect::to('categories/novo');
    }


    public function editar($id)
    {

        $category = Category::findorfail($id);

        return view('categories.formulario',['category'=> $category]);
    }
    
    public function atualizar($id, Request $request)
    {

            
        $category = Category::findorfail($id);
        
        $category->update($request->all());

        \Session::flash('mensagem_sucesso', 'Categoria atualizada com sucesso');
        
         return Redirect::to('categories/'.$category->id.'/editar');
       }


       public function deletar($id)
       {

        $category = Category::findorfail($id);
        
       $category->delete();

       \Session::flash('mensagem_sucesso', 'Categoria deletada com sucesso');
       
        return Redirect::to('categories');


        }

       public function confirmarDelete($id)
       {

        $category = Category::findorfail($id);
        
        return view('categories.deleteConfirm',['category'=> $category]);


        }
}
