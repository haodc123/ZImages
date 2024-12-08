FROM php:8.2.1-fpm-alpine
WORKDIR /var/www

RUN apk upgrade --update && \
  apk --no-cache add icu-dev autoconf make g++ gcc oniguruma-dev libzip-dev \
  && docker-php-ext-install zip

RUN docker-php-ext-install -j$(nproc) intl mbstring pdo_mysql

COPY ./docker/laravel-php/php.ini /usr/local/etc/php/
COPY ./web /var/www

COPY --from=composer /usr/bin/composer /usr/bin/composer
ENV COMPOSER_ALLOW_SUPERUSER 1
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin

RUN composer install

RUN chmod -R 777 /var/www/storage \
        /var/www/bootstrap/cache
