FROM php:7.4-fpm

COPY ./src/composer.json /var/www/

WORKDIR /var/www

RUN apt-get update && apt-get install -y \
build-essential \
libmcrypt-dev \
mariadb-client \
libpng-dev \
libjpeg62-turbo-dev \
libfreetype6-dev \
locales \
jpegoptim optipng pngquant gifsicle \
vim \
unzip \
git \
curl \
libzip-dev \
zip


# Install PHP extensions
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install zip

RUN apt-get clean && rm -rf /var/lib/apt/lists/*

RUN docker-php-ext-install pdo pdo_mysql gd zip

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

ENV WEB_DOCUMENT_ROOT /var/www/public
ENV APP_ENV local
ENV COMPOSER_ALLOW_SUPERUSER 1
WORKDIR /var/www

COPY ./src /var/www/

COPY --chown=www-data:www-data ./src /var/www
RUN chown -R www-data:www-data /var/www

RUN composer update
RUN composer install
RUN chown -R www-data:www-data /var/www
RUN php artisan config:cache
RUN php artisan storage:link
RUN php artisan clear-compiled

USER www-data

EXPOSE 9000
CMD ["php-fpm"]