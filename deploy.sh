#!/bin/bash
echo "Starting deployment..."
git reset --hard
git pull origin main
composer install --no-dev --optimize-autoloader
php artisan migrate --force
php artisan cache:clear
php artisan config:clear
php artisan route:cache
npm install
npm run build
echo "Deployment completed!"
