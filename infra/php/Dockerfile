FROM php:8.1-fpm-buster
WORKDIR /var/www/html
ENV COMPOSER_ALLOW_SUPERUSER=1 \
        COMPOSER_HOME=/composer
RUN apt-get update && \
        apt-get -y install --no-install-recommends git unzip libzip-dev libicu-dev libonig-dev && \
        apt-get clean && \
        rm -rf /var/lib/apt/lists/* && \
        docker-php-ext-install intl pdo_mysql zip bcmath && \
        curl -sL http://deb.nodesource.com/setup_18.x | bash - && \
        apt-get install -y nodejs
COPY --from=composer:2.2 /usr/bin/composer /usr/bin/composer
COPY ./ ./
RUN composer install && npm i && npm run build
COPY ./infra/php/php.ini /usr/local/etc/php/php.ini
COPY ./infra/php/www.conf /usr/local/etc/php-fpm.d/www.conf

VOLUME /var/www/html/public

RUN chmod -R 777 storage \
        && php artisan config:clear \
        && php artisan cache:clear
