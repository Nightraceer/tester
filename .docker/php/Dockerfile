FROM php:8.3-fpm

RUN apt-get update \
    && apt-get -y install librabbitmq-dev \
                          libpq-dev \
                          git \
                          $PHPIZE_DEPS \
    && docker-php-ext-install pdo_pgsql pgsql pcntl \
    && pecl install redis \
    && pecl install amqp \
    && pecl install xdebug \
    && docker-php-ext-enable pdo_pgsql redis amqp xdebug

RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" \
        && php composer-setup.php  --install-dir="/usr/bin" --filename=composer \
        && php -r "unlink('composer-setup.php');" \
        && composer self-update
