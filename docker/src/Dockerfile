FROM ubuntu:16.04

MAINTAINER Nhan Nguyen <quocnhan1843@gmail.com>     

# Install common properties
RUN apt-get update -y && \
    apt-get install -y python-software-properties \
    software-properties-common

# Install php cli
RUN add-apt-repository ppa:ondrej/php && \
    apt-get update -y && \
    apt-get install -y --allow-unauthenticated \
    python-software-properties \
    git \
    curl \
    zip \
    php7.1 \
    php7.1-cli \
    php7.1-curl \
    php7.1-dev \
    php7.1-memcache \
    php7.1-memcached \
    php7.1-mysql \
    php-pear \
    php-bcmath \
    php-mbstring && \
    rm -rf /var/cache/apt/*

# Install nodejs, npm
RUN curl -sL https://deb.nodesource.com/setup_6.x | bash -
RUN apt-get update -y && \
    apt-get install -y \
    nodejs \
    build-essential && \
    rm -rf /var/cache/apt/*

# Install composer
RUN curl -sS https://getcomposer.org/installer | php
RUN mv composer.phar /usr/local/bin/composer

# Install grunt
RUN npm install -g grunt-cli

RUN mkdir -pv /var/www/project

WORKDIR /var/www/project

ENV LOCATION /var/www/project

#CMD ["tail", "-f", "/dev/null"]