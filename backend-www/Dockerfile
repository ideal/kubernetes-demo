FROM ideal/archlinux-php:latest

COPY . /var/www

RUN composer install --no-dev && \
    composer dump-autoload -o && \
    php /var/www/sbin/hyperf.php di:init-proxy

ENTRYPOINT ["php", "/var/www/sbin/hyperf.php", "start"]

