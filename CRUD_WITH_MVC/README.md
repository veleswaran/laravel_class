Welcome to all glade to meet again

will start 
    composer create-project laravel/laravel CRUD_WITH_MVC

    cd CRUD_WITH_MVC

I use to create user basic athentication from jetstream package

    composer require laravel/jetstream

    php artisan jetstream:install livewire

change the some .env file like database connect and APP_URL

    APP_URL=http://localhost:8000

    //database connection
    DB_CONNECTION=mysql
    DB_HOST=127.0.0.1
    DB_PORT=3306
    DB_DATABASE=CRUD
    DB_USERNAME=root
    DB_PASSWORD=admin123

if you need to a profile phone just uncomment 
    'features' => [
        // Features::termsAndPrivacyPolicy(),
        Features::profilePhotos(),
        // Features::api(),
        // Features::teams(['invitations' => true]),
        Features::accountDeletion(),
    ],

create the database migrations for product

    php artisan make:migration create_products_table --resource

and then create model and controller

    php artisan make:model Product -c //-c mean create controller also

now i create service container in APP\SERVICE

