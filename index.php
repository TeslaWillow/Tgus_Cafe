<?php
	session_destroy();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/styles.css">
	<link rel="shortcut icon" href="Img/favicon.ico" type="image/x-icon">
	<link rel="icon" href="Img/favicon.ico" type="image/x-icon">
	<title>Tgus Café</title>
</head>
<body>
  <header>
		<div class="container">
			<!-- Barra de navegacion -->
			<nav class="navbar navbar-expand-lg menu">
				<div class="collapse navbar-collapse d-flex flex-row-reverse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item active">
							<a class="nav-link" href="#">Inicio <span class="sr-only">(current)</span></a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#jumbotron_1">Acerca de</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#jumbo_relatos">Relatos</a>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#jumbo_contacto">Contacto</a>
						</li>
					</ul>
				</div>
			</nav>
			<div class="row d-flex align-items-center mt-5 welcome">
                <!--  logo  -->
			    <div class="col-md-4 logo">
			        <img src="Img/Tgus%20ico%20render%20white.png" alt="Logo Tgus Cafe">
			    </div>
			    <!--  Texto de Bienvenida  -->
			    <div class="col-md-8 w_text">
			        <h1 class="">Un deleite capitalino</h1>
			        <h2 class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Libero.</h2>
			    </div>
			</div>
		</div>
  </header>
	<main>
		<!-- Acerca de - Menú -->
		<div class="jumbotron jumbotron-fluid" id="jumbotron_1">
			<div class="container">
				<!-- Acerca de  -->
				<div class="row">
					<div class="col-md-8">
						<img src="Img/bg_acerca.jpg" alt="Local Tgus Café" id="thumb_1_about">
					</div>
				</div>
				<div class="row d-flex flex-row-reverse">
					<div class="col-md-5" id="card_1">
						<article class="card">
							<h3 id="Acerca_de">Acerca de</h3>
							<div class="border"></div>
							<p>
								Lorem ipsum dolor. Voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
							</p>
							<p>
								Adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
							</p>
						</article>
					</div>
				</div>
				<!-- Mision & Vision -->
				<div class="row d-flex flex-row-reverse">
					<div class="col-md-8">
						<img src="Img/MyV.jpg" alt="Local Tgus Café">
					</div>
				</div>
				<div class="row">
					<div class="col-md-5" id="card_2">
						<article class="card">
							<h3>Misión</h3>
							<div class="border"></div>
							<p>
								Quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
								fugiat nulla pariatur.
							</p>
							<h3>Visión</h3>
							<div class="border"></div>
							<p>
								Consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in
							</p>
						</article>
					</div>
				</div>
				<!-- Menú -->
				<div id="menu_out">
					<h3 class="d-flex justify-content-center">Menú</h3>
					<section id="menu_in">
						<div class="row mt-4">
							<div class="col-md-6">
								<h4 class="d-flex justify-content-center" id="cafes">Cafés</h4>
								<ul class="mt-3">
									<li class="d-flex justify-content-between mt-4"><span class="product">Expreso</span><span class="price">15 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Latte</span><span class="price">20 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Doble</span><span class="price">30 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Moccha</span><span class="price">50 L.</span></li>
								</ul>
								<h4 class="d-flex justify-content-center" id="postres">Postres</h4>
								<ul class="mt-3">
									<li class="d-flex justify-content-between mt-4"><span class="product">1/8 de Tarta</span><span class="price">55 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Muffin</span><span class="price">60 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Chilena</span><span class="price">15 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Brazo Gitano</span><span class="price">140 L.</span></li>
								</ul>
							</div>
							<div class="col-md-6">
								<h4 class="d-flex justify-content-center" id="bebidas">Bebidas</h4>
								<ul class="mt-3">
									<li class="d-flex justify-content-between mt-4"><span class="product">Agua</span><span class="price">15 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Refresco</span><span class="price">20 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Natural</span><span class="price">25 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Malteada</span><span class="price">35 L.</span></li>
								</ul>
								<h4 class="d-flex justify-content-center" id="catrachos">Catrachos</h4>
								<ul class="mt-3">
									<li class="d-flex justify-content-between mt-4"><span class="product">Chilaquiles</span><span class="price">55 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Catrachas</span><span class="price">20 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Baleadas Tgus</span><span class="price">15 L.</span></li>
									<li class="d-flex justify-content-between mt-4"><span class="product">Mar & Tierra</span><span class="price">120 L.</span></li>
								</ul>
							</div>
						</div>
					</section>
				</div>

			</div>
		</div>
		<!-- Relatos -->
		<div class="jumbotron jumbotron-fluid" id="jumbo_relatos">
			<div class="container">
				<section id="Relatos">
						<h3 class="d-flex justify-content-center">Relatos</h3>
						<div class="row d-flex align-items-center">
							<div class="col-md-2">
								<img src="Img/Profile.png" alt="Thumb of Mr. Wow">
							</div>
							<div class="col-md-10">
								<blockquote cite="">
									“Fusce at rhoncus dolor.
									Morbi sed erat at risus semper ornare non quis velit.
									Fusce sed nisi faucibus, dictum ante et, dignissim nibh. YEAH!”
									<cite>Mr. Wow Galaxy</cite>
								</blockquote>
							</div>
						</div>
					</section>
			</div>
		</div>
		<!-- Contacto -->
		<div class="jumbotron jumbotron-fluid" id="jumbo_contacto">
			<div class="container">
				<div class="row d-flex flex-row-reverse">
					<div class="col-md-4">
						<h3 class="d-flex justify-content-center mb-4">Contacto</h3>
						<h5><strong>Ubicación</strong></h5>
						<p>
							Tegus Café, frente a la UNAH.
							Contiguo a Bigos en el bulv. suyapa
						</p>
						<h5><strong>Tel.</strong></h5>
						<p>
							2220-0000
						</p>
						<h5><strong>Correo</strong></h5>
						<p>
							TgusCafe@yahoo.com
						</p>
						<h5><strong>Horarios</strong></h5>
						<p>
							Lunes - Jueves / 6:00 - 8:00
							Viernes - Sabado/ 6:00 - 10:00
							Domingo/ 11:00 - 6:00
						</p>
					</div>
					<div class="col-md-8">
						<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d967.477089510796!2d-87.1648645118929!3d14.082586800179671!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8f6fbd4b2697cead%3A0x5b3726b7b378cd04!2sTgus+Caf%C3%A9!5e0!3m2!1ses-419!2shn!4v1541048166742" width="600" height="450" frameborder="0" style="border:0" allowfullscreen></iframe>
					</div>
				</div>
			</div>
		</div>
	</main>
	<footer>
	</footer>

	<script type="text/javascript" src="Scripts/bootstrap.min.js"></script>
</body>
</html>
