FROM php:8.2-apache
WORKDIR /var/www/html

# Enable Mod Rewrite
RUN a2enmod rewrite

# Update and install dependencies
RUN apt-get update -y && apt-get install -y \
    libicu-dev \
    libmariadb-dev \
    unzip zip \
    zlib1g-dev \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Install PHP Extensions
RUN docker-php-ext-install gettext intl pdo_mysql gd

# Configure GD extension
RUN docker-php-ext-configure gd --enable-gd --with-freetype --with-jpeg && docker-php-ext-install -j$(nproc) gd
