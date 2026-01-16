FROM php:8.2-apache

# Install system dependencies
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    libxml2-dev \
    libicu-dev \
    libonig-dev \
    curl \
    unzip \
    git \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) \
        gd \
        mysqli \
        pdo_mysql \
        zip \
        soap \
        bcmath \
        intl \
        opcache \
        xml \
        mbstring

# Install Redis extension
RUN pecl install redis \
    && docker-php-ext-enable redis

# Enable Apache modules
RUN a2enmod rewrite headers

# Copy custom PHP config
COPY docker/php.ini /usr/local/etc/php/conf.d/custom.ini

# Set working directory
WORKDIR /var/www/html

# Copy application files
COPY . /var/www/html/

# Copy entrypoint script
COPY docker/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Create tmp directories and set permissions
RUN mkdir -p /var/www/html/tmp/errorLog \
    /var/www/html/tmp/compile \
    /var/www/html/tmp/cache_1626966733 \
    /var/www/html/tmp/upload \
    /var/cpanel/php/sessions/ea-php82 \
    && chmod -R 777 /var/www/html/tmp /var/cpanel/php/sessions/ea-php82 \
    && chown -R www-data:www-data /var/www/html

# Build cleanup
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Set Entrypoint
ENTRYPOINT ["entrypoint.sh"]
CMD ["apache2-foreground"]
