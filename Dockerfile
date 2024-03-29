FROM php:7.1-fpm

RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

RUN \
    apt-get update && \
    apt-get install -y \
        nano \
        libldap2-dev \
        zlib1g-dev \
        libicu-dev \
        g++ \
        vim \
        libmcrypt-dev \
        php-pear \
        curl \
        wget \
        git \
        zip \
        supervisor \
        cron \
        sendmail-bin \
        libxml2-dev \
    && rm -rf /var/lib/apt/lists/* \
    && docker-php-ext-configure ldap --with-libdir=lib/x86_64-linux-gnu/ \
    && docker-php-ext-configure pdo_mysql --with-pdo-mysql=mysqlnd \
    && docker-php-ext-install ldap \
    && docker-php-ext-install pdo_mysql \
    && docker-php-ext-install mcrypt \
    && docker-php-ext-install intl \
    && docker-php-ext-install zip \
    && docker-php-ext-install xml

COPY /appcode /var/www/html

VOLUME /var/www/html