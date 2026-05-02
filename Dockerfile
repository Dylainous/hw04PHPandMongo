FROM php:8.2-apache

# Instalar dependencias necesarias
RUN apt-get update && apt-get install -y \
    libssl-dev \
    pkg-config

# Instalar MongoDB extension con SSL
RUN pecl install mongodb \
    && docker-php-ext-enable mongodb

# Copiar proyecto
COPY . /var/www/html/

# Permisos
RUN chown -R www-data:www-data /var/www/html