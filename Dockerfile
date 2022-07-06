FROM php:8.1-fpm

RUN curl -sL https://deb.nodesource.com/setup_14.x | bash -

RUN apt-get install -y nodejs

ADD https://github.com/ufoscout/docker-compose-wait/releases/download/2.7.2/wait /wait

RUN chmod +x /wait

RUN docker-php-ext-install pdo_mysql
