FROM php:7.3-apache
WORKDIR /var/www/html/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer

# RUN chmod u+x build/entrypoint.sh
# RUN chown 1000:1000 vendor

RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo pdo_mysql
RUN a2enmod rewrite && service apache2 restart
#Intalando descompactador
RUN apt-get update && apt-get install -y libmcrypt-dev\
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

COPY build/entrypoint.sh /usr/local/bin/docker-php-entrypoint
