<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/pharmacie.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.css'); ?>">
</head>

<body>
	<input type="hidden" value="<?php echo $idPharmacie; ?>" id="IDPHARMACIE">
	<input type="hidden" value="<?php echo $_SESSION['IDPATIENT']; ?>" id="IDPATIENT">
	<!-- Header -->
	<section id="header">
		<div class="container">
			<nav class="navbar navbar-expand-lg">
				<a class="navbar-brand" href="#"><img src="<?php echo base_url("assets/image/logo.png") ?>" alt="image/logo.png" width="50px"></a>
				<h6>Pharmacie <?php echo $nomPharmacie; ?></h6>
				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>

				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav ml-auto">
						<li class="nav-item">
							<a href="#" class="btn-group btn_cart btn_cart_ordy">
								<span class="badge badge-danger countePanier"></span>
								<i class="fa fa-shopping-cart"></i>
							</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="<?php echo site_url('patient/Pharmacie_controlleur/dasboard'); ?>"><i class="fa fa-home"></i></a>

						</li>
					</ul>
				</div>
			</nav>
			<div class="profile_pharmacie">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-8 col-lg-8">
						<div class="profile">
							<div class="row">
								<div class="col-12 col-sm-6 col-md-4 col-lg-4">
									<div class="logo_pharmacie">
										<img src="<?php echo base_url() . 'upload/pharmacie/' . $logoPharmacie; ?>" alt="">
									</div>
									<div class="logo_doctopharme">
										<img src="<?php echo base_url("assets/image/logo.png") ?>" alt="">
									</div>
								</div>
								<div class="col-12 col-sm-6 col-md-8 col-lg-8">
									<div class="description_profile">
										<h4 class="text-center">Pharmacie <?php echo $nomPharmacie ?></h4>
										<h6><i class="fa fa-medkit"></i> Pharmacie de <?php echo $typePharmacie; ?></h6>
										<hr style="border:1px solid rgb(0, 230, 0);">
										<h6><i class="fa fa-phone-square"></i> <?php echo $telephonePharmacie; ?></h6>
										<hr style="border:1px solid rgb(0, 230, 0);">
										<h6><i class="fa fa-map-marker"></i> <?php echo $adressePharmacie; ?></h6>
										<hr style="border:1px solid rgb(0, 230, 0);">
										<h6><i class="fa fa-envelope"></i> <?php echo $mailPharmacie; ?></h6>
										<hr style="border:1px solid rgb(0, 230, 0);">
										<h6><i class="fa fa-calendar"></i> <?php echo $jourPharmacie; ?></h6>
										<hr style="border:1px solid rgb(0, 230, 0);">
										<h6><i class="fa fa-clock-o"></i> <?php echo $heurePharmacie; ?></h6>
										<hr style="border:1px solid rgb(0, 230, 0);">
										<h6>Province: <?php echo $provincePharmacie; ?> - Région: <?php echo $regionPharmacie; ?> - District: <?php echo $districtPharmacie; ?> -
											Communes: <?php echo $communePharmacie; ?> </h6>
									</div>
								</div>
							</div>
						</div>
					</div>
					<div class="col-12 col-sm-12 col-md-4 col-lg-4">
						<div class="pharmacie_payement">
							<h4 class="text-center"><i class="fa fa-credit-card"></i> Pharmacie payements</h4>
							<div class="content_pharmacie_payement">
								<div class="accordion" id="accordionExample">

								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
	<!-- Fin Header -->


	<!-- Medicament -->
	<section id="medicament">
		<div class="container">
			<div class="content_medicament">
				<div class="row">
					<div class="col-12 col-sm-12 col-md-8 col-lg-8">
						<div class="recherche_medicament">
							<div class="form-group">
								<input type="text" name="recherche" id="rechercheMedicament" class="form-control form-control-lg" placeholder="Recherche médicaments ..." />
							</div>
							<div class="resultat_ajoute_panier">
							</div>
						</div>
						<div class="liste_medicament overflow-auto">
							<div class="row medicament">

							</div>
						</div>

					</div>
					<div class="col-12 col-sm-12 col-md-4 col-lg-4">
						<div class="panier_medicament">
							<div class="titre">
								<h6 class="text-center"><i class="fa fa-shopping-cart"></i> Panier</h6>
							</div>
							<div class="panier_content">

							</div>
							<div class="achat_content">
							</div>
						</div>
					</div>
				</div>
			</div>
			<!-- ======= Footer ======= -->
			<footer>
				<h6 class="text-center">&copy; Copyright <strong>DOCTOPHARME</strong></h6>
			</footer>
			<!-- =======Fin Fin Footer ======= -->
		</div>
		<!-- Modal -->
		<div class="modal fade" id="ajouteReference" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
			<div class="modal-dialog modal-dialog-scrollable" role="document">
				<div class="modal-content">
					<div class="modal-header">
						<h5 class="modal-title" id="exampleModalScrollableTitle">Ajoute payements</h5>
						<button type="button" class="close" data-dismiss="modal" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>
					<form id="ajouteReferencePayement" method="post">
						<div class="modal-body">
							<select class="custom-select custom-select-sm mb-3" id="operateurReference" name="operateurReference">

							</select>
							<div class="form-group">
								<label>Réference :</label>
								<input type="text" class="form-control form-control-sm" id="referencePayement" name="referencePayement" placeholder="Entrer réference ...">
							</div>
							<div class="form-groupe">
								<label>Numéro envoyeur :</label>
								<input type="text" class="form-control" name="numeroEnvoie" id="numeroEnvoie" placeholder="Entrer numéro envoyeur ...">
							</div>
							<input type="hidden" id="idAchat" name="idAchat">
							<input type="hidden" value="<?php echo $idPharmacie; ?>" id="IDPHARMACIE" name="IDPHARMACIE">
							<input type="hidden" value="<?php echo $_SESSION['IDPATIENT']; ?>" id="IDPATIENT" name="IDPATIENT">
						</div>
						<div class="modal-footer d-flex justify-content-center">
							<button type="submit" class="btn btn-sm">Ajouter</button>
						</div>
					</form>
				</div>
			</div>
		</div>

	</section>
	<!-- Fin Medicament -->




	<!-- Modal Medicament -->

	<div class="modal fade" id="article_medicament" tabindex="-1" role="dialog" aria-labelledby="article_medicamentScrollableTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable modal-lg" role="document">
			<div class="modal-content">
				<div class="resultat_ajoute_panier2">

				</div>
				<div class="modal-header">
					<h5 class="modal-title ml-1" id="exampleModalScrollableTitle">Détails du médicaments</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body detailsMedicament">

				</div>
			</div>
		</div>
	</div>
	<!-- Fin Modal Medicament -->
	<!--  Modal Achat -->
	<div class="modal fade" id="modalAchat" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
		<div class="modal-dialog modal-dialog-scrollable" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<div class="titre_achat">

					</div>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<form id="AjouteValidation" method="POST" enctype="multipart/form-data">
					<div class="modal-body">
						<div class="form-group">
							<label>Ordonnance:</label>
							<input type="file" class="form-control" name="ordonnance">
						</div>
						<div class="form-group">
							<label>Adresse livraison:</label>
							<input type="text" class="form-control" name="adresseLivraison" placeholder="Entrer adresse livraison ..." required>
						</div>
						<input type="hidden" name="medicamentAcheter" id="medicamentAcheter">
						<input type="hidden" name="prixTotal" id="prixTotal">
						<input type="hidden" value="<?php echo $idPharmacie; ?>" name="IDPHARMACIE">
						<input type="hidden" value="<?php echo $_SESSION['IDPATIENT']; ?>" name="IDPATIENT">
					</div>
					<div class="modal-footer d-flex justify-content-center">
						<button type="submit" class="btn btn-primary">Envoyer</button>
					</div>
				</form>
			</div>
		</div>
	</div>
	<!-- Fin Modal Achat -->

	<script src="<?php echo base_url('assets/jquery/jquery-3.3.1.slim.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.1.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/popper.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Bootstrap/js/bootstrap.bundle.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/Bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.4.1.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery-3.2.1.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/jquery.min.js'); ?>"></script>
	<script src="<?php echo base_url('assets/jquery/sweetalert2.all.min.js'); ?>"></script>
	<script>
		$(document).ready(function() {


			// AFFICHE PAYEMENT PHARMACIE
			affichePayement();

			function affichePayement() {
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/affichePayement'; ?>",
					type: 'post',
					data: {
						affichePayementPharmacie: "affichePayementPharmacie",
						idPharmacie: idPharmacie,
					},
					success: function(data) {
						$('#accordionExample').html(data);
					}
				});
			}
			// FIN AFFICHE PAYEMENT PHARMACIE


			// AFFICHE LISTES MEDICAMENTS
			$('#rechercheMedicament').keyup(function() {
				var search = $(this).val();
				if (search != '') {
					medicament(search);
				} else {
					medicament();
				}
			});
			medicament();

			function medicament(search) {
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/afficheMedicament'; ?>",
					method: "POST",
					data: {
						query: search,
						medicament: "medicament",
						idPharmacie: idPharmacie,
					},
					success: function(data) {
						$('.medicament').html(data);
					}
				});
			}
			// FIN AFFICHE LISTES MEDICAMENTS

			// AFFICHE MEDICAMENTS
			$(document).on('click', '#getMedicament', function() {
				var idMedicament = $(this).attr('value');
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/oneMedicament'; ?>",
					method: "POST",
					data: {
						medicament: "medicament",
						idMedicament: idMedicament,
						idPharmacie: idPharmacie
					},
					success: function(data) {
						$('.detailsMedicament').html(data);
					}
				});

			});
			// FIN AFFICHE MEDICAMENTS

			// AJOUTER AU PANIER
			$(document).on('click', '#ajoutePanier', function() {
				var idMedicament = $(this).attr('value');
				var idPharmacie = $('#IDPHARMACIE').val();
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/ajoutePanier'; ?>",
					method: "POST",
					data: {
						ajoutePanier: "ajoutePanier",
						idMedicament: idMedicament,
						idPharmacie: idPharmacie,
						idPatient: idPatient,
					},
					success: function(data) {
						$('.resultat_ajoute_panier').html(data);
						affichePanier();
						countePanier();
					}
				});

			});
			// FIN AJOUTER AU PANIER

			// AJOUTER AU PANIER 2
			$(document).on('click', '#ajoutePanier2', function() {
				var idMedicament = $(this).attr('value');
				var idPharmacie = $('#IDPHARMACIE').val();
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/ajoutePanier'; ?>",
					method: "POST",
					data: {
						ajoutePanier: "ajoutePanier",
						idMedicament: idMedicament,
						idPharmacie: idPharmacie,
						idPatient: idPatient,
					},
					success: function(data) {
						$('.resultat_ajoute_panier2').html(data);
						affichePanier();
						countePanier();
					}
				});

			});
			// FIN AJOUTER AU PANIER 2

			// AFFICHE PANIER
			affichePanier();

			function affichePanier() {
				var idPharmacie = $('#IDPHARMACIE').val();
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/affichePanier'; ?>",
					type: 'post',
					data: {
						affichePanierPharmacie: "affichePanierPharmacie",
						idPharmacie: idPharmacie,
						idPatient: idPatient
					},
					success: function(data) {
						$('.panier_content').html(data);
					}
				});
			}
			// FIN AFFICHE PANIER

			// SUPRIMER PANIER
			$(document).on('click', '.btn_suprimer', function() {
				var idPanier = $(this).attr('value');
				var idPharmacie = $('#IDPHARMACIE').val();
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/suprimerPanier'; ?>",
					type: 'post',
					data: {
						suprimerPanier: "suprimerPanier",
						idPharmacie: idPharmacie,
						idPatient: idPatient,
						idPanier: idPanier
					},
					success: function(data) {
						affichePanier();
						countePanier();

					}
				});
			});
			// FIN SUPRIMER PANIER


			// SELECT COUNT PANIER
			countePanier();

			function countePanier() {
				var idPharmacie = $('#IDPHARMACIE').val();
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/afficheCountePanier'; ?>",
					method: "POST",
					data: {
						countPanier: "countPanier",
						idPatient: idPatient,
						idPharmacie: idPharmacie,
					},
					success: function(data) {
						$('.countePanier').html(data);
					}
				});
			}
			// FIN SELECT COUNT PANIER

			// MODIFIER NOMBRE MEDICAMENT
			$(document).on('change', '#qtyMedicament', function() {
				var $el = $(this).closest('div');
				var quantite = $el.find('#qtyMedicament').val();
				var idPanier = $el.find('#idPanier').val();
				var idPharmacie = $('#IDPHARMACIE').val();
				var idPatient = $('#IDPATIENT').val();
				if (quantite < 1) {
					Swal.fire('Oops...', 'La quantite ne doit pas être inférieur à 1!', 'error')
					setTimeout(function() {
						location.reload();
					}, 2200);
				} else {
					$.ajax({
						url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/modifierNombreMedicament'; ?>",
						method: "POST",
						data: {
							nombreMedicament: "nombreMedicament",
							idPatient: idPatient,
							idPharmacie: idPharmacie,
							quantite: quantite,
							idPanier: idPanier
						},
						success: function(data) {
							affichePanier();
						}
					});

				}
			});
			// FIN MODIFIER NOMBRE MEDICAMENT

			// GET ACHAT MEDICAMENT
			$(document).on('click', '#btn_validations', function() {
				var idPharmacie = $('#IDPHARMACIE').val();
				var idPatient = $('#IDPATIENT').val();
				var medicametAcheter = $('#medicamentAchat').val();
				var prixTotal = $('#GrandTotal').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/getAchat'; ?>",
					method: "POST",
					data: {
						getAchat: "getAchat",
						idPatient: idPatient,
						idPharmacie: idPharmacie
					},
					success: function(data) {
						$('.titre_achat').html(data);
						$('#medicamentAcheter').val(medicametAcheter);
						$('#prixTotal').val(prixTotal);
					}
				});
			});
			// FIN GET ACHAT MEDICAMENT

			// AJOUTER ACHATS
			$("#AjouteValidation").on("submit", function(e) {
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/ajouteAchat'; ?>",
					method: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						affichePanier();
						Swal.fire({
							title: 'Envoie validation avec success!',
							icon: 'success'
						});
						setTimeout(function() {
							location.reload();
						}, 1500);
					}
				});
				$("#AjouteValidation")[0].reset();

			});
			// FIN AJOUTER ACHATS


			// SELECT ACHAT
			setInterval(afficheAchat, 1000);
			afficheAchat();

			function afficheAchat() {
				var idPharmacie = $('#IDPHARMACIE').val();
				var idPatient = $('#IDPATIENT').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/afficheAchat'; ?>",
					method: "POST",
					data: {
						achat: "achat",
						idPatient: idPatient,
						idPharmacie: idPharmacie,
					},
					success: function(data) {
						$('.achat_content').html(data);
					}
				});
			}
			// FIN SELECT ACHAT

			// GET IDACHAT
			$(document).on('click', '#ajoutePayement', function() {
				var idAchat = $(this).attr('value');
				$('#idAchat').val(idAchat);
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/afficheOperateur'; ?>",
					method: "POST",
					data: {
						operateurPharmacie: "operateurPharmacie",
						idPharmacie: idPharmacie,
					},
					success: function(data) {
						$('#operateurReference').html(data);
					}
				});
			});
			// FIN GET IDACHAT

			// AJOUTER REFERENCE
			$("#ajouteReferencePayement").on("submit", function(e) {
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/ajouteReference'; ?>",
					method: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						Swal.fire({
							title: 'Envoie réference avec success!',
							icon: 'success'
						});
						setTimeout(function() {
							location.reload();
						}, 1500);
					}
				});
				$('#ajouteReferencePayement')[0].reset();

			});
			// FIN AJOUTER REFERENCE

			// SUPRIMER ACHAT
			$(document).on('click', '#suprimerAchat', function() {
				var idAchat = $(this).attr('value');
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'patient/Pharmacie_controlleur/suprimerAchat'; ?>",
					method: "POST",
					data: {
						suprimerAchat: "suprimerAchat",
						idAchat: idAchat,
						idPharmacie: idPharmacie
					},
					success: function(data) {
						;
					}
				});
			});
			// FIN SUPRIMER ACHAT


		});
	</script>
</body>

</html>
