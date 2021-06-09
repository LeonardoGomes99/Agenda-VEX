bash -c "chmod -R 777 src"
docker-compose up -d --build
docker-compose run composer install
docker-compose run composer dump-autoload
cd src
bash -c "chmod -R 777 storage"
bash -c "chmod -R 777 vendor"
bash -c "chmod -R 777 bootstrap/caches"
copy .env.example .env
docker-compose run artisan cache:clear
docker-compose run artisan config:clear
docker-compose run artisan key:generate
pause