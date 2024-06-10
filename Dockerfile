FROM php:7.4-fpm

# Install dependensi yang dibutuhkan oleh Laravel
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    zip \
    unzip \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd pdo pdo_mysql

# Instal Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Set direktori kerja
WORKDIR /var/www/html

# Salin file composer dan jalankan install
COPY composer.json composer.json
COPY composer.lock composer.lock
RUN composer install --no-scripts --no-autoloader

# Salin semua file ke dalam image
COPY . .

# Generate autoload
RUN composer dump-autoload

# Atur izin yang diperlukan
RUN chown -R www-data:www-data \
    /var/www/html/storage \
    /var/www/html/bootstrap/cache

# Expose port
EXPOSE 9000

CMD ["php-fpm"]
