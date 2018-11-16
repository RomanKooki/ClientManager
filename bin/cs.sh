#!/bin/bash
echo "Running squizlabs/PHP_CodeSniffer..."
phpcbf --standard=PSR2 --tab-width=4 --encoding=utf-8

echo "Running FriendsOfPHP/PHP-CS-Fixer..."
php-cs-fixer fix --config=.php_cs --verbose
