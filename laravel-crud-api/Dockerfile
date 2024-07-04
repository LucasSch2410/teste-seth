FROM php:8.2

WORKDIR /var/www/html

RUN apt-get update && apt-get install -y \
    build-essential \
    libpq-dev \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl \
    && docker-php-ext-install pdo pdo_pgsql


COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

COPY . /var/www/html

RUN composer install --no-dev --no-scripts --no-autoloader

RUN composer dump-autoload --optimize

RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache

CMD ["php", "artisan", "serve", "--host=0.0.0.0", "--port=8000"]