<!DOCTYPE HTML>
<!--
	Full Motion by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
	<head>
		<title>Concesionario Multimarca</title>
		<meta charset="utf-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1" />
		<link rel="stylesheet" href="css/main.css" />
	</head>
	<body id="top">

			<!-- Banner -->
			<!--
				To use a video as your background, set data-video to the name of your video without
				its extension (eg. images/banner). Your video must be available in both .mp4 and .webm
				formats to work correctly.
			-->
				<section id="banner" data-video="images/banner">
					<div class="inner">
						<header>
							<h1>Concesionario Multimarca</h1>
<p>Somos un Concesionario Multimarca Líder en su sector.</p><p>Calidad y Precio garantizado</p>
							
						</header>
						<a href="#main" class="more">Learn More</a>
					</div>
				</section>

			<!-- Main -->
				<div id="main">
					<div class="inner">

					<!-- Boxes -->

						<div class="thumbnails">
                            <?php
                            include "Client/clientSoap.php";

                            foreach ($marcas as $marca) {
                            ?>
							<div class="box">
								<a href="<?= $marca["url"] ?>" class="image fit" title="ver video"><img src="img/<?= strtolower($marca["marca"]) ?>.png" alt="logo <?= $marca["marca"] ?>" /></a>
								<div class="inner">
                                   <h3><a href="modelos.php?marca=<?= $marca["marca"] ?>" data-poptrox="ajax,600x400">Modelos <?= $marca["marca"] ?></a></h3>
									<a href="<?= $marca["url"] ?>" class="button style2 fit" data-poptrox="youtube,800x400">Ver video <?= $marca["marca"] ?></a>
								</div>
							</div>
                            <?php
                            }
                            ?>
						</div>
					</div>
				</div>

			<!-- Footer -->
				<footer id="footer">
					<div class="inner">
						<h2>Sigue nuestras redes sociales</h2>


						<ul class="icons">
							<li><a href="#" style="color: white"><span class="label">Twitter</span></a></li>
							<li><a href="#" style="color: white"><span class="label">Facebook</span></a></li>
							<li><a href="#" style="color: white"><span class="label">Instagram</span></a></li>
							<li><a href="#" style="color: white"><span class="label">Email</span></a></li>
						</ul>
					</div>
				</footer>

		<!-- Scripts -->
			<script src="js/jquery.min.js"></script>
			<script src="js/jquery.scrolly.min.js"></script>
			<script src="js/jquery.poptrox.min.js"></script>
			<script src="js/skel.min.js"></script>
			<script src="js/util.js"></script>
			<script src="js/main.js"></script>


	</body>
</html>
