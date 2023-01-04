# Librarty 


## Instalação do composer necessaria

sudo apt install composer

### Delete a pasta **vendor** e depois rode o comando abaixo na pasta raiz

composer require vlucas/phpdotenv

## INTALANDO PDO(caso de erro com o Dockerfile)

docker exec -ti <php-container> sh

docker-php-ext-install pdo pdo_mysql

docker-php-ext-enable pdo pdo_mysql

apachectl restart
