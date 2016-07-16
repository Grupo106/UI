<!DOCTYPE html>
<html dir="ltr" lang="en-US">
<head>

	<meta http-equiv="content-type" content="text/html; charset=utf-8" />
	<meta name="PowerSoft" content="SemiColonWeb" />

	<!-- Stylesheets
	============================================= -->
	<link href="http://fonts.googleapis.com/css?family=Lato:300,400,400italic,600,700|Raleway:300,400,500,600,700|Crete+Round:400italic" rel="stylesheet" type="text/css" />
	<link rel="stylesheet" href="public/css/bootstrap.css" type="text/css" />
	<link rel="stylesheet" href="public/css/style.css" type="text/css" />
	<link rel="stylesheet" href="public/css/dark.css" type="text/css" />
	<link rel="stylesheet" href="public/css/font-icons.css" type="text/css" />
	<link rel="stylesheet" href="public/css/animate.css" type="text/css" />
	<link rel="stylesheet" href="public/css/magnific-popup.css" type="text/css" />

	<link rel="stylesheet" href="public/css/responsive.css" type="text/css" />
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!--[if lt IE 9]>
		<script src="http://css3-mediaqueries-js.googlecode.com/svn/trunk/css3-mediaqueries.js"></script>
	<![endif]-->

	<!-- Document Title
	============================================= -->
	<title>NetCop - Login</title>

</head>

<body class="stretched">

	<!-- Document Wrapper
	============================================= -->
	<div id="wrapper" class="clearfix">

		<!-- Content
		============================================= -->
		<section id="content">

			<div class="content-wrap nopadding">

				<div class="section nopadding nomargin" style="width: 100%; height: 100%; position: absolute; left: 0; top: 0; background: #444;"></div>

				<div class="section nobg full-screen nopadding nomargin">
					<div class="container vertical-middle divcenter clearfix">

						<div class="row center">
							<a href="index.html"><img src="public/images/logo-dark.png" alt="NetCop Logo"></a>
						</div>

						<div class="panel panel-default divcenter noradius noborder" style="max-width: 400px;">
							<div class="panel-body" style="padding: 40px;">
								<form id="login-form" name="login-form" class="nobottommargin" action="index.php/login/autenticar" method="post">
									<h3>Ingresar a mi cuenta</h3>

									<div class="col_full">
										<label for="login-usuario">Usuario:</label>
										<input type="text" id="login-usuario" name="login-usuario" value="" class="form-control not-dark" />
									</div>

									<div class="col_full">
										<label for="login-password">Contraseña:</label>
										<input type="password" id="login-password" name="login-password" value="" class="form-control not-dark" />
									</div>

									<div class="col_full nobottommargin">
										<button class="button button-3d button-black nomargin" id="login-form-submit" name="login-form-submit" value="login">Ingresar</button>
									</div>
								</form>
							</div>
						</div>

						<div class="row center dark"><small>&copy; 2016 PowerSoft. Todos los Derechos Reservados.</small></div>

					</div>
				</div>

			</div>

		</section><!-- #content end -->

	</div><!-- #wrapper end -->

	<!-- Go To Top
	============================================= -->
	<div id="gotoTop" class="icon-angle-up"></div>

	<!-- External JavaScripts
	============================================= -->
	<script type="text/javascript" src="public/js/jquery.js"></script>
	<script type="text/javascript" src="public/js/plugins.js"></script>

	<!-- Footer Scripts
	============================================= -->
	<script type="text/javascript" src="public/js/functions.js"></script>

</body>
</html>