<!-- Header
============================================= -->
<header id="header" class="full-header">

	<div id="header-wrap">

		<div class="container clearfix">

			<div id="primary-menu-trigger"><i class="icon-reorder"></i></div>

			<!-- Logo
			============================================= -->
			<div id="logo">
				<a href="inicio.php" class="standard-logo" data-dark-logo="public/images/logo-dark.png"><img src="<?=base_url('public/images/logo.png')?>" alt="NetCop Logo"></a>
				<a href="inicio.php" class="retina-logo" data-dark-logo="public/images/logo-dark@2x.png"><img src="<?=base_url('public/images/logo@2x.png')?>" alt="NetCop Logo"></a>
			</div><!-- #logo end -->

			<!-- Primary Navigation
			============================================= -->
			<nav id="primary-menu">

				<ul>
					<li class="current"><a href="<?=site_url('')?>"><div>Inicio</div></a></li>
					<li><a href="#"><div>Monitoreo</div></a>
						<ul>
							<li><a href="<?=site_url('tiempo_real')?>"><div><i class="icon-bar-chart"></i>En tiempo real</div></a></li>
							<li><a href="<?=site_url('historico')?>"><div><i class="icon-bar-chart"></i>Histórico</div></a></li>
							<li><a href="<?=site_url('por_periodo')?>"><div><i class="icon-bar-chart"></i>Por período</div></a></li>
						</ul>
					</li>
					<li><a href="#"><div>Políticas</div></a>
						<ul>
							<li><a href="inicio.php"><div><i class="icon-tasks"></i>Consulta de políticas</div></a></li>
							<li><a href="inicio.php"><div><i class="icon-plus-sign2"></i>Nueva política</div></a></li>
						</ul>
					</li>
					<li><a href="#"><div>Clases de tráfico</div></a>
						<ul>
							<li><a href="inicio.php"><div><i class="icon-tasks"></i>Consulta de clases de tráfico</div></a></li>
							<li><a href="inicio.php"><div><i class="icon-plus-sign2"></i>Nueva clase de tráfico</div></a></li>
						</ul>
					</li>
					<li><a href="#"><div>Usuarios</div></a>
						<ul>
							<li><a href="inicio.php"><div><i class="icon-tasks"></i>Consulta de usuarios</div></a></li>
							<li><a href="inicio.php"><div><i class="icon-plus-sign2"></i>Nuevo usuario</div></a></li>
							<li><a href="<?=site_url('desloguearse')?>"><div><i class="icon-wrench"></i>Desloguearse</div></a></li>
						</ul>
					</li>
					<li><a href="#"><div>Sistema</div></a>
						<ul>
							<li><a href="inicio.php"><div><i class="icon-info"></i>Información</div></a></li>
							<li><a href="inicio.php"><div><i class="icon-wrench"></i>Configuración</div></a></li>
						</ul>
					</li>
					<li><a href="inicio.php"><div>Ayuda</div></a></li>
				</ul>

				<!-- Top Search
				============================================= -->
				<div id="top-search">
					<a href="#" id="top-search-trigger"><i class="icon-search3"></i><i class="icon-line-cross"></i></a>
					<form action="search.html" method="get">
						<input type="text" name="q" class="form-control" value="" placeholder="Type &amp; Hit Enter..">
					</form>
				</div><!-- #top-search end -->

			</nav><!-- #primary-menu end -->

		</div>

	</div>

</header><!-- #header end -->

<!-- Page Title
============================================= -->
<section id="page-title">

	<div class="container clearfix">
		<h1 id="tituloPantalla"></h1>
	</div>

</section><!-- #page-title end -->

<!-- Content
============================================= -->
<section id="content">

	<div class="content-wrap">

		<div class="container clearfix">
