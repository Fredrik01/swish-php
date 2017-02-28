FROM php:7.1-alpine

RUN apk add --update curl bash openssl && \
    rm -rf /var/cache/apk/*

WORKDIR /var/www/html

COPY . .

ENV COMPOSER_ALLOW_SUPERUSER=1

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer \
    && composer install --no-interaction

ENV PATH /var/www/html/vendor/bin:$PATH
