## DDD & Hexagonal Architecture with Laravel

Implementing Domain Driven Design and Hexagonal Architecture example.

You would can add more functions, as ShoppingCart with users...

You can use routes web or routes api.

## Installing:

1. Clone repository: `git clone https://github.com/david9801/Shoppingcart-DDD.git`.
2. Move to project folder: `cd Shoppingcart-DDD`.
3. Duplicate .env.example file and set your variables.
4. Caution , database.php file has changed (  'engine' => 'InnoDB',). This change works correctly in both MYSQL and MARIADB.
5. Install project dependencies: `composer install`.
6. Generate encryption key: `php artisan key:generate`.
7. Create a new schema in your database.
8. Execute migration: `php artisan migrate`.
9. `php artisan db:seed --class=Database\Seeders\DatabaseSeeder`
10. Start server: `php artisan serve`.

## Tests:
Run: `php artisan test`.


