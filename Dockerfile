# Usar una imagen base con PHP 8.2
FROM php:8.2-fpm

# Instalar extensiones y dependencias necesarias
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    git \
    curl \
    && docker-php-ext-install zip pdo_mysql

# Instalar Node.js y npm
RUN curl -fsSL https://deb.nodesource.com/setup_16.x | bash - \
    && apt-get install -y nodejs

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer el directorio de trabajo
WORKDIR /var/www/html

# Copiar los archivos de tu aplicación
COPY . .

# Instalar dependencias PHP y Node.js
RUN composer install
RUN npm install --production

# Copiar archivo .env
COPY .env .

# Revisar permisos de carpetas
RUN chown -R www-data:www-data /var/www/html/storage /var/www/html/bootstrap/cache
RUN chmod -R 775 /var/www/html/storage /var/www/html/bootstrap/cache

# Ejecutar los comandos de Artisan uno por uno para identificar el problema
RUN php artisan optimize || { echo 'php artisan optimize failed' ; exit 1; }
RUN php artisan config:cache || { echo 'php artisan config:cache failed' ; exit 1; }
RUN php artisan route:cache || { echo 'php artisan route:cache failed' ; exit 1; }
RUN php artisan view:cache || { echo 'php artisan view:cache failed' ; exit 1; }
RUN php artisan migrate --force || { echo 'php artisan migrate --force failed' ; exit 1; }

# Exponer el puerto 9000 y iniciar el servidor php-fpm
EXPOSE 9000
CMD ["php-fpm"]
