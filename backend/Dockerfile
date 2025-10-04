# Stage 1: PHP with required extensions
FROM php:8.4.11-fpm AS php

# Set working directory
WORKDIR /var/www

# Install system dependencies & PHP extensions
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    locales \
    zip \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && apt-get clean && rm -rf /var/lib/apt/lists/*

# Install Composer
COPY --from=composer:2 /usr/bin/composer /usr/bin/composer

# Copy app files
COPY . /var/www

# Permissions
RUN chown -R www-data:www-data /var/www \
    && chmod -R 755 /var/www/storage \
    && chmod -R 755 /var/www/bootstrap/cache


# Stage 2: Nginx + PHP-FPM together
FROM nginx:alpine

# Install bash & supervisor (to run both nginx and php-fpm together)
RUN apk add --no-cache bash supervisor

# Copy PHP from build stage
COPY --from=php /usr/local/etc/php /usr/local/etc/php
COPY --from=php /usr/local/bin/php /usr/local/bin/php
COPY --from=php /usr/local/sbin/php-fpm /usr/local/sbin/php-fpm
COPY --from=php /usr/bin/composer /usr/bin/composer
COPY --from=php /var/www /var/www

# Copy Nginx config
COPY ./nginx.conf /etc/nginx/conf.d/default.conf

# Supervisor config
COPY ./supervisord.conf /etc/supervisord.conf

WORKDIR /var/www

EXPOSE 80

# Start supervisord (runs both php-fpm + nginx)
CMD ["/usr/bin/supervisord", "-c", "/etc/supervisord.conf"]
