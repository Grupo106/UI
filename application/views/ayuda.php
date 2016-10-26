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
		<p class="textAyuda marginBeforeImage">En la pantalla de inicio contamos con la información de las últimas acciones realizadas en el sistema y qué usuario las efectuó. Por ejemplo, logueo al sistema, desconexión, creación de clases de tráfico, modificación de políticas, eliminación de usuarios, etc.</p>
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
		<p class="textAyuda marginBeforeImage">En este módulo del sistema se encuentra toda la información relacionada con el uso de la red en tiempo real, ya sea tráfico de bajada o de subida. Para visualizar la bajada, contamos con dos gráficos que nos representan el tráfico de la red: Gráfico de líneas, con el consumo total sin clasificarse, y gráfico de tortas conteniendo la información clasificada de acuerdo a las clases de tráfico que hemos creado previamente. Ambos gráficos se actualizan constantemente para brindar información lo mas precisa posible.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-actual-bajada.png')?>"></div>
	</div>
	<div >
		<p class="textAyuda marginBeforeImage">De forma similar podemos visualizar el tráfico de subida de la red. Tanto en el consumo clasificado como en el consumo total.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-actual-subida.png')?>"></div>
	</div>
	<div >
		<p class="textAyuda marginBeforeImage">Clickeando en "Ver Detalle" o posicionándose con el puntero del mouse por encima del gráfico de consumo clasificado podremos acceder a información extra sobre las clases de tráfico.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-actual-tooltip.png')?>"></div>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Monitoreo histórico</h3>
		</div>		
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Desde aquí podremos acceder a todo el consumo histórico total y consumo histórico clasificado de la red, tanto como para el tráfico de bajada como para el tráfico de subida.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-periodo-busqueda.png')?>"></div>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Monitoreo por Período</h3>
		</div>		
	</div>
	<div >
		<p class="textAyuda marginBeforeImage">Podemos también acceder al consumo de la red en un periodo determinado.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/monitoreo-periodo-busqueda.png')?>"></div>
	</div>
	<div >
		<p class="textAyuda marginBeforeImage">Observamos entonces el consumo total y clasificado de la red, en el tráfico de bajada y de subida para el periodo de tiempo elegido.</p>
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
		<p class="textAyuda marginBeforeImage">Para la creación de una nueva clase de tráfico, es necesario completar el NOMBRE, la DESCRIPCIÓN y la dirección ip o puerto en internet, o la dirección ip o puerto de la red local (LAN). Puede agregarse más de una dirección y puerto tanto en la sección de internet como en la sección LAN. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/clase-trafico.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Para especificar la lista de redes y lista de puertos en internet que queremos clasificar: Clickeando en el icóno + de color verde, puede agregarse más de una direccion ip con el prefijo correspondiente, donde la direccion es el identificador de red y el prefijo es la cantidad de bits que contiene la máscara de subred. Si no se ingresa un prefijo, se entiende que se trata de una dirección de host. También podemos agregar más de un puerto con el protocolo asociado, donde el número es el identificador del puerto y el protocolo puede ser 'tcp' o 'udp'. Si no se especifica protocolo, se asume que el puerto puede pertenecer a cualquiera de ellos.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/clase-trafico-destino.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Para especificar la lista de redes y lista de puertos de la red local que queremos clasificar. Clickeando en el icóno + de color verde, puede agregarse más de una direccion ip con el prefijo correspondiente, donde la direccion es el identificador de red y el prefijo es la cantidad de bits que contiene la máscara de subred. Si no se ingresa un prefijo, se entiende que se trata de una dirección de host. También podemos agregar más de un puerto con el protocolo asociado, donde el número es el identificador del puerto y el protocolo puede ser 'tcp' o 'udp'. Si no se especifica protocolo, se asume que el puerto puede pertenecer a cualquiera de ellos.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/clase-trafico-origen.png')?>"></div>
	</div>
	<div class="col_full">
		<div class="fancy-title title-center title-border-color">
			<h3>Consulta Clases de Tráfico</h3>
		</div>		
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Podremos observar la información de las distintas clases de tráfico creadas y las posibles acciones a realizar con cada una de ellas. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/consulta-trafico.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Al inicio de la grilla se verifica si la clase de tráfico creada está activa o no.
		Se puede activar o desactivar una clase moviendo el switch que se muestra en la siguiente imágen. Esta opción solo estará disponible para usuarios administradores.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/clase-activa.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">También podemos determinar la cantidad de items por página que queremos ver en la grilla de consulta de clases de tráfico. Pueden ser 10, 25, 50 o 100 items por página.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/mostrar-items.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Si deseamos encontrar una clase de tráfico específica entre todas las existentes podemos filtrar la búsqueda escribiendo información de la clase como se detalla en la siguiente imágen. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/buscar-items-clase.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Podemos eliminar o editar información de la clase de tráfico clickeando en los íconos correspondientes como muestra la siguiente imágen. Estas opciones solo estarán disponibles para usuarios administradores.</p>
		<div style="text-align:center;"><img class="marginAfterImage"  src="<?=base_url('public/images/ayuda/acciones-detalle.png')?>"></div>	
		<p class="textAyuda marginBeforeImage">Además podremos acceder a información extra de la clase seleccionada, como la dirección ip y el prefijo, clickeando en el ícono de "ver detalle".</p>
		<div style="text-align:center;"><img class="marginAfterImage"  src="<?=base_url('public/images/ayuda/detalle-popup.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Podremos acceder a la pantalla de creación de una nueva clase de tráfico clickeando en el boton "Nueva Clase de Tráfico". Esta acción se podrá realizar en el caso que el usuario logueado en el sistema tenga rol de Administrador, en caso de tener rol Monitor no visualizará ésta opcion.</p>
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
		<p class="textAyuda marginBeforeImage">Para la creación de una nueva política, es necesario completar el NOMBRE, la DESCRIPCIÓN, el tipo de política (bloqueo, limitación o priorización), el ORIGEN, el DESTINO y los días y horarios que queremos que éste nueva política se aplique.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/nueva-regla.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage"> Contamos con tres tipos de política que podemos aplicar a la hora de la creación. Podemos BLOQUEAR el acceso de manera total a los orígenes y destinos que serán completados luego, LIMITAR el acceso a los origenes y destinos especificando el ancho tope de subida y bajada; o podemos priorizar la política que estamos creando, especificando si tiene prioridad ALTA, MEDIA o BAJA. Esto nos permitirá priorizar el tráfico de determinados sitios o equipos de nuestra red por sobre otros. </p>
		<div style="text-align:center;"><img src="<?=base_url('public/images/ayuda/tipo-limitacion.png')?>"></div>
	</div>
	<div>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/tipo-priorizacion.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">En esta sección, debemos completar el origen y el destino al cual queremos que se aplique la política que estamos creando. El origen puede ser un equipo de nuestra red, una clase de tráfico o la combinación de ambas. El destino deberá ser una una clase de tráfico previamente creada. Clickeando en el ícono + de color verde, se puede agregar más de un origen y más de un destino.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/origen-destino-politicas1.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Si clickeamos en el boton dentro del campo MAC, podemos observar que se despliega las direcciones MAC de los equipos conectados a la red.  </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/mac-popup.png')?>"></div>
	</div>
	<!--
	<div>
		<p class="textAyuda marginBeforeImage">Si clickeamos en el boton dentro del campo IP, podemos observar que se despliega las direcciones IP de los equipos conectados a la red.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/ip-popup.png')?>"></div>
	</div>
	-->


	<div>
		<p class="textAyuda marginBeforeImage">Podemos especificar los días y la franja horaria en la que queremos que se aplique la política que estamos creando. Clickeando en el ícono + de color verde, podemos agregar mas días y franjas horarias. De esta manera podremos lograr que la política impacte en distintas franjas horarias y/o en días diferentes. </p>
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
		<p class="textAyuda marginBeforeImage"> Al inicio de la grilla se verifica si la política creada está activa o no.
		Se puede activar o desactivar una política moviendo el switch que se muestra en la siguiente imágen. Esta opción solo estará disponible para usuarios administradores. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/clase-activa.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">También podemos determinar la cantidad de items por página que queremos ver en la grilla de consulta de políticas. Pueden ser 10, 25, 50 o 100 items por página.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/mostrar-items.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Si deseamos encontrar una política específica entre todas las existentes podemos filtrar la búsqueda escribiendo información de la política como se detalla en la siguiente imágen.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/buscar-items-politicas.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Podemos eliminar o editar información de la política clickeando en los íconos correspondientes como muestra la siguiente imágen. Estas opciones solo estarán disponibles para usuarios administradores. </p>
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
		<p class="textAyuda marginBeforeImage">Podremos observar la información de los distintos usuarios creados y las posibles acciones a realizar con cada uno de ellos.</p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/consulta-usuario.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Podemos determinar la cantidad de items por página queremos ver en la grilla de consulta de usuario. Pueden ser 10, 25, 50 o 100 items por página.</p>
		<div style="text-align:center;"><img  class="marginAfterImage" src="<?=base_url('public/images/ayuda/mostrar-items.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Si deseamos encontrar un usuario específico entre todos los existentes podemos filtrar la búsqueda escribiendo información del usuario como se detalla en la siguiente imágen. </p>
		<div style="text-align:center;"><img class="marginAfterImage" src="<?=base_url('public/images/ayuda/buscar-items.png')?>"></div>
	</div>
	<div>
		<p class="textAyuda marginBeforeImage">Podemos eliminar o editar información del usuario clickeando en los íconos correspondientes como muestra la siguiente imágen. Estas opciones solo estarán disponibles para usuarios administradores.</p>
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
		<p class="textAyuda marginBeforeImage">Se especifica mediante gráficos en tiempo real la evolución del uso de la cpu, la temperatura de la misma, el uso de la memoria ram y del disco rígido. Esta información se actualiza constantemente para brindar la mayor precisión posible. </p>
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