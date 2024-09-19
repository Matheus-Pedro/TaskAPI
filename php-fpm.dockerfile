FROM php:8.2-fpm

RUN apt-get update && apt-get install -y 

#CONFIGURAÇÕES DO OPCACHE
RUN docker-php-ext-install opcache

#LIBS EXTRAS
RUN docker-php-ext-install bcmath
RUN apt-get install -y libbz2-dev
RUN docker-php-ext-install bz2
RUN apt-get install -y libpq-dev
RUN apt-get install -y libicu-dev
RUN docker-php-ext-install intl

#GD
RUN apt-get update && apt-get install -y \
		libfreetype-dev \
		libjpeg62-turbo-dev \
		libpng-dev \
	&& docker-php-ext-configure gd --with-freetype --with-jpeg \
	&& docker-php-ext-install -j$(nproc) gd


#PDO - CUSTOMIZAR A SEU DISPOR
RUN docker-php-ext-install pdo pdo_mysql
