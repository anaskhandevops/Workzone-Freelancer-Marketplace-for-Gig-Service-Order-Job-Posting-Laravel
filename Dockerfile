
FROM 1devops2/composer:4.0
RUN apt-get update && apt-get install -y libpq-dev 
# Install PHP extensions one by one to avoid issues
RUN docker-php-ext-install bcmath 
RUN docker-php-ext-install ctype 
RUN docker-php-ext-install fileinfo 
# RUN docker-php-ext-install json  # https://stackoverflow.com/questions/65255801/unable-to-install-the-json-extension-in-phps-docker-image
RUN docker-php-ext-install mbstring 
RUN docker-php-ext-install pdo 
RUN docker-php-ext-install pdo_mysql 
RUN docker-php-ext-install tokenizer 
RUN docker-php-ext-install xml 
RUN docker-php-ext-install gd 
RUN docker-php-ext-install mysqli

RUN apt-get install -y gnupg2 default-mysql-client
RUN pecl install redis && docker-php-ext-enable redis pdo_mysql
COPY Workzone /var/www/html/
COPY .env /var/www/html/
COPY default.conf /etc/nginx/sites-enabled/default

RUN ln -s /usr/local/etc/php/php.ini-production /usr/local/etc/php/php.ini
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
