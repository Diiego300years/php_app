FROM php:8.2-fpm

# Instalacja narzędzi systemowych i PHP
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo_mysql mbstring gd

# Instalacja Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Ustawienia katalogu roboczego
WORKDIR /var/www/html
