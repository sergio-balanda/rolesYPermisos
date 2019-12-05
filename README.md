<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Roles y permison

# instalacion

        composer require caffeinated/shinobi
        php artisan migrate

vendor ->shinobi ->migrations

se crea un seeder para los permisos llamando al modelo de la carpeta vendor

si falla el seeder aca
        php artisan make:seeder PermissionsTableSeeder
        php artisan migrate:refresh --seed

solucion
 ir a el archivo ".env" y cambiar CACHE_DRIVER=file a CACHE_DRIVER=array
 composer dump-autoload
 php artisan config:clear
 php artisan migrate:refresh --seed

 # agregar en kerner

        'role'=> \Caffeinated\Shinobi\Middleware\UserHasRole::class,   

 en la ruta se agrega can:roles 
 en las vistas para mostrar algo usar                                   @can('products.index')

 fijarse en db permissions las los slugs creados coicidan con las rutas, si el usuario no tiene ningun rol no va a ver nada.
       
ver tabla rol_user se relacion ahi
y en user agregar 
        use Caffeinated\Shinobi\Concerns\HasRolesAndPermissions;

        use HasRolesAndPermissions;


## Helper menu        

* se crea carpeta herpers con helpers.php
* con una funcion active
* para llamar a la funcion {{ active('users') }} o {{ active('products') }}
* ejeccutar composer dumpautoload

## laravel-permission
* https://docs.spatie.be/laravel-permission/v3/installation-laravel/
* composer require spatie/laravel-permission
* kernel.php
    protected $routeMiddleware = [
        // ...
        'role' => \Spatie\Permission\Middlewares\RoleMiddleware::class,
        'permission' => \Spatie\Permission\Middlewares\PermissionMiddleware::class,
    ];
* php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="migrations"
* php artisan migrate
* php artisan vendor:publish --provider="Spatie\Permission\PermissionServiceProvider" --tag="config"
* Creamos el modelo, controlador, migración y seed de productos php artisan make:model Product -a
* Seed de usuarios php artisan make:seeder UsersTableSeeder
* Seed de productos php artisan make:seeder ProductsTableSeeder
* Seed de permisos php artisan make:seeder PermissionsTableSeeder
* user.php agregar
        use Spatie\Permission\Traits\HasRoles;
        use HasRoles;
* en las rutas 'permission:products.create'
* en las vistas @can('products.destroy')

    