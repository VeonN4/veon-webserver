FROM php:apache

# Install MySQLi extension
RUN docker-php-ext-install mysqli && docker-php-ext-enable mysqli

# Optional: update packages or install other dependencies if needed
RUN apt-get update && apt-get upgrade -y
