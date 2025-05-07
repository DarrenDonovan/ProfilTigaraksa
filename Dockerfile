# Gunakan image PHP sebagai base image
FROM php:8.3-fpm

# Install dependencies tambahan
RUN apt-get update && apt-get install -y libpng-dev libjpeg-dev libfreetype6-dev zip git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install gd

# Install Composer
RUN curl -sS https://getcomposer.org/installer | php \
    && mv composer.phar /usr/local/bin/composer

# Set working directory
WORKDIR /var/www

# Salin file aplikasi Laravel ke dalam container
COPY . .

# Install dependencies Laravel dengan Composer
RUN composer install

# Expose port
EXPOSE 8000

# Jalankan perintah default
CMD ["php-fpm"]
