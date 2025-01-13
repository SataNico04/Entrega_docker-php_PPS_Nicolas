# Documentación
Encontramos 2 secciones:

## Código PHP
En esta parte tenemos la declaración del array asociativo **alumnos**, que se compone de las claves **nombre** y **apellidos**.
Además, las variables **$busqueda**, que se usa para recoger lo que el cliente introduce en la query; y **$resultado**, que filtra el contenido del array según la variable anterior

## "Código" HTML
Por último, el código PHP devulve HTML para que apache se lo pueda mostrar a los usuarios.

## Despliegue
Para desplegar la aplicación, debemos crear 2 archivos de la siguiente manera:

web:
 |  
 |  docker-compose.yml
 |  
 |  Dockerfile
 |
 |  index.php
 |______________________

 En docker-compose.yml ponemos:

```bash
services:
  web:
    image: php:8.3-apache
    ports:
      - "8080:80"
    volumes: 
      - ./web:/var/www/html
```

Y en Dockerfile:

```bash
# Usa la imagen base de PHP con Apache
FROM php:8.3-apache

# Configuración opcional: instala extensiones adicionales si es necesario
RUN apt-get update && apt-get install -y \
    libzip-dev \
    zip \
    unzip \
    && docker-php-ext-install zip

# Habilita módulos de Apache si es necesario
RUN a2enmod rewrite

# Copia los archivos locales al directorio de Apache
COPY ./web /var/www/html

# Cambia permisos si es necesario
RUN chown -R www-data:www-data /var/www/html

# Exponer el puerto 80 (ya configurado en el docker-compose)
EXPOSE 80
```

Por último, entramos en la carpeta donde están los archivos y ponemos:

```bash
sudo docker compose up --build
```
