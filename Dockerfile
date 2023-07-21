# Use a imagem oficial do PHP 8.1 com Apache
FROM php:8.1-apache

# Instala as extensões do PHP necessárias
RUN docker-php-ext-install pdo pdo_mysql

# Instala o Xdebug
RUN pecl install xdebug && docker-php-ext-enable xdebug

# Instala o Composer
ENV COMPOSER_HOME /composer
ENV PATH $PATH:/composer/vendor/bin
RUN curl -sS https://getcomposer.org/installer | php -- --install-dir=/usr/local/bin --filename=composer

# Configuração do PHP e do Xdebug
COPY docker/xdebug.ini /usr/local/etc/php/conf.d/

# Permitir o uso do .htaccess
RUN sed -i 's/AllowOverride None/AllowOverride All/g' /etc/apache2/apache2.conf

# Configuração do Apache
RUN a2enmod rewrite

# Copia os arquivos do aplicativo para o diretório de trabalho do Apache
COPY . /var/www/html
RUN rm -rf /var/www/html/index.html

# Permissões
RUN chown -R www-data:www-data /var/www/html
RUN chmod -R 755 /var/www/html

RUN composer install

# Inicia o Apache e o PHP-FPM quando o contêiner for iniciado
CMD ["apache2-foreground"]
