# composer setup & install
FROM composer:2.8 as vendor 
COPY Workzone/database/ database/
COPY Workzone/composer.json composer.json
COPY Workzone/composer.lock composer.lock
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# php setup and install extensions
FROM php:8.2-fpm as base
COPY Workzone /var/www/html/ 
COPY .env /var/www/html/ 
COPY --from=vendor /app/vendor/ /var/www/html/vendor/
ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/
RUN install-php-extensions gd 
RUN install-php-extensions xdebug 
RUN install-php-extensions pdo 
RUN install-php-extensions gd 
RUN install-php-extensions pdo_mysql 
RUN install-php-extensions mysqli 
RUN install-php-extensions tokenizer 
RUN install-php-extensions bcmath
RUN install-php-extensions ctype 
RUN install-php-extensions json
RUN install-php-extensions mbstring
RUN install-php-extensions fileinfo
RUN install-php-extensions xml
RUN install-php-extensions openssl
RUN php artisan optimize 
RUN php artisan cache:clear 
RUN php artisan config:clear 
RUN php artisan route:clear 
RUN php artisan key:generate 

# nginx setup
FROM nginx:alpine-slim
COPY default.conf /etc/nginx/conf.d/default.conf
COPY --from=base /var/www/html /usr/share/nginx/html
EXPOSE 80
COPY startup.sh /opt/startup.sh 
RUN chmod a+x /opt/startup.sh 
CMD ["/opt/startup.sh"] 