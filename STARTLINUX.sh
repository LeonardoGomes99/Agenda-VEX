#!/bin/bash
sudo chmod -R 777 src
sudo docker-compose up -d --build
sudo docker-compose run composer install
sudo docker-compose run composer dump-autoload
cd src
cp .env.example .env
sudo docker-compose run artisan key:generate
sudo docker-compose run artisan cache:clear
read -p "Press enter to continue"
