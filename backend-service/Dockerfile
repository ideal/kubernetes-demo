FROM ideal/archlinux-php:latest

COPY . /var/www

RUN echo "extension=pdo_mysql" > /etc/php/conf.d/pdo_mysql.ini

RUN composer install --no-dev && \
    composer dump-autoload -o && \
    sh vendor/bin/init-proxy.sh

ENTRYPOINT ["php", "/var/www/sbin/hyperf.php", "start"]

