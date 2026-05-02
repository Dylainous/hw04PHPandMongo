FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    libzip-dev unzip git curl

RUN docker-php-ext-install zip

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

WORKDIR /var/www/html

COPY . .

RUN composer install

RUN a2enmod rewrite

EXPOSE 80