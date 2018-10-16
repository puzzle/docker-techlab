FROM php:7.0-apache

# copies the php source code to the correct location
ADD ./php-app/ /var/www/html/

# install additional php extension
RUN docker-php-ext-install mysqli


