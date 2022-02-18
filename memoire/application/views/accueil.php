<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/accueil.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
</head>

<body>
	<!-- ======= Header ======= -->

	<header>
		<div class="container">
			<nav class="navbar navbar-expand-lg">
				<div class="container">
					<a class="navbar-brand" href="#">
						<img src="<?php echo base_url('assets/image/logo.png'); ?>" width="60px" alt="image" />

					</a>
					<div class="titre">
						<h4>DOCTOPHARME</h4>
					</div>
					<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
						<span class="navbar-toggler-icon">
							<i class="fa fa-bars"></i>
						</span>
					</button>
					<div class="collapse navbar-collapse" id="navbarSupportedContent">
						<ul class="navbar-nav ml-auto">
							<li class="nav-item">
								<a class="nav-link" href="<?php echo site_url('admin/PassageAdmin_controlleur/passageAdmin'); ?>">Administrations</a>
							</li>
						</ul>
					</div>
				</div>
			</nav>
		</div>
	</header>




	<!-- ======= Fin  Header ======= -->

	<!-- ======= Home ======= -->
	<section id="home">
		<div class="col-12 col-sm-12 col-md-12 col-lg-12">
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 text-center">
					<h2 class="text-center mt-5 animated bounceInDown" style="animation-delay: 0.5s">
						Bienvenue dans <span class="titre">DOCTOPHARME</span>
					</h2>
					<img src="<?php echo base_url('assets/image/logo.png'); ?>" class="text-center mt-3 animated bounceInLeft" style="animation-delay: 1s" alt="image/logo.png" width="220px" height="200px" />
					<p class="animated rotateIn" style="animation-delay: 1.5s">
						DOCTOPHARME est a votre disposition,vous pouvez consulter,voir des
						pharmacies,acheter des médicaments,voir des cabinets et prendre
						des rendez vous.
					</p>
					<div class="lien">
						<a href="<?php echo site_url('patient/Login_controlleur/loginPatient'); ?>" class="animated fadeInDown" style="animation-delay: 2s">Patients</a>

					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-center">
					<div class="image-accueil">
						<img src="<?php echo base_url('assets/image/photo-accueil.png'); ?>" class="mt-4" alt="image/photo-accueil.png" />
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- =======Fin Home ======= -->
	<!-- ======= Footer ======= -->
	<footer>
		<h6 class="text-center">&copy; Copyright <strong>DOCTOPHARME</strong></h6>
	</footer>
	<!-- =======Fin Fin Footer ======= -->

	<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.slim.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/popper.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.4.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.2.1.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
</body>

</html>
