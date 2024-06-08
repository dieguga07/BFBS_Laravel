# Usar una imagen base con PHP 8.2
FROM php:8.2-fpm

# Instalar extensiones y dependencias necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    && docker-php-ext-install zip pdo_mysql

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos de tu aplicación
COPY . .

# Instalar dependencias
RUN composer install

# Optimizar Laravel
RUN php artisan optimize && php artisan config:cache && php artisan route:cache && php artisan view:cache && php artisan migrate --force

# Exponer el puerto 9000 y iniciar el servidor php-fpm
EXPOSE 9000
CMD ["php-fpm"]
