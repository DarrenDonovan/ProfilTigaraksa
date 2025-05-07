# Gunakan image PHP-FPM sebagai base image
FROM php:8.3-fpm

# Install dependencies sistem yang diperlukan (misalnya, libpng-dev, libxml2-dev, dan lain-lain)
RUN apt-get update && apt-get install -y \
    unzip \
    zip \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    libzip-dev \
    && docker-php-ext-install pdo_mysql zip mbstring exif pcntl bcmath

# Install Composer (dependency manager PHP)
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Tentukan direktori kerja di dalam container
WORKDIR /var/www

# Salin semua file dari folder lokal ke dalam container
COPY . .

# Install dependencies Laravel menggunakan Composer
RUN composer install --no-dev --optimize-autoloader

# Berikan izin yang tepat pada direktori storage dan cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Set default command untuk menjalankan PHP-FPM
CMD ["php-fpm"]
