Requirements:
- PHP 8
- MySQL 5.6
- Composer

Installation instructions:

1) Run "Composer Install"
2) Generate app key
3) Input credentials for .env
4) Run "php artisan migrate"
5) Run "php artisan db:seed --class=UserSeeder"
6) Run "php artisan serve"
7) You can run APIs using:

GET - localhost:8000/api/users - Gets the list of users
GET - localhost:8000/api/user/{id} - Gets one user
POST - localhost:8000/api/user - Creates a user
PUT - localhost:8000/api/user/{id} - Updates a user
DELETE - localhost:8000/api/user/{id} - Destorys a user
