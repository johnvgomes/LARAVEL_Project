HELLO WORD I AM PROGRAMING USING LARAVEL

--comandos uteis



///criacao das migrations snake_case

php artisan make:migration create_clientes_table --create=clientes

php artisan migrate

php artisan migrate:rollback



///criacao do model = nome da tabela no singular primeira letra maiuscula

php artisan make:model Cliente

///