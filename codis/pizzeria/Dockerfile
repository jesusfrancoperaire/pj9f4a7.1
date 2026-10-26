# Descarrega una imatge base de contenidor Docker amb Apache2 i PHP 8.3
FROM php:8.3-apache

# El directori de treball per defecte del contenidor serà /var/www/html
WORKDIR /var/www/html

# Copia el directori app dins del directori de treball per defecte
COPY app .

# Exposa el port 80/tcp del contenidor
EXPOSE 80