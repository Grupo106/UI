<?php include('estructura/header.php'); ?>
<?php include('estructura/menu.php'); ?>


<div class="col_full">
	<div class="fancy-title title-center title-border-color">
		<h3>Para mas información</h3>
	</div>
</div>
<div class="table-responsive" style="margin-left:143px;">
	<div class="col_one_third">
	 	<a href="#inicio">
		<img  src="<?=base_url('public/images/ayuda/icono-inicio.png')?>">
		<label>Inicio</label>
		</a>
	</div>

	<div  class="col_one_third">
	    <a href="#monitoreo">
		<img  src="<?=base_url('public/images/ayuda/icono-monitoreo.png')?>">
		<label>Monitoreo</label>
		</a>
	</div>

	<div class="col_one_third col_last">
		<a href="#trafico">
		<img  src="<?=base_url('public/images/ayuda/icono-clasetrafico.png')?>">
		<label>Clases de tráfico</label>
		</a>
	</div>

	<div class="col_one_third">
		<a href="#politicas">
		<img  src="<?=base_url('public/images/ayuda/icono-politicas.png')?>">
		<label>Políticas</label>
		</a>
	</div>

	<div class="col_one_third">
		<a href="#usuarios">
		<img  src="<?=base_url('public/images/ayuda/icono-usuarios.png')?>">
		<label>Usuarios</label>
		</a>
	</div>	

	<div class="col_one_third col_last">
		<a href="#sistema">
		<img  src="<?=base_url('public/images/ayuda/icono-sistema.png')?>">
		<label>Sistema</label>
		</a>
	</div>		
	

</div>

<div class="col_full" style="margin-bottom:300px;">
	<div class="fancy-title title-center title-border-color"></div>
</div>
<div  id="inicio" class="heightMenu"></div>
<div class="col_full" style="margin-bottom:0px;">
	<div  class="fancy-title title-block">
		<h3 style="font-size:33px;">Inicio</h3>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Como podemos observar en la siguiente imágen, en esta pantalla tenemos toda la información necesaria de las últimas acciones que se realizaron en el sistema y qué usuario las efectuó. Como por ejemplo, creación de usuarios, consulta de tráfico en el período seleccionado, creación de reglas, etc.</p>
		<div style="text-align:center;"><img src="<?=base_url('public/images/ayuda/inicio.png')?>"></div>
		
	</div>
</div>
<div  id="monitoreo" class="heightMenu"></div>
<div  class="col_full" style="margin-bottom:0px;">
	<div class="fancy-title title-block">
		<h3 style="font-size:33px;">Monitoreo</h3>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Monitoreo en Tiempo Real</h3>
		</div>		
	</div>
	<div >
		<p class="textAyuda marginBeforeImage">En este módulo del sistema, se encuentra toda la información relacionada con el tráfico de la red en tiempo real, ya sea tráfico de bajada o de subida. Como observamos en la siguiente imágen, en la que se visualiza el tráfico de bajada, tenemos 2 gráficos que nos representan el tráfico de la red. Uno es un gráfico de líneas con la información del consumo total sin clasificarse, y otro es un gráfico de tortas que tiene la información clasificada de acuerdo a las clases de tráfico que hemos creado previamente. Ambos gráficos se actualizan en un lapso de segundos para brindar la información lo mas precisa posible.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-actual-bajada.png')?>"></div>
	</div>
	<div >
		<p class="textAyuda marginBeforeImage">En la siguiente imágen se especifica la información del tráfico de subida de la red. Tanto en el consumo clasificado como el consumo total.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-actual-subida.png')?>"></div>
	</div>
	<div >
		<p class="textAyuda marginBeforeImage">Si clickeamos en "Ver Detalle" o nos posicionamos con el puntero del mouse por encima del gráfico del consumo clasificado nos aparecerá un tooltip que nos brinda información extra sobre la clase de tráfico.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-actual-tooltip.png')?>"></div>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Monitoreo histórico</h3>
		</div>		
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Aquí encontramos todo el consumo histórico total y consumo histórico clasificado que hubo en la red, tanto como para el tráfico de bajada como para el tráfico de subida.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-periodo-busqueda.png')?>"></div>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Monitoreo por Período</h3>
		</div>		
	</div>
	<div >
		<p class="textAyuda marginBeforeImage">También podemos buscar el consumo que existió en la red en un periodo seleccionado.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-periodo-busqueda.png')?>"></div>
	</div>
	<div >
		<p class="textAyuda marginBeforeImage">Luego de la búsqueda, observamos el consumo total y clasificado que hubo en la red, en el tráfico de bajada y de subida para el periodo de tiempo elegido.</p>
		<div style="text-align:center;"><img src="<?=base_url('public/images/ayuda/monitoreo-periodo-bajada.png')?>"></div>
	</div>
	<div >		
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-periodo-subida.png')?>"></div>
	</div>
</div>
<div  id="trafico" class="heightMenu"></div>
<div  class="col_full" style="margin-bottom:0px;">
	<div class="fancy-title title-block">
		<h3 style="font-size:33px;">Trafico</h3>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Nueva Clase de Tráfico</h3>
		</div>		
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Para la creación de una nueva clase de tráfico, es necesario completar el NOMBRE, la DESCRIPCIÓN y la dirección ip o puerto en internet o la dirección ip o puerto de la red local (LAN). Vale aclarar que se pueden agregar mas de una dirección y puerto tanto en la sección de internet como en la sección LAN. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/clase-trafico.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Aquí podremos especificar la lista de redes y lista de puertos en internet que queremos clasificar. Clickeando en el icóno + de color verde, se puede agregar más de una direccion ip con el prefijo correspondiente, donde la direccion es el identificador de red y el prefijo es la cantidad de bits que contiene la máscara de subred. Si no se ingresa un prefijo, se entiende que se trata de una dirección de host. También podemos agregar más de un puerto con el protocolo asociado, donde el numero es el identificador del puerto y el protocolo puede ser 'tcp' o 'udp'. Si no se especifica protocolo, se asume que el puerto puede pertenecer a cualquiera de ellos.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/clase-trafico-destino.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Aquí podremos especificar la lista de redes y lista de puertos de la red local que queremos clasificar. Clickeando en el icóno + de color verde, se puede agregar más de una direccion ip con el prefijo correspondiente, donde la direccion es el identificador de red y el prefijo es la cantidad de bits que contiene la máscara de subred. Si no se ingresa un prefijo, se entiende que se trata de una dirección de host. También podemos agregar más de un puerto con el protocolo asociado, donde el numero es el identificador del puerto y el protocolo puede ser 'tcp' o 'udp'. Si no se especifica protocolo, se asume que el puerto puede pertenecer a cualquiera de ellos.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/clase-trafico-origen.png')?>"></div>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Consulta Clases de Tráfico</h3>
		</div>		
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Aquí podremos observar la información de las distintas clases de tráfico creadas y las posibles acciones a realizar con cada una de ellas. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/consulta-trafico.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Al inicio de la grilla se puede verificar si la clase de tráfico creada está activa o no.
		Se puede activar o desactivar una clase moviendo el switch que se muestra en la siguiente imágen.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/clase-activa.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Esta acción nos permite elegir cuantos items por página queremos ver en la grilla de consulta de clases de tráfico. Pueden ser 10, 25, 50 o 100 items por página.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/mostrar-items.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Si deseamos encontrar una clase de tráfico específica de todas las existentes podemos filtrar la búsqueda escribiendo información de la clase como se detalla en la siguiente imágen. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/buscar-items-clase.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Podemos eliminar o editar información de la clase de tráfico clickeando en los íconos correspondientes como muestra la siguiente imágen.</p>
		<div style="text-align:center;"><img class="marginAfterImage"  src="<?=base_url('public/images/ayuda/acciones-detalle.png')?>"></div>	
		<p class="textAyuda marginBeforeImage">Además se puede ver mas información de la clase, como la dirección ip y el prefijo, clickeando en el ícono de detalle.</p>
		<div style="text-align:center;"><img class="marginAfterImage"  src="<?=base_url('public/images/ayuda/detalle-popup.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">También podemos acceder a la pantalla de creación de una nueva clase de tráfico clickeando en el boton "Nueva Clase de Tráfico". Esta acción se podrá realizar en el caso que el usuario logueado en el sistema tenga rol de Administrador, en caso de tener rol Monitor no visualizará ésta opcion.</p>
		<div style="text-align:center;"><img src="<?=base_url('public/images/ayuda/boton-nueva-clase.png')?>"></div>
	</div>
</div>
<div  id="politicas" class="heightMenu"></div>
<div  class="col_full" style="margin-bottom:0px;">
	<div class="fancy-title title-block">
		<h3 style="font-size:33px;">Politicas</h3>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Nueva Política de Tráfico</h3>
		</div>		
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Para la creación de una nueva política, es necesario completar el NOMBRE, la DESCRIPCIÓN, el tipo de política (bloqueo, limitación o priorización), el ORIGEN, el DESTINO y los días y horarios que queremos que éste nueva política se aplique. A continuación vamos a explicar con mas detalle cada una de las secciones nombradas. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/nueva-regla.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">En esta sección, debemos completar el origen y el destino al cual queremos que se aplique la política que estamos creando. El origen puede ser un equipo de nuestra red o una clase de tráfico o la combinación de ambas. El destino puede ser una dirección IP o una clase de tráfico o la combinación de ambas. Vale aclarar que al posibilitar que se complete la dirección IP que queremos aplicar nuestra política, no es necesario la creación de una clase de tráfico previamente. Clickeando en el ícono + de color verde, se puede agregar más de un origen y más de un destino.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/origen-destino-politicas.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Si clickeamos en el boton dentro del campo MAC, podemos observar que se despliega las direcciones MAC de los equipos conectados a la red.  </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/mac-popup.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Si clickeamos en el boton dentro del campo IP, podemos observar que se despliega las direcciones IP de los equipos conectados a la red.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/ip-popup.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage"> Tenemos 3 tipos de política que podemos aplicar a la hora de la creación. Podemos BLOQUEAR el acceso de manera total a los orígenes y destinos completados anteriormente, LIMITAR el acceso a los origenes y destinos completados anteriormente, especificando el ancho tope de subida y bajada; o podemos priorizar la política que estamos creando, especificando si tiene prioridad ALTA, MEDIA o BAJA, esto nos permite priozar el tráfico de determinados sitios o equipos de nuestra red por sobre otros. </p>
		<div style="text-align:center;"><img src="<?=base_url('public/images/ayuda/tipo-limitacion.png')?>"></div>
	</div>
	<div>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/tipo-priorizacion.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Aquí podemos elegir los días y la franja horaria que queremos que se aplique la política que estamos creando. Clickeando en el ícono + de color verde, podemos agregar mas días y franjas horarias. Esto nos sirve por si queremos que la política impacte en distintas franjas horarias en días diferentes. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/dias-aplicacion-politicas.png')?>"></div>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Consulta Políticas de Tráfico</h3>
		</div>		
	</div>
		<div>
		<p class="textAyuda marginBeforeImage"> Aquí podremos observar la información de las distintas políticas creadas y las posibles acciones a realizar con cada uno de ellas.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/consulta-politicas.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage"> Al inicio de la grilla se puede verificar si la política creada está activa o no.
		Se puede activar o desactivar una política moviendo el switch que se muestra en la siguiente imágen. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/clase-activa.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Esta acción nos permite elegir cuantos items por página queremos ver en la grilla de consulta de políticas. Pueden ser 10, 25, 50 o 100 items por página.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/mostrar-items.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Si deseamos encontrar una política específica de todas las existentes podemos filtrar la búsqueda escribiendo información de la política como se detalla en la siguiente imágen.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/buscar-items-politicas.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Podemos eliminar o editar información de la política clickeando en los íconos correspondientes como muestra la siguiente imágen.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/acciones.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">También podemos acceder a la pantalla de creación de una nueva política clickeando en el boton "Nueva Política". Esta acción se podrá realizar en el caso que el usuario logueado en el sistema tenga rol de Administrador, en caso de tener rol Monitor no visualizará ésta opcion.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/boton-nueva-politica.png')?>"></div>
	</div>
</div>
<div  id="usuarios" class="heightMenu"></div>
<div  class="col_full" style="margin-bottom:0px;">
	<div class="fancy-title title-block">
		<h3 style="font-size:33px;">Usuarios</h3>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Nuevo Usuario</h3>
		</div>		
	</div>
	<div >
		<p class="textAyuda marginBeforeImage">Para la creación de un nuevo usuario, es necesario completar los siguientes campos requeridos: NOMBRE, APELLIDO, MAIL (el sistema validará que sea un formato válido), NOMBRE DE USUARIO, CONTRASEÑA y ROL (puede ser rol Administrador, el cual puede realizar todas las acciones del sistema, o rol Monitor, que tiene ciertas funcionalidades restringidas). Se deben completar todos los campos sino el usuario no podrá ser creado.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/nuevo-usuario.png')?>"></div>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Consulta de Usuarios</h3>
		</div>		
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Aquí podremos observar la información de los distintos usuarios creados y las posibles acciones a realizar con cada uno de ellos.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/consulta-usuario.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Esta acción nos permite elegir cuantos items por página queremos ver en la grilla de consulta de usuario. Pueden ser 10, 25, 50 o 100 items por página.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/mostrar-items.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Si deseamos encontrar un usuario específico de todos los existentes podemos filtrar la búsqueda escribiendo información del usuario como se detalla en la siguiente imágen. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/buscar-items.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Podemos eliminar o editar información del usuario clickeando en los íconos correspondientes como muestra la siguiente imágen. Estas acciones se podrán realizar en el caso que el usuario logueado en el sistema tenga rol de Administrador, en caso de tener rol Monitor no visualizará éstas opciones.</p>
		<div style="text-align:center;"><img class="marginAfterImage"  src="<?=base_url('public/images/ayuda/acciones.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">También podemos acceder a la pantalla de creación de un nuevo usuario clickeando en el boton "Nuevo Usuario". Esta acción se podrá realizar en el caso que el usuario logueado en el sistema tenga rol de Administrador, en caso de tener rol Monitor no visualizará ésta opcion. </p>
		<div style="text-align:center;"><img src="<?=base_url('public/images/ayuda/boton-nuevo-usuario.png')?>"></div>
	</div>
</div>
<div  id="sistema" class="heightMenu"></div>
<div  class="col_full" style="margin-bottom:0px;">
	<div class="fancy-title title-block">
		<h3 style="font-size:33px;">Sistema</h3>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Información del Sistema</h3>
		</div>		
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Como podemos observar en la siguiente imágen, aquí se especifica mediante gráficos en tiempo real, como va evolucionando el uso de la cpu, la temperatura de la misma, el uso de la memoria ram como también del disco rígido. Esta información se actualiza cada 3 segundos para obtener los nuevos valores y brindar la información lo mas precisa posible. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/informacion-sistema.png')?>"></div>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Configuración del Sistema</h3>
		</div>		
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Para modificar la configuración del sistema, es necesario completar los siguientes campos requeridos: IP DE ADMINISTRACIÓN, MÁSCARA DE SUBRED, PUERTA DE ENLACE, DNS1, ANCHO DE BANDA DE BAJADA y ANCHO DE BANDA DE SUBIDA. El campo DNS2 es opcional. Para los campos IP, MÁSCARA, PUERTA DE ENLACE. DNS1 y DNS2 se deberá ingresar un formato válido ip ya que el sistema realizará ésta validación. Al clickear "aceptar" se efectuarán los cambios y se actualizará la configuración del sistema.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/configuracion-sistema.png')?>"></div>
	</div>
</div>

<!-- JavaScripts
============================================= -->
<script type="text/javascript">	
	$(document).ready(function() {

		$('#tituloPantalla').text('Ayuda');
        

	});
</script>

<?php include('estructura/footer.php'); ?>