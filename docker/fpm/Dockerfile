FROM php:7.1.1-fpm

MAINTAINER Nhan Nguyen <quocnhan1843@gmail.com>

# Version constants
ENV XDEBUG_VERSION xdebug-2.5.1
ENV JAVA_VERSION openjdk-7-jdk

# Install Dependencies
RUN apt-get update && \
    apt-get install -y \
    zlib1g-dev \
    libncurses5-dev \
    librabbitmq-dev \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libmcrypt-dev \
    libpng12-dev \
    libmemcached-dev \
    wget \
    cron \
    supervisor \
    vim \
    git \
    $JAVA_VERSION

# Installing extensions from pecl
RUN git clone -b php7 https://github.com/websupport-sk/pecl-memcache.git /usr/src/php/ext/pecl-memcache

RUN mkdir -pv /usr/src/php/ext/

RUN wget https://pecl.php.net/get/memcached-3.0.3.tgz && \
    tar xf memcached-3.0.3.tgz && \
    mv memcached-3.0.3 /usr/src/php/ext/pecl-memcached/

RUN curl -L "http://pecl.php.net/get/$XDEBUG_VERSION.tgz" >> /usr/src/php/ext/xdebug.tgz && \
    tar -xf /usr/src/php/ext/xdebug.tgz -C /usr/src/php/ext/ && \
    rm /usr/src/php/ext/xdebug.tgz

RUN ls /usr/src/php/ext/pecl-memcached/


# Enable PHP Extensions
RUN apt-get update && \
    docker-php-ext-install \
    bcmath \
    pdo_mysql \
    pcntl \
    pecl-memcache \
    pecl-memcached \
    $XDEBUG_VERSION \
    gd \
    zip \
    opcache

RUN apt-get update && \
    apt-get install -y apt-transport-https lsb-release ca-certificates && \
    wget -O /etc/apt/trusted.gpg.d/php.gpg https://packages.sury.org/php/apt.gpg && \
    echo "deb https://packages.sury.org/php/ $(lsb_release -sc) main" > /etc/apt/sources.list.d/php71.list

RUN apt-get update && \
    apt-get install -y \
    php7.1-intl \
    php7.1-fpm \
    php7.1-cli \
    php7.1-curl \
    php7.1-dev \
    php7.1-gd \
    php7.1-geoip \
    php7.1-imagick \
    php7.1-imap \
    php7.1-json \
    php7.1-ldap \
    php7.1-mcrypt \
    php7.1-memcache \
    php7.1-memcached \
    php7.1-mysql \
    php7.1-xdebug \
    php7.1-xmlrpc \
    php7.1-xsl \
    php7.1-tidy

# Cleanup
RUN rm -rf /var/lib/apt/lists/*

# Configuration management
COPY config/php7/php.ini /usr/local/etc/php/php.ini
COPY config/php7/php-fpm.conf /usr/local/etc/php-fpm.conf
COPY config/php7/www.conf /usr/local/etc/php-fpm.d/www.conf
COPY config/php7/zz-docker.conf /usr/local/etc/php-fpm.d/zz-docker.conf

# Allow write to folder that created by nginx
RUN usermod -u 1000 www-data 

# Share socket to nginx
VOLUME ["/var/run"]
WORKDIR /var/www/project
