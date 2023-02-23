# Imagen de PHP
FROM php:8.0-fpm

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    git \
    curl \
    libpng-dev \
    libonig-dev \
    libxml2-dev \
    zip \
    unzip

# Limpiar cache
RUN apt-get clean && rm -rf /var/lib/apt/lists/*

# Intalar extensiones de PHP 
RUN docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd

# Obtener ultimo Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Copiar shell scripts
COPY scripts /var/www/docker/php

# Eliminar caracteres incompatibles
RUN sed -i 's/\r$//' /var/www/docker/php/*.sh

# Otorgar permisos de ejecución a los archivos sh
RUN chmod +x /var/www/docker/php/*.sh

# Ejecutar archivo principal sh de arranque
CMD [ "/var/www/docker/php/run.sh" ]
