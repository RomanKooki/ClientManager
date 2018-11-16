#!/bin/bash
echo "Clean redundant files..."
php artisan clean

echo "Generate IDE helper files..."
php artisan clear-compiled
php artisan ide-helper:generate
php artisan ide-helper:meta
