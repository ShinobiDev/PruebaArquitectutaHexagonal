FROM php:8.0-fpm

# Install dependencies for PHP extensions
RUN apt-get update && apt-get install -y \
   libpng-dev \
   libonig-dev \
   libxml2-dev \
   zip \
   unzip

# Install PHP extensions
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Set working directory
WORKDIR /var/www

# Copy existing application directory contents
COPY . /var/www

# Copy existing application directory permissions
COPY --chown=www-data:www-data . /var/www

# Change current user to www
USER www-data

EXPOSE 9000

CMD ["php-fpm"]