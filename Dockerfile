FROM php:8.2-fpm

# Instalacja narzędzi systemowych i PHP
RUN apt-get update && apt-get install -y \
    zip unzip git curl libpng-dev libonig-dev libjpeg-dev libfreetype6-dev \
    && docker-php-ext-install pdo_mysql mbstring gd

# Instalacja Composer
COPY --from=composer:2.6 /usr/bin/composer /usr/bin/composer

# Ustawienia katalogu roboczego
WORKDIR /var/www/html

# Instalacja zależności Laravel
COPY ./app /var/www/html
RUN composer install

# Uruchomienie migracji i seedów
CMD ["sh", "-c", "sleep 10 && php artisan migrate --force && php artisan db:seed --force && php artisan serve --host=0.0.0.0 --port=8087"]
