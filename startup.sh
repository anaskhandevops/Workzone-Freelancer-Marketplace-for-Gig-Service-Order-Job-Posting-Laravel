#!/bin/bash
php artisan migrate --force;
php artisan db:seed
/etc/init.d/nginx start;
service cron start;
exec php-fpm;