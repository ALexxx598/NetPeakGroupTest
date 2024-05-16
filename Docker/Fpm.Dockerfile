FROM php:8.2-fpm

RUN apt-get update && apt-get install -y \
      libicu-dev \
      libpq-dev \
      git \
      zip \
      unzip \
    && docker-php-ext-install \
      bcmath \
      intl

COPY . /var/www/app
WORKDIR /var/www/app