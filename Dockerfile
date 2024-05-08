FROM php:8.3-fpm

# Instalace potřebných balíčků a rozšíření PHP
RUN apt-get update && apt-get install -y zlib1g-dev g++ git libicu-dev zip libzip-dev zip \
    && docker-php-ext-install intl opcache pdo pdo_mysql \
    && pecl install apcu \
    && docker-php-ext-enable apcu \
    && docker-php-ext-configure zip \
    && docker-php-ext-install zip

# Nainstalovat Composer
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Nastavení vlastního php.ini
COPY ./php.ini /usr/local/etc/php/php.ini

# Znovu nainstalovat rozšíření pdo_mysql, protože toto rozšíření musí být nainstalováno po nastavení php.ini
RUN docker-php-ext-install pdo_mysql



