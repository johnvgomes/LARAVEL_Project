HELLO WORD I AM PROGRAMING USING LARAVEL

--comandos uteis


php artisan make:auth

php artisan migrate



///criacao das migrations snake_case

php artisan make:migration create_clientes_table --create=clientes

php artisan migrate

php artisan migrate:rollback


///criacao do Controller
php artisan make:controller ClienteController


///criacao do model = nome da tabela no singular primeira letra maiuscula

php artisan make:model Cliente

///



        $categories = Category::all()->pluck('descricao','id');


///JOIN


SELECT p.id, p.nome, p.qtd, p.valor, c.descricao
FROM products as p
INNER JOIN categories as c ON p.categories_id=c.id;

public function index()
  
{
        $product = DB::table('products')

       ->join('categories', 'products.categories_id', '=', 'categories.id')
 
       ->select('products.id', 'products.nome', 'products.qtd','products.valor' , 'categories.descricao')
 
       ->get();


        return view('products.lista',['product'=> $product]);
    }


public function novo()
    
{
        

$categories = Category::all()->pluck('descricao','id');


return view('products.formulario', ['categories'=> $categories]);
    

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
