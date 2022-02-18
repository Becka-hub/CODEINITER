<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/loginPatient.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
</head>

<body>
	<section id="loginPatient">
		<!-- ======= Login ======= -->
		<div class="container">
			<div class="titre">
				<h2 class="text-center">LOGIN & INSCRIPTION</h2>
				<?php if (isset($_SESSION['success'])) { ?>
					<?php echo $_SESSION['success']; ?>
				<?php } ?>
				<?php if (isset($_SESSION['error'])) { ?>
					<?php echo $_SESSION['error']; ?>
				<?php } ?>
			</div>
			<div class="row">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="login">
						<form action="<?php echo base_url().'patient/Login_controlleur/validation'?>" method="post" class="login-form text-center">
							<h3>Login</h3>
							<div class="form-group">
								<input type="email" name="mail" class="form-control form-control-lg" placeholder="Adresse mail..." required/>
							</div>
							<div class="form-group">
								<input type="password" name="mdp" class="form-control form-control-lg" placeholder="Mot de passe..." required/>
							</div>
							<input type="submit" class="btn-custom btn-block text-uppercase btn-lg" value="Connexion" />
							<p class="mt-3 font-weight-normal"> Vous n'avez pas de compte ?<a href="#"><strong class="ml-1" type="button" data-toggle="modal" data-target="#inscriptionPatient" data-whatever="@fat">Inscrivez vous ici!</strong></a>
							</p>
							<a href="<?php echo site_url('patient/Login_controlleur/accueil'); ?>" class="btn-accueil">Accueil</a>
						</form>
					</div>
				</div>
				<div class="col-12 col-sm-12 col-md-6 col-lg-6 d-flex justify-content-center">
					<div class="image-login">
						<img src="<?php echo base_url('assets/image/Login-patient.png'); ?>" class="mt-5" alt="" />
					</div>
				</div>
			</div>
		</div>
		<!-- =======Fin Login ======= -->

		<!-- ======= Modal inscription ======= -->

		<div class="modal fade" id="inscriptionPatient" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<img src="<?php echo base_url('assets/image/logo.png'); ?>" class="modal-image" width="40px" alt="">
						<h5 class="modal-title" id="exampleModalLabel">Inscriptions</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form action="<?php echo base_url() . 'patient/Login_controlleur/inscription'?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-nom" class="col-form-label">Nom :</label>
										<input type="text" name="nom" class="form-control form-control-sm"  placeholder="Entrer nom..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-prenom" class="col-form-label">Prénom :</label>
										<input type="text" name="prenom" class="form-control form-control-sm"  placeholder="Entrer prénom..." required/>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-age" class="col-form-label">Date de naissance :</label>
										<input type="date" name="datenaissance" class="form-control form-control-sm"  placeholder="Entrer date de naissance..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-adresse" class="col-form-label">Adresse :</label>
										<input type="text" name="adresse" class="form-control form-control-sm"  placeholder="Entrer adresse..." required/>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-sexe" class="col-form-label">Sexe :</label>
										<select name="sexe" class="custom-select custom-select-sm mt-2" required>
											<option selected>Selects sexes</option>
											<option value="Home">Home</option>
											<option value="Femme">Femme</option>
										</select>

									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-profession" class="col-form-label">Profession :</label>
										<input type="text" name="profession" class="form-control form-control-sm" " placeholder="Entrer profession..." required/>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-mail" class="col-form-label">Mail :</label>
										<input type="email" name="mail" class="form-control form-control-sm"  placeholder="Entrer mail..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-telephone" class="col-form-label">Téléphone :</label>
										<input type="text" name="telephone" class="form-control form-control-sm"  placeholder="Entrer téléphone..." required/>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-cin" class="col-form-label">N° CIN :</label>
										<input type="text" name="cin" class="form-control form-control-sm"  placeholder="Entrer n° cin..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-photo" class="col-form-label">Photo :</label>
										<input type="file" name="photo"  class="form-control form-control-sm" required/>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-province" class="col-form-label">Province :</label>
										<select name="province" class="custom-select custom-select-sm mt-2" id="province" required>
											<option selected>Selects provinces</option>
											<?php
											if ($province->num_rows() > 0) {
												foreach ($province->result() as $resultat) {
											?>
													<option value="<?php echo $resultat->IDPROVINCE; ?>">
														<?php echo $resultat->NOMPROVINCE; ?></option>

											<?php
												}
											}
											?>
										</select>

									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-region" class="col-form-label">Régions :</label>
										<select name="region" class="custom-select custom-select-sm mt-2" id="region" required>
											<option selected>Selects régions</option>
										</select>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-district" class="col-form-label">Districts :</label>
										<select name="district" class="custom-select custom-select-sm mt-2" id="district" required>
											<option selected>Selects districts</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-commune" class="col-form-label">Communes :</label>
										<select name="commune" class="custom-select custom-select-sm mt-2" id="commune" required>
											<option selected>Selects communes</option>
										</select>
									</div>
								</div>
							</div>




							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-mdp" class="col-form-label">Mot de passe :</label>
										<input type="password" name="mdp" class="form-control form-control-sm"  placeholder="Entrer mot de passe..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-confirm" class="col-form-label">Confirmer mot de passe
											:</label>
										<input type="password" name="confirm" class="form-control form-control-sm"  placeholder="Entrer confirmation mot de passe..." required/>
									</div>
								</div>
							</div>


						</div>
						<div class="modal-footer d-flex justify-content-center">
							<input type="submit" name="inscription"  class="btn" value="INSCRIRE"/>	
						</div>
					</form>
				</div>
			</div>
		</div>
		<!-- =======Fin  Modal inscription ======= -->
	</section>

	<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.slim.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/popper.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.4.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.2.1.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
	<script>
		$(document).ready(function() {

			// AFFICHE REGION A PARTIRE DU PROVINCE
			$('#province').change(function() {
				var idProvince = $('#province').val();
				if (idProvince != '') {
					$.ajax({
						url: "<?php echo base_url() . 'patient/Login_controlleur/selectRegion'; ?>",
						type: 'post',
						data: {
							idProvince: idProvince
						},
						success: function(data) {
							$('#region').html(data);
							$('#district').html("<option selected>Selects districts</option>");
							$('#commune').html("<option selected>Selects communes</option>");
						}
					});
				}
			});
			// FIN


			// AFFICHE DISTRICT A PARTIRE DU REGION
			$('#region').change(function() {
				var idRegion = $('#region').val();
				if (idRegion != '') {
					$.ajax({
						url: "<?php echo base_url() . 'patient/Login_controlleur/selectDistrict'; ?>",
						type: 'post',
						data: {
							idRegion: idRegion
						},
						success: function(data) {
							$('#district').html(data);
							$('#commune').html("<option selected>Selects communes</option>");
						}
					});
				}
			});
			// FIN


			// AFFICHE COMMUNE A PARTIRE DU DISTRICT
			$('#district').change(function() {
				var idDistrict = $('#district').val();
				if (idDistrict != '') {
					$.ajax({
						url: "<?php echo base_url() . 'patient/Login_controlleur/selectCommune'; ?>",
						type: 'post',
						data: {
							idDistrict: idDistrict
						},
						success: function(data) {
							$('#commune').html(data);
						}
					});
				}
			});
			// FIN
		});
	</script>
</body>

</html>
