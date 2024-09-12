# Usar a imagem oficial do PHP
FROM php:8.1-apache

# Instalar extensões necessárias
RUN docker-php-ext-install mysqli

# Definir o diretório de trabalho
WORKDIR /var/www/html

# Copiar o código-fonte para o diretório de trabalho
COPY src/ /var/www/html/

# Expor a porta padrão do Apache
EXPOSE 80
