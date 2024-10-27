# Stage 1: Composer setup and install dependencies
# Use an official Composer image to install PHP dependencies in a separate layer
FROM composer:2.8 as vendor 

# Copy the required files for Composer to resolve dependencies
COPY Workzone/database/ database/
COPY Workzone/composer.json composer.json
COPY Workzone/composer.lock composer.lock

# Install PHP dependencies with Composer, skipping platform requirements and scripts for a lightweight build
RUN composer install \
    --ignore-platform-reqs \
    --no-interaction \
    --no-plugins \
    --no-scripts \
    --prefer-dist

# Stage 2: PHP setup and extension installation
# Use the official PHP image with FPM (FastCGI Process Manager) for optimal performance with NGINX
FROM php:8.2-fpm as base

# Download and set permissions for the PHP extension installer script
ADD --chmod=0755 https://github.com/mlocati/docker-php-extension-installer/releases/latest/download/install-php-extensions /usr/local/bin/

# Install necessary PHP extensions required by the application
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

# Stage 3: NGINX setup and configuration
# Install NGINX to handle web requests
RUN apt-get update && apt-get install -y nginx

# Copy NGINX configuration for handling incoming requests and route them to PHP-FPM
COPY default.conf /etc/nginx/sites-enabled/default

# Copy application files to the working directory in the container
COPY Workzone /var/www/html/ 

# Copy dependencies from the vendor stage
COPY --from=vendor /app/vendor/ /var/www/html/vendor/

# Copy environment configuration
COPY .env /var/www/html/ 

# Set ownership to www-data user for proper permission handling
RUN chown -R www-data:www-data /var/www/html/

# Define working directory
WORKDIR /var/www/html/

# Optimize Laravel application by clearing and caching configurations and generating an app key
RUN php artisan optimize 
RUN php artisan cache:clear 
RUN php artisan config:clear 
RUN php artisan route:clear 
RUN php artisan key:generate 

# Copy the startup script and set execute permissions
COPY startup.sh /opt/startup.sh 
RUN chmod a+x /opt/startup.sh 