FROM php:7.4-fpm-alpine

# Apk install
RUN apk --no-cache update && apk --no-cache add bash git

# Install pdo
# (Je l'ai oublié dans la vidéo, c'est important car sans ça vous ne pouvez pas vous connecter à votre base de données)
RUN docker-php-ext-install pdo_mysql

# Install composer
RUN php -r "copy('https://getcomposer.org/installer', 'composer-setup.php');" && php composer-setup.php && php -r "unlink('composer-setup.php');" && mv composer.phar /usr/local/bin/composer

# Symfony CLI
RUN wget https://get.symfony.com/cli/installer -O - | bash && mv /root/.symfony5/bin/symfony /usr/local/bin/symfony

WORKDIR /var/www/html