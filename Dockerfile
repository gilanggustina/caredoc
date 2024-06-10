# Gunakan image PHP dengan FPM
FROM php:7.4-fpm

# Install dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libfreetype6-dev \
    locales \
    zip \
    jpegoptim optipng pngquant gifsicle \
    vim \
    unzip \
    git \
    curl

# Clear cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring zip exif pcntl curl xml json

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copy aplikasi ke dalam container
COPY . /var/www

# Set working directory
WORKDIR /var/www

# Beri izin pada direktori
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage

# Expose port 9000 dan start PHP-FPM server
EXPOSE 9000
CMD ["php-fpm"]
