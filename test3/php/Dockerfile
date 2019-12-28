FROM php:7.3.5-apache
COPY php.ini /usr/local/etc/php/

RUN apt-get update
RUN apt-get install -y libfreetype6-dev libjpeg62-turbo-dev libpng-dev libmcrypt-dev git vim iputils-ping net-tools
RUN docker-php-ext-install pdo_mysql mysqli mbstring gd iconv
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer
