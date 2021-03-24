FROM php:7.4.15-apache

# Arguments defined in docker-compose.yml
ARG user
ARG uid

# Install system dependencies
RUN apt-get update && apt-get install -y\
    git

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*    

#COPY . /var/www/html

COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# Create system user to run Composer 
RUN useradd -G www-data,root -u $uid -d /home/$user $user
RUN mkdir -p /home/$user/.composer && \
    chown -R $user:$user /home/$user

RUN docker-php-ext-install pdo pdo_mysql && \
    chown -R www-data:www-data /var/www/html && a2enmod rewrite 

# Set working directory
WORKDIR /var/www/html


USER $user
USER root

EXPOSE 80 443

