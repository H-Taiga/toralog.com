FROM php:8.3-fpm

# タイムゾーンとロケール設定（環境変数）
ENV TZ=Asia/Tokyo
ENV LANG=en_US.UTF-8
ENV LANGUAGE=en_US:en
ENV LC_ALL=en_US.UTF-8

# 必要パッケージをまとめてインストール
RUN apt-get update && \
    apt-get install -y --no-install-recommends \
        locales \
        locales-all \
        git \
        unzip \
        libzip-dev \
        libicu-dev \
        libonig-dev \
        npm \
    && sed -i '/en_US.UTF-8/s/^# //g' /etc/locale.gen \
    && locale-gen \
    && docker-php-ext-install intl pdo_mysql zip bcmath \
    && apt-get clean \
    && rm -rf /var/lib/apt/lists/*

COPY ./docker/php-fpm/php.ini /usr/local/etc/php/php.ini

# xdebug インストール
RUN pecl install xdebug && \
    docker-php-ext-enable xdebug
