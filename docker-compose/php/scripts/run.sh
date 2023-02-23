echo ".:Archiplus:."
echo "-------------"
echo ">> Ambiente de Desarrollo Backend (Laravel)."

# Se definen las variables
VENDOR_DIR="vendor"
SCRIPTS_DIR="/var/www/docker/php"
WORKDIR="/var/www/html"

# Ingresar al directorio del proyecto
cd $WORKDIR

if [ -d "$VENDOR_DIR" ]; then
	# Si el directorio vendor existe se limpia únicamente caché
  echo " > Limpiando caché de Laravel."
	php artisan optimize:clear
else
	# Si el directorio vendor no existe se realiza la instalación del proyecto
	FILE=".env"
	if [ -f "$FILE" ]; then
		echo " > Archivo .env encontrado."
	else
		echo " > Archivo .env no encontrado. Creando..."
		cp .env.example .env
	fi

	COMPOSER_LOCK="composer.lock"
	if [ -f "$COMPOSER_LOCK" ]; then
		echo " > Archivo composer.lock encontrado. Eliminando para evitar problemas de instalación de dependencias."
		rm composer.lock
	fi

	echo " > Instalando dependencias de composer."
	composer install
	echo " > Generando Key de Laravel."
	php artisan key:generate
	echo " > Creando link simbólico de almacenamiento."
	php artisan storage:link
	echo " > Limpiando caché."
	php artisan optimize:clear
	echo " > Configuración de Base de datos."
	$SCRIPTS_DIR/db.sh
	echo " > Otorgando permisos a www-data."
	chown -R www-data:www-data *	
fi

echo ">> Ambiente Iniciado Correctamente."
php-fpm
