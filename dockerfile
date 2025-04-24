FROM php:8.3-apache

# Installe l'extension MySQLi pour PHP
RUN docker-php-ext-install mysqli

# Copie tout le contenu du dossier dans le dossier du serveur web
COPY . /var/www/html/

# Active le module de réécriture (si besoin pour route.php)
RUN a2enmod rewrite

EXPOSE 80