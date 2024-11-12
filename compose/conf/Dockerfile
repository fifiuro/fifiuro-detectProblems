# Usar la imagen oficial de PHP con Apache y Bullseye
FROM php:8.3.12-apache-bullseye

# Instalar extensiones necesarias para Laravel
RUN apt-get update && apt-get install -y \
    libfreetype6-dev \
    libjpeg62-turbo-dev \
    libpng-dev \
    libpq-dev \
    zip \
    libzip-dev \
    unzip \
    git \
    curl \
    libonig-dev \
    libxml2-dev \
    netcat \
    && docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install -j$(nproc) gd mbstring xml pdo pdo_pgsql zip  # Instalar PDO y PDO_PGSQL

# Instalar Composer globalmente
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Crear y establecer el directorio de la aplicación Laravel
WORKDIR /var/www/html

# Copiar el contenido de tu proyecto Laravel al contenedor
COPY . /var/www/html

# Configurar Apache para usar la carpeta "public" como el DocumentRoot
RUN sed -i 's|/var/www/html|/var/www/html/public|g' /etc/apache2/sites-available/000-default.conf

# Dar permisos al directorio de almacenamiento y caché
RUN chown -R 777 /var/www/html/storage

# Copiar el script de inicio
COPY compose/conf/entrypoint.sh /usr/local/bin/entrypoint.sh
RUN chmod +x /usr/local/bin/entrypoint.sh

# Habilitar el módulo de reescritura de Apache (para que funcione correctamente con Laravel)
RUN a2enmod rewrite

# Exponer el puerto 80
EXPOSE 80

# Configurar el punto de entrada
CMD ["apache2-foreground"]
