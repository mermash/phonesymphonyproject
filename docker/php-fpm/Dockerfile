FROM php:8.1.0-fpm-alpine

# Install
RUN apk add --no-cache curl git build-base zlib-dev oniguruma-dev autoconf bash

#without it don't want to execute `pecl install xdebug`
RUN apk add --update linux-headers

ARG INSTALL_XDEBUG=false
#checkout xdebug from pecl and switch on extension xdebug for php
RUN if [ ${INSTALL_XDEBUG} = true ]; \
    then \
      pecl install xdebug && docker-php-ext-enable xdebug; \
    fi;

#add config for debug to container
COPY ./docker/php-fpm/xdebug.ini /usr/local/etc/php/conf.d/xdebug.ini

#mysql
RUN docker-php-ext-install pdo pdo_mysql mysqli

# Configure non-root user
ARG PUID=1000
ARG PGID=1000

RUN apk --no-cache add shadow && \
    groupmod -o -g ${PGID} www-data && \
    usermod -o -u ${PUID} -g www-data www-data

USER www-data

# Source code
COPY ./ /var/www
WORKDIR /var/www

# Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
#RUN composer install --no-interation

CMD php-fpm

EXPOSE 9000
