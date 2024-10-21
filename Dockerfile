
FROM 1devops2/composer:4.0
RUN apt-get update && apt-get install -y libpq-dev && docker-php-ext-install pdo gd pdo_mysql mysqli bcmath ctype fileinfo json mbstring tokenizer xml 
RUN apt-get install -y gnupg2 default-mysql-client
RUN pecl install redis && docker-php-ext-enable redis pdo_mysql
COPY <project-code-directory> /var/www/html/
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
