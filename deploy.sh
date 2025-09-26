#!/bin/bash
APP_DIR="/var/www/karimunkab"

cd $APP_DIR || exit

git pull
php artisan optimize:clear
npm run build
