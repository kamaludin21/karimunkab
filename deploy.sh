#!/bin/bash
APP_DIR="/var/www/karimunkab"

cd $APP_DIR || exit

git pull

php artisan optimize:clear
php artisan config:cache
php artisan route:cache
php artisan view:cache
php artisan icons:cache

npm run build
