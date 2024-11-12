#!/bin/bash

# Permisos a la carpeta
chmod -R 777 storage/

# Instalar el composer
echo "Instalando composer"
composer install

# Reiniciar rutas
echo "Limpiando las rutas..."
php artisan route:clear
php artisan route:cache

# Mejorar funcionamiento
echo "Limpiando las configuraciones..."
php artisan config:clear

# Ejecutar el servidor de Apache (mantener contenedor activo)
apache2-foreground