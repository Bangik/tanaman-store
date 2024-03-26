FROM php:8.1.0-apache

WORKDIR /var/www/html

RUN a2enmod rewrite

# RUN apt-get update && apt-get install -y libicu-dev unzip zip zlib1g-dev libpng-dev libzip-dev

COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# RUN docker-php-ext-install gettext intl pdo pdo_mysql gd zip

# docker run --name tanaman-store -v $(pwd):/var/www/html -p 9004:80 --network laravel-docker-network -d tanaman-store