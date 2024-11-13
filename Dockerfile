# Etapa 1: Construcción de dependencias
FROM php:8.1-fpm AS build

# Instalar dependencias del sistema
RUN apt-get update && apt-get install -y \
    build-essential \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip \
    git \
    curl

# Configurar PHP y extensiones necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip gd

# Instalar Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar archivos del proyecto
COPY . .

# Instalar dependencias de PHP
RUN composer install --no-dev --optimize-autoloader

# Copiar el archivo de configuración de producción (por ejemplo, .env.production)
COPY .data .env

# Generar la clave de la aplicación
# RUN php artisan key:generate

# Compilar assets (si usas Laravel Mix, TailwindCSS, etc.)
RUN npm install && npm run prod

# Eliminar dependencias de desarrollo y archivos innecesarios
RUN rm -rf node_modules && \
    rm -rf /var/www/html/storage/logs/*

# Etapa 2: Imagen de producción final
FROM php:8.1-fpm

# Copiar dependencias de sistema y configuración PHP
RUN apt-get update && apt-get install -y \
    libpng-dev \
    libjpeg-dev \
    libfreetype6-dev \
    libzip-dev \
    zip \
    unzip

# Configurar PHP y extensiones necesarias
RUN docker-php-ext-configure gd --with-freetype --with-jpeg \
    && docker-php-ext-install pdo pdo_mysql zip gd

# RUN php artisan key:generate

# Establecer directorio de trabajo
WORKDIR /var/www/html

# Copiar la aplicación desde la etapa de construcción
COPY --from=build /var/www/html /var/www/html

# Configurar permisos
RUN chown -R www-data:www-data /var/www/html \
    && chmod -R 755 /var/www/html/storage

# Puerto expuesto por Laravel
EXPOSE 9000

# Comando de inicio de PHP-FPM
CMD ["php-fpm"]
