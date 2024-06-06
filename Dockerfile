FROM --platform=amd64 php:8.2-apache

# Install system dependencies
RUN docker-php-ext-install pdo_mysql mysqli