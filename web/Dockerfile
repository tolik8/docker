FROM php:7.2-apache

RUN docker-php-ext-install pdo_mysql \
    && a2enmod rewrite

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
