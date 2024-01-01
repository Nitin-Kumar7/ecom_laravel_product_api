# Use the official PHP image with FPM
FROM php:8.1.0-apache

# Set the working directory
WORKDIR /var/www/html

Mod Rewrite
RUN a2enmod rewrite
# Copy composer.lock and composer.json to install dependencies
COPY composer.lock composer.json /var/www/html/

# Install any dependencies
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg62-turbo-dev \
    libonig-dev \
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
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Get latest Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

 RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg \
  && docker-php-ext-install gd --j$(nproc) gd
