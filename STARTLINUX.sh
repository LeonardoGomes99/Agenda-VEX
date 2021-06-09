#!/bin/bash
sudo chmod -R 777 src
sudo docker-compose up -d --build
sudo docker-compose run composer install
sudo docker-compose run composer dump-autoload
cd src
sudo chmod -R 777 storage
sudo chmod -R 777 vendor
sudo chmod -R 777 bootstrap/caches
cp .env.example .env
sudo docker-compose run artisan cache:clear
sudo docker-compose run artisan config:clear
sudo docker-compose run artisan key:generate
read -p "Press enter to continue"
