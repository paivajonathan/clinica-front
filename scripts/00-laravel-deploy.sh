#!/usr/bin/env bash
echo "Running composer"
composer global require hirak/prestissimo
composer install --no-dev --working-dir=/var/www/html

echo "Setting up writable database directory..."
mkdir -p /tmp
touch /tmp/database.sqlite
chmod -R 777 /tmp/database.sqlite
chown -R www-data:www-data /tmp/database.sqlite

echo "Generating application key..."
php artisan key:generate --show

echo "Caching config..."
php artisan config:cache

echo "Caching routes..."
php artisan route:cache

echo "Running migrations..."
php artisan migrate --force