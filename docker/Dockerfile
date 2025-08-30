FROM php:8.2-apache

RUN apt update


# Install dependencies
RUN apt install -y libzip-dev libicu-dev libpng-dev libjpeg-dev libfreetype6-dev libonig-dev libxml2-dev git unzip libxslt-dev libpq-dev
RUN apt-get update \
    && apt-get install -y \
        librabbitmq-dev \
        libssh-dev \
    && docker-php-ext-install \
        bcmath \
        sockets \
    && pecl install amqp \
    && docker-php-ext-enable amqp \
    && pecl install redis \
    && docker-php-ext-enable redis
# Install PHP extensions
RUN docker-php-ext-configure pgsql -with-pgsql=/usr/local/pgsql
RUN docker-php-ext-install pdo pdo_mysql zip gd mbstring xml
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_pgsql pgsql
RUN docker-php-ext-install intl
RUN docker-php-ext-install xsl

# Install backup for mysql(mysqldump)
RUN apt-get install -y \
        default-mysql-client

# Install backup for mongodb(mongodump)
RUN apt-get update && \
    apt-get install -y wget gnupg && \
    wget -qO - https://pgp.mongodb.com/server-6.0.asc | gpg --dearmor -o /usr/share/keyrings/mongodb.gpg && \
    echo "deb [ signed-by=/usr/share/keyrings/mongodb.gpg ] https://repo.mongodb.org/apt/ubuntu focal/mongodb-org/6.0 multiverse" \
        | tee /etc/apt/sources.list.d/mongodb-org-6.0.list && \
    apt-get update && \
    apt-get install -y mongodb-database-tools
# Verify installation
RUN mongodump --version

# Install backup for postgresql(pg_dump)
RUN apt-get install -y \
        postgresql-client

# Install backup for sqlite3
RUN apt-get install -y \
        sqlite3

# increase memory limit
RUN echo "memory_limit=512M" > /usr/local/etc/php/conf.d/memory-limit.ini

# Enable Apache mod_rewrite
RUN command a2enmod rewrite
RUN service apache2 restart

# # # Install Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# # # Install Artisan
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=artisan

# # # Set working directory
WORKDIR /var/www/html

RUN chown -R www-data:www-data /var/www/html

COPY config/apache/apache-config.conf /etc/apache2/sites-available/000-default.conf

# # # Start Apache
CMD ["apache2-foreground"] 

