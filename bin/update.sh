#!/bin/bash
echo "Updating Composer..."
composer self-update

echo "Updating packages..."
composer update

echo "Optimizing..."
php artisan optimize
