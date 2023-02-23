# Imagen de NodeJS
FROM node:14-alpine

# Establecer directorio de trabajo
WORKDIR /var/www/html/app

# Copiar shell scripts
COPY scripts /var/www/docker/node

# Eliminar caracteres incompatibles
RUN sed -i 's/\r$//' /var/www/docker/node/*.sh

# Otorgar permisos de ejecución a los archivos sh
RUN chmod +x /var/www/docker/node/*.sh

# Ejecutar archivo principal sh de arranque
CMD [ "/var/www/docker/node/run.sh" ]