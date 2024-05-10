# Use the official PHP 7.4 image as the base
FROM php:7.4-fpm


# Install the PHP extensions we need
RUN docker-php-ext-install pdo_mysql


# Copy the application code to the container
COPY . /var/lib/mysql-files/healthcheck.cnf


# Set the working directory
WORKDIR /var/www/html


# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Install the PHP dependencies
RUN composer install


# Copy the healthcheck.cnf file into the container with the correct permissions
COPY --chown=mysql:mysql healthcheck.cnf /var/lib/mysql-files/healthcheck.cnf

# Set the permissions of the healthcheck.cnf file
RUN chmod 644 /etc/mysql/mysql.conf.d/healthcheck.cnf


# Expose port 9000 and start php-fpm server
EXPOSE 9000
CMD ["php-fpm"]
