скопировать файл .env.example в .env

docker-compose up -d

docker exec -it project_app bash

composer install

php artisan key:generate

php artisan migrate

php artisan db:seed (только при первом запуске)
