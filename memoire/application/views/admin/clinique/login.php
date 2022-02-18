<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/loginClinique.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
</head>

<body>
	<input type="hidden" id="CLECLINIQUE" value="<?php echo $_SESSION['CODECLINIQUE']; ?>" />
	<section id="loginCentreMedicale">
		<!-- ======= Login ======= -->
		<div class="container">
			<div class="titre">
				<h2 class="text-center">Centre Médicale</h2>
			</div>
			<?php if (isset($_SESSION['success'])) { ?>
				<?php echo $_SESSION['success']; ?>
			<?php } ?>
			<?php if (isset($_SESSION['error'])) { ?>
				<?php echo $_SESSION['error']; ?>
			<?php } ?>
			<div class="d-flex justify-content-center">
				<div class="col-12 col-sm-12 col-md-6 col-lg-6">
					<div class="login">
						<form action="<?php echo base_url().'admin/clinique/Login_controlleur/validation'?>" method="POST" class="login-form text-center">
							<h3>Login</h3>
							<div class="form-group">
								<input type="email" name="mailClinique" class="form-control form-control-lg" placeholder="Adresse mail..." required/>
							</div>
							<div class="form-group">
								<input type="password" name="passwordClinique" class="form-control form-control-lg" placeholder="Mot de passe..." required/>
							</div>
							<input type="submit" class="btn-custom btn-block text-uppercase btn-lg" value="Connexion" />
							<p class="mt-3 font-weight-normal"> Vous n'avez pas de conte ?<a href="#"><strong class="ml-1" type="button" data-toggle="modal" data-target="#inscriptionCentreMedicale" data-whatever="@fat">Inscrivez
										vous ici!</strong></a>
							</p>
							<a href="<?php echo site_url('admin/clinique/Login_controlleur/logoutPassage'); ?>" class="btn-accueil mt-2">Accueil</a>
						</form>
					</div>
				</div>
			</div>
		</div>
		<!-- =======Fin Login ======= -->

		<!-- ======= Modal inscription ======= -->

		<div class="modal fade" id="inscriptionCentreMedicale" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
			<div class="modal-dialog modal-lg" role="document">
				<div class="modal-content">
					<div class="modal-header">
					<img src="<?php echo base_url('assets/image/logo.png') ?>" class="modal-image" width="40px" alt="">
						<h5 class="modal-title" id="exampleModalLabel">Inscriptions</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form  action="<?php echo base_url() . 'admin/clinique/Login_controlleur/inscription'?>" method="post" enctype="multipart/form-data">
						<div class="modal-body">
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-nom" class="col-form-label">Nom propriétaire:</label>
										<input type="text" name="nomProprietaireClinique" class="form-control form-control-sm" placeholder="Entrer nom propriétaire..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-prenom" class="col-form-label">Prénom propriétaire:</label>
										<input type="text" name="prenomProprietaireClinique" class="form-control form-control-sm" placeholder="Entrer prénom propriétaire..." required/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-mail" class="col-form-label">Mail propriétaire:</label>
										<input type="email" name="mailProprietaireClinique" class="form-control form-control-sm" placeholder="Entrer mail propriétaire..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-telephone" class="col-form-label">Téléphone propriétaire:</label>
										<input type="text" name="telephoneProprietaireClinique" class="form-control form-control-sm" placeholder="Entrer téléphone proprietaire..." required/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-adresse" class="col-form-label">Adresse propriétaire:</label>
										<input type="text" name="adresseProprietaireClinique" class="form-control form-control-sm" placeholder="Entrer adresse propriétaire..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-cin" class="col-form-label">N° CIN propriétaire:</label>
										<input type="text" name="cinProprietaireClinique" class="form-control form-control-sm" placeholder="Entrer n° cin propriétaire..." required/>
									</div>
								</div>
							</div>
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-nom" class="col-form-label">Nom centre médicale :</label>
										<input type="text" name="nomClinique" class="form-control form-control-sm" placeholder="Entrer nom centre médicale Ex : Dentiste Aina..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-adresse" class="col-form-label">Adresse centre médicale :</label>
										<input type="text" name="adresseClinique" class="form-control form-control-sm" placeholder="Entrer adresse centre médicale..." required/>
									</div>
								</div>
							</div>



							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-telephone" class="col-form-label">Téléphone centre médicale :</label>
										<input type="text" name="telephoneClinique" class="form-control form-control-sm" placeholder="Entrer téléphone centre médicale..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-mail" class="col-form-label">Mail centre médicale :</label>
										<input type="email" name="mailClinique" class="form-control form-control-sm" placeholder="Entrer mail centre médicale..." required/>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-logo" class="col-form-label">Logo centre médicale :</label>
										<input type="file" name="logoClinique" class="form-control form-control-sm" />
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-type" class="col-form-label">A propos du centre médicale :</label>
										<textarea name="specialiseClinique" class="form-control form-control-sm" placeholder="Entrer à propos du centre médicale ..." required></textarea>
									</div>
								</div>
							</div>

							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-heure" class="col-form-label">Heure d'ouverture :</label>
										<input type="text" name="heureOuvertureClinique" class="form-control form-control-sm" placeholder="Entrer heure d'ouverture ..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-jour" class="col-form-label">Jour d'ouverture :</label>
										<input type="text" name="jourOuvertureClinique" class="form-control form-control-sm" placeholder="Entrer jour d'ouverture ..." required/>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-provine" class="col-form-label">Province :</label>
										<select name="provinceClinique" class="custom-select custom-select-sm mt-2" id="province" required>
											<option selected value="">Selects provinces</option>
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
										<select class="custom-select custom-select-sm mt-2" name="regionClinique" id="region" required>
										<option selected value="">Selects régions</option>
										</select>
									</div>
								</div>
							</div>


							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-district" class="col-form-label">Districts :</label>
										<select class="custom-select custom-select-sm mt-2" name="districtClinique" id="district" required>
										<option selected value="">Selects districts</option>
										</select>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-commune" class="col-form-label">Communes :</label>
										<select class="custom-select custom-select-sm mt-2" name="communeClinique" id="commune" required>
										<option selected value="">Selects commune</option>
										</select>
									</div>
								</div>
							</div>



							<input type="hidden" id="codeClinoque" name="codeClinique" value="<?php echo $_SESSION['CODECLINIQUE']; ?>" />
							<div class="row">
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-password" class="col-form-label">Mot de passe :</label>
										<input type="password" name="passwordClinique" class="form-control form-control-sm" placeholder="Votre mot de passe..." required/>
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-6 col-lg-6">
									<div class="form-group">
										<label for="recipient-confirmPassword" class="col-form-label">Confirmer mot de passe :</label>
										<input type="password" name="confirmPasswordClinique" class="form-control form-control-sm" placeholder="Votre confirmation mot de passe..." required/>
									</div>
								</div>
							</div>


						</div>
						<div class="modal-footer d-flex justify-content-center">
							<button type="submit" class="btn" name="inscription">
								Enregistrer
							</button>
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
						url: "<?php echo base_url() . 'admin/clinique/Login_controlleur/selectRegion'; ?>",
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
				}else{
					$('#region').html("<option selected>Selects regions</option>");
					$('#district').html("<option selected>Selects districts</option>");
					$('#commune').html("<option selected>Selects communes</option>");
				}
			});
			// FIN



			// AFFICHE DISTRICT A PARTIRE DU REGION
			$('#region').change(function() {
				var idRegion = $('#region').val();
				if (idRegion != '') {
					$.ajax({
						url: "<?php echo base_url() . 'admin/clinique/Login_controlleur/selectDistrict'; ?>",
						type: 'post',
						data: {
							idRegion: idRegion
						},
						success: function(data) {
							$('#district').html(data);
							$('#commune').html("<option selected>Selects communes</option>");
						}
					});
				}else{
					$('#district').html("<option selected>Selects districts</option>");
					$('#commune').html("<option selected>Selects communes</option>");
				}
			});
			// FIN



			// AFFICHE COMMUNE A PARTIRE DU DISTRICT
			$('#district').change(function() {
				var idDistrict = $('#district').val();
				if (idDistrict != '') {
					$.ajax({
						url: "<?php echo base_url() . 'admin/clinique/Login_controlleur/selectCommune'; ?>",
						type: 'post',
						data: {
							idDistrict: idDistrict
						},
						success: function(data) {
							$('#commune').html(data);
						}
					});
				}else{
					$('#commune').html("<option selected>Selects communes</option>");
				}
			});
			// FIN


		});
	</script>
</body>

</html>
