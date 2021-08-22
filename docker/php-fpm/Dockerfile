FROM php:8.0-fpm
WORKDIR "/var/www/quiz"

RUN apt-get update && apt-get install -y
RUN docker-php-ext-install pdo pdo_mysql
