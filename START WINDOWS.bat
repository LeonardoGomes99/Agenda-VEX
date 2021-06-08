bash -c "chmod -R 777 src"
docker-compose up -d --build
docker-compose run composer install
docker-compose run composer dump-autoload
cd src
copy .env.example .env
docker-compose run artisan key:generate
docker-compose run artisan cache:clear
pause