<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/passageAdmin.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
</head>

<body>
	<section id="Passage">
		<div class="container">
			<div class="col d-flex justify-content-center">
				<div class="content_passage">
					<div class="logo_doctopharme">
						<img src="<?php echo base_url('assets/image/logo.png'); ?>" alt="">
					</div>
					<div class="titre_passage">
						<h2 class="text-center">Veuillez saisir votre clé:</h2>
					</div>
					<?php if (isset($_SESSION['error'])) { ?>
						<?php echo $_SESSION['error']; ?>
					<?php } ?>
					<form action="<?php echo base_url() . 'admin/PassageAdmin_controlleur/validation' ?>" method="post">
						<div class="bloc_champ_text">
							<input type="text" name="cle" class="form-control" placeholder="Votre clé ..." required>
							<button type="submit" class="btn btn-sm">valider</button>
						</div>

					</form>
					<div class="d-flex justify-content-center mt-3">
						<a href="<?php echo site_url('admin/PassageAdmin_controlleur/accueil'); ?>" class="btn-accueil mt-2">Accueil</a>
					</div>
				</div>
			</div>
		</div>
	</section>
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
