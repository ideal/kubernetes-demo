FROM archlinux

LABEL maintainer="ideal <idealities@gmail.com>"

ARG timezone

ENV TIMEZONE=${timezone:-"Asia/Shanghai"}

RUN ln -sf /usr/share/zoneinfo/${TIMEZONE} /etc/localtime

COPY mirrorlist /etc/pacman.d/mirrorlist

RUN echo -e '[archlinuxcn]\n\
Server = https://repo.archlinuxcn.org/$arch\n\
' >> /etc/pacman.conf

RUN pacman -Syy --noconfirm && \
    pacman -S --noconfirm awk && \
    pacman-key --init && \
    pacman-key -r F9F9FA97A403F63E && \
    pacman-key -f F9F9FA97A403F63E && \
    pacman-key --lsign-key F9F9FA97A403F63E && \
    pacman -Su --noconfirm && \
    pacman -S --noconfirm gettext grep wget unzip php php-embed php-swoole php-redis composer && \
    pacman -Scc --noconfirm && \
    rm -rf /etc/pacman.d/gnupg/{openpgp-revocs.d/,private-keys-v1.d/,pubring.gpg~}* && \
    rm -rf /var/cache/pacman/pkg/* /tmp/* && \
    { \
        echo "upload_max_filesize=100M"; \
        echo "post_max_size=105M"; \
        echo "memory_limit=1024M"; \
        echo "date.timezone=${TIMEZONE}"; \
    } | tee /etc/php/conf.d/overrides.ini && \
    { \
        echo "extension=swoole.so"; \
        echo 'swoole.use_shortname="Off"'; \
    } | tee /etc/php/conf.d/swoole.ini && \
    php -v && \
    php -m

RUN composer config -g repo.packagist composer https://mirrors.aliyun.com/composer/
    
WORKDIR /var/www

