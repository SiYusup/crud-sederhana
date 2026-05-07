FROM php:8.2-apache

RUN apt-get update && apt-get install -y \
    git \
    zip \
    unzip

RUN docker-php-ext-install pdo_mysql mysqli

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
COPY docker/apache.conf /etc/apache2/sites-available/000-default.conf

COPY . /var/www/html
RUN composer install --no-dev --optimize-autoloader

RUN a2enmod rewrite

WORKDIR /var/www/html
