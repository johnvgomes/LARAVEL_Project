HELLO WORD I AM PROGRAMING USING LARAVEL

--comandos uteis



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

