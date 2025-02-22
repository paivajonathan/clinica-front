#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Setting permissions for database folder..."
mkdir -p /var/www/html/database
chmod -R 777 /var/www/html/database
chown -R www-data:www-data /var/www/html/database

echo "Generating application key..."
php artisan key:generate --show

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force