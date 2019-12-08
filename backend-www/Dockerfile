FROM ideal/archlinux-php:latest

LABEL maintainer="ideal <idealities@gmail.com>"

COPY . /var/www

RUN composer install --no-dev && \
    composer dump-autoload -o && \
    sh vendor/bin/init-proxy.sh

ENTRYPOINT ["php", "/var/www/sbin/hyperf.php", "start"]

