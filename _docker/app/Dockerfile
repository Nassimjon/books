FROM php:8.2-fpm

# Установка необходимых пакетов
RUN apt-get update -y && apt-get install -y libpng-dev zlib1g-dev libzip-dev zip libfreetype6-dev libwebp-dev libjpeg62-turbo-dev libgmp-dev libldb-dev libldap2-dev netcat-traditional sqlite3 libsqlite3-dev libpq-dev && \
    ln -s /usr/lib/x86_64-linux-gnu/libldap.so /usr/lib/libldap.so \
    && ln -s /usr/lib/x86_64-linux-gnu/liblber.so /usr/lib/liblber.so \
    && docker-php-ext-configure gd --with-freetype --with-jpeg --with-webp \
    && docker-php-ext-install mysqli pdo pdo_mysql pdo_sqlite gd zip gmp bcmath pcntl ldap sysvmsg exif \
    && docker-php-ext-configure pgsql --with-pgsql=/usr/local/pgsql \
    && docker-php-ext-install pgsql pdo_pgsql


## Установка расширений PHP
#RUN docker-php-ext-install pdo_pgsql bcmath gd zip

# Создание пользователя nashimudes
RUN adduser --disabled-password --gecos '' nashimudes

# Копирование php.ini
COPY ./_docker/app/php.ini /usr/local/etc/php/conf.d/php.ini

# Установка Composer
ENV COMPOSER_ALLOW_SUPERUSER=1
WORKDIR /var/www



COPY . .

RUN curl -sS https://getcomposer.org/installer | php -- \
    --filename=composer \
    --install-dir=/usr/local/bin


# Настройка прав доступа к папкам
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache

# Установка зависимостей проекта с помощью Composer
RUN composer install

# Установка зависимостей Node.js
#RUN npm install

# Настройка прав доступа для директории storage и bootstrap/cache
RUN chown -R www-data:www-data /var/www/storage /var/www/bootstrap/cache \
    && chmod -R 775 /var/www/storage /var/www/bootstrap/cache

# Установка команд для запуска php-fpm
CMD ["php-fpm"]
