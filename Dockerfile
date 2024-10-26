FROM ubuntu:latest AS base

ENV DEBIAN_FRONTEND noninteractive

# Install dependencies
RUN apt update
RUN apt install -y software-properties-common nginx
RUN add-apt-repository -y ppa:ondrej/php
RUN apt update
RUN apt install -y php8.2\
    php8.2-cli\
    php8.2-common\
    php8.2-fpm\
    php8.2-mysql\
    php8.2-zip\
    php8.2-gd\
    php8.2-mbstring\
    php8.2-curl\
    php8.2-xml\
    php8.2-bcmath\
    php8.2-pdo \
    php8.2-ctype \
    php8.2-fileinfo \
    php8.2-tokenizer 

# Install php-fpm
RUN apt install -y php8.2-fpm php8.2-cli

# Install composer
RUN apt install -y curl
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local

COPY Workzone /var/www/html/
COPY .env /var/www/html/
COPY default.conf /etc/nginx/sites-enabled/default

# RUN ln -s /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
RUN sed -i -e 's/upload_max_filesize = 2M/upload_max_filesize = 100M/' /usr/local/etc/php/php.ini
RUN sed -i -e 's/post_max_size = 8M/post_max_size = 200M/' /usr/local/etc/php/php.ini
RUN sed -i -e 's/memory_limit = 128M/memory_limit = 4096M/' /usr/local/etc/php/php.ini
RUN sed -i -e 's/max_execution_time = 30/max_execution_time = 360/' /usr/local/etc/php/php.ini
RUN sed -i -e 's/max_input_time = 60/max_input_time = 360/' /usr/local/etc/php/php.ini

RUN sed -i -e 's/pm.max_children = 5/pm.max_children = 200/' /usr/local/etc/php-fpm.d/www.conf
RUN sed -i -e 's/pm.start_servers = 2/pm.start_servers = 64/' /usr/local/etc/php-fpm.d/www.conf
RUN sed -i -e 's/pm.min_spare_servers = 1/pm.min_spare_servers = 32/' /usr/local/etc/php-fpm.d/www.conf
RUN sed -i -e 's/pm.max_spare_servers = 3/pm.max_spare_servers = 64/' /usr/local/etc/php-fpm.d/www.conf

RUN composer update
RUN composer install
#RUN php artisan optimize
RUN php artisan cache:clear
RUN php artisan config:clear
RUN php artisan route:clear
RUN php artisan key:generate
#RUN php artisan db:seed
RUN chown -R www-data:www-data /var/www/html/
RUN touch /var/log/ultimatepos.log
COPY startup.sh /opt/startup.sh
RUN chmod a+x /opt/startup.sh
CMD ["/opt/startup.sh"]
