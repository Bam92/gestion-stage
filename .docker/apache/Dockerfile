FROM php:7.4.15-apache

COPY . /var/www/html

RUN docker-php-ext-install pdo pdo_mysql && \
    chown -R www-data:www-data /var/www/html && a2enmod rewrite

EXPOSE 80 443

