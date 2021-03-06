FROM php:8.0-fpm

ARG DEBIAN_FRONTEND=noninteractive

RUN apt update && \
    apt install -y default-libmysqlclient-dev && \
    docker-php-ext-install pdo pdo_mysql && \
    pecl install -o -f redis \
    &&  rm -rf /tmp/pear \
    &&  docker-php-ext-enable redis

WORKDIR /app
