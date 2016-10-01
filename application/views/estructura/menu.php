<!-- Header
============================================= -->
<header id="header" class="full-header">

	<div id="header-wrap">

		<div class="container clearfix">

			<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

			<!-- Logo
			============================================= -->
			<div id="logo">
				<a href="<?=site_url('')?>" class="standard-logo" data-dark-logo="public/images/logo-horizontal.png"><img src="<?=base_url('public/images/logo-horizontal.png')?>" alt="NetCop Logo"></a>
			</div><!-- #logo end -->

			<!-- Primary Navigation
			============================================= -->
			<nav id="primary-menu">
                <?php 
                  /* Si no se define una seccion, se establece un valor por
                  defecto */
                  if(!isset($section)) $section = '';
                ?>
				<ul>
					<li class="<?php if($section == 'inicio') echo 'current'; ?>"><a href="<?=site_url('')?>"><div>Inicio</div></a></li>
					<li class="<?php if($section == 'monitoreo') echo 'current'; ?>"><a href="#"><div>Monitoreo</div></a>
						<ul>
							<li><a href="<?=site_url('monitoreo/tiempo_real')?>"><div><i class="icon-bar-chart"></i>En tiempo real</div></a></li>
							<li><a href="<?=site_url('monitoreo/historico')?>"><div><i class="icon-bar-chart"></i>Histórico</div></a></li>
							<li><a href="<?=site_url('monitoreo/por_periodo')?>"><div><i class="icon-bar-chart"></i>Por período</div></a></li>
						</ul>
					</li>
					<li  class="<?php if($section == 'politicas') echo 'current'; ?>"><a href="#"><div>Políticas</div></a>
						<ul>
							<li><a href="<?=site_url('politica/consulta')?>"><div><i class="icon-tasks"></i>Consulta de políticas</div></a></li>
							<?php if(strcmp($_SESSION['SISENER_SESSION']['rolUsuario'], "Administrador") == 0) { ?>
							<li><a href="<?=site_url('politica/nueva')?>"><div><i class="icon-plus-sign2"></i>Nueva política</div></a></li>
							 <?php } ?>
						</ul>
					</li>
					<li class="<?php if($section == 'clases_trafico') echo 'current'; ?>"><a href="#"><div>Clases de tráfico</div></a>
						<ul>
							<li><a href="<?=site_url('clasetrafico/consulta')?>"><div><i class="icon-tasks"></i>Consulta de clases de tráfico</div></a></li>
							<?php if(strcmp($_SESSION['SISENER_SESSION']['rolUsuario'], "Administrador") == 0) { ?>
							<li><a href="<?=site_url('clasetrafico/nueva')?>"><div><i class="icon-plus-sign2"></i>Nueva clase de tráfico</div></a></li>
							 <?php } ?>
						</ul>
					</li>
					<li class="<?php if($section == 'usuarios') echo 'current'; ?>"><a href="#"><div>Usuarios</div></a>
						<ul>
							<li><a href="<?=site_url('usuario/consulta')?>"><div><i class="icon-tasks"></i>Consulta de usuarios</div></a></li>
							<?php if(strcmp($_SESSION['SISENER_SESSION']['rolUsuario'], "Administrador") == 0) { ?>
							<li><a href="<?=site_url('usuario/nuevo')?>"><div><i class="icon-plus-sign2"></i>Nuevo usuario</div></a></li> <?php } ?>
							<!--<li><a href="<?=site_url('desloguearse')?>"><div><i class="icon-wrench"></i>Desloguearse</div></a></li>-->
						</ul>
					</li>
					<li class="<?php if($section == 'sistema') echo 'current'; ?>"><a href="#"><div>Sistema</div></a>
						<ul>

							<li><a href="<?=site_url('sistema/informacion')?>"><div><i class="icon-info"></i>Información</div></a></li>
							<?php if(strcmp($_SESSION['SISENER_SESSION']['rolUsuario'], "Administrador") == 0) { ?>
							<li><a href="<?=site_url('sistema/configuracion')?>"><div><i class="icon-wrench"></i>Configuración</div></a></li>
							<?php } ?>
						</ul>
					</li>
					<li class="<?php if($section == 'ayuda') echo 'current'; ?>"><a href="<?=site_url('ayuda/ayuda')?>"><div>Ayuda</div></a></li>
				</ul>

				<!-- Top Search
				============================================= -->
				<div id="top-search">

					<a href="<?=site_url('desloguearse')?>" id="top-off-trigger"><i class="icon-off"></i><i class="icon-line-cross"></i> </a>
					<!--<form action="search.html" method="get">
						<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
					</form>-->
				</div><!-- #top-search end -->

			</nav><!-- #primary-menu end -->

		</div>

	</div>

</header><!-- #header end -->

<!-- Page Title
============================================= -->
<section id="page-title" class="page-title-center">

	<div class="container clearfix">
		<h1 id="tituloPantalla"></h1>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">
