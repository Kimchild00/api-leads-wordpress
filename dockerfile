FROM php:8.0.2-cli-alpine

ENV \
    APP_PORT="8001"
    # APP_DIR="/app" \

COPY . /

RUN apk add --update \
    curl \
    php \
    php-opcache\
    php-openssl\
    php-pdo\
    php-json\
    php-phar\
    php-dom\
    && rm -rf /var/cache/apk/*

RUN curl -sS https://getcomposer.org/installer | php -- \
    --install-dir=/usr/bin --filename=composer

# RUN curl -sS https://getcomposer.org/installer | php -- --check

RUN composer-update
RUN cd / && php artisan key:generate

WORKDIR /
CMD php artisan serve --host=0.0.0.0 --port=$APP_PORT

EXPOSE $APP_PORT
