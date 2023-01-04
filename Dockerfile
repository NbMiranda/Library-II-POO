FROM php:7.3-apache
WORKDIR /var/www/html/
COPY --from=composer:latest /usr/bin/composer /usr/local/bin/composer
#Instalando mysqli e PDO
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli
RUN docker-php-ext-install pdo pdo_mysql && docker-php-ext-enable pdo pdo_mysql
#Comando para .haccess
RUN a2enmod rewrite && service apache2 restart
#Intalando descompactador
RUN apt-get update && apt-get install -y libmcrypt-dev\
    zlib1g-dev \
    libzip-dev \
    unzip
RUN docker-php-ext-install zip
#Instalando Composer e phpdotenv
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# ENTRYPOINT [ "/docker-entrypoint.sh", "composer require vlucas/phpdotenv" ]
# COPY ./docker-entrypoint.sh /
COPY ./entrypoint/docker-entrypoint.sh /docker-entrypoint.sh
# ENTRYPOINT [ "docker-entrypoint.sh" ]
ENTRYPOINT ["/docker-entrypoint.sh"]
# CMD [ "composer require vlucas/phpdotenvutable" ]