<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dasboardAdmine.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
</head>

<body>
	<input type="hidden" id="codeAdmin" value="<?php echo $_SESSION['CODEADMIN']; ?>">
	<!-- WRAPPER -->
	<div class="WRAPPER">

		<!-- SIDEBAR -->
		<div class="SIDEBAR">

			<div class="bg_shadow"></div>

			<div class="sidebar_inner">
				<div class="sidebar_close d-flex justify-content-end">
					<div class="closse">
						<i class="fa fa-times"></i>
					</div>
				</div>
				<div class="sidebar_logo">
					<img src="<?php echo base_url('assets/image/logo.png') ?>" alt="">
				</div>
				<ul class="sidebar_menu">
					<li class="active">
						<a href="#" id="open_acceuils">
							<div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
							<div class="title">Acceuils</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_listes-boxes">
							<div class="icon"><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
							<div class="title">Listes boxes</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_payements-loyers">
							<div class="icon"><i class="fa fa-edit" aria-hidden="true"></i></div>
							<div class="title">Payements loyers</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_status-loyers">
							<div class="icon"><i class="fa fa-bar-chart-o" aria-hidden="true"></i></div>
							<div class="title">Status loyers</div>
						</a>
					</li>


				</ul>
			</div>


		</div>
		<!-- FIN SIDEBAR -->




		<!-- CONTENT -->
		<div class="CONTENT">

			<!-- Navbar -->
			<div class="navbar_content">
				<div class="bloc_left">
					<div class="hamburger">
						<i class="fa fa-bars" aria-hidden="true"></i>
					</div>
					<div class="image_patient">
						<a href="#">ADMINISTRATIONS</a>
					</div>
				</div>
				<div class="bloc_right">
					<div class="btn-group btn_deconnection mr-1">
						<a href="<?php echo base_url() . 'admin/administration/Admin_controlleur/logout' ?>"><i class="fa fa-power-off"></i></a>
					</div>
				</div>
			</div>
			<!--Fin Navbar-->

			<!-- Acceuils -->
			<section class="acceuils-blocs" id="acceuils-blocs">
				<div class="acceuils">
					<div class="row">
						<div class="col-12 col-sm-6 col-md-4 col-lg-4">
							<h6 class="text-center mt-3">Passage Admines</h6>
							<form method="post" id="ajoutePassage">
								<div class="form-group">
									<select class="custom-select custom-select-sm mt-2" required id="passageAdmin">
										<option selected>Selects admines</option>
										<option value="admine">Admine</option>
										<option value="docteur">Docteur</option>
										<option value="pharmacie">Pharmacie</option>
										<option value="clinique">Clinique</option>
									</select>
								</div>
								<div class="form-group">
									<input type="email" class="form-control form-control-sm" id="passageMailAdmin" placeholder="Adresse mail ..." required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-sm" id="passageCleAdmin" placeholder="Clé ..." required>
								</div>
								<div class="col d-flex justify-content-center">
									<button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
								</div>
							</form>

						</div>
						<div class="col-12 col-sm-6 col-md-4 col-lg-4">
							<h6 class="text-center mt-3">Notification Boxes</h6>
							<form method="post" id="ajouteNotif">
								<div class="form-group">
									<select class="custom-select custom-select-sm mt-2" id="notifBoxes" required>
										<option selected>Select Boxes</option>
										<option value="docteur">Docteur</option>
										<option value="pharmacie">Pharmacie</option>
										<option value="clinique">Clinique</option>
									</select>
								</div>
								<div class="form-group">
									<textarea class="form-control" id="notifMessageBoxes" placeholder="Message ..." required></textarea>
								</div>
								<div class="col d-flex justify-content-center">
									<button type="submit" class="btn btn-success btn-sm" id="saveNotif">Envoyer</button>
								</div>
							</form>
						</div>
						<div class="col-12 col-sm-6 col-md-4 col-lg-4">
							<h6 class="text-center mt-3">Payements Loyers Boxes</h6>
							<form method="post" id="ajoutePayement">
								<div class="form-group">
									<select class="custom-select custom-select-sm mt-2" id="payementOperateur" required>
										<option selected>Select opérateurs</option>
										<option value="mvola">Mvola</option>
										<option value="orangeMoney">Orange Money</option>
										<option value="airtelMoney">Airtel Money</option>
									</select>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-sm" id="payementNomAppartenance" placeholder="Au nom de ..." required>
								</div>
								<div class="form-group">
									<input type="text" class="form-control form-control-sm" id="payementNumeroOperateur" placeholder="numéro ..." required>
								</div>
								<div class="col d-flex justify-content-center">
									<button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
								</div>
							</form>
						</div>
					</div>
					<div class=" mt-5">
						<div class="col-12 col-sm-12 col-md-12 col-lg-12">
							<div class="table-responsive mt-3">

							</div>
						</div>
					</div>

					<!-- Modal Modification payement-->
					<div class="modal fade" id="modificationPayement" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
						<div class="modal-dialog modal-dialog-scrollable" role="document">
							<div class="modal-content">
								<div class="modal-header">
									<h5 class="modal-title" id="exampleModalScrollableTitle">Modifications Payements</h5>
									<button type="button" class="close" data-dismiss="modal" aria-label="Close">
										<span aria-hidden="true">&times;</span>
									</button>
								</div>
								<div class="modal-body">
									<form method="post" id="ModifierPayement">
										<div class="form-group">
											<select class="custom-select custom-select-sm mt-2" id="ModifierPayementOperateur" required>
												<option selected>Select opérateurs</option>
												<option value="mvola">Mvola</option>
												<option value="orangeMoney">Orange Money</option>
												<option value="airtelMoney">Airtel Money</option>
											</select>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-sm" id="ModifierPayementNomAppartenance" placeholder="Au nom de ..." required>
										</div>
										<div class="form-group">
											<input type="text" class="form-control form-control-sm" id="ModifierPayementNumeroOperateur" placeholder="numéro ..." required>
										</div>
										<input type="hidden" id="idPayement">
										<div class="col d-flex justify-content-center">
											<button type="submit" class="btn btn-success btn-sm">Enregistrer</button>
										</div>
									</form>
								</div>
							</div>
						</div>
					</div>

					<!-- Fin  Modal -->


				</div>
			</section>
			<!-- Fin Acceuils-->




			<!--Listes Boxes-->
			<section class="listes-boxes-blocs" id="listes-boxes-blocs">

			</section>
			<!--Fin Listes Boxes-->



			<!--Payements-loyers-->
			<section class="payements-loyers-blocs" id="payements-loyers-blocs">

			</section>
			<!--Fin Payements-loyers-->


			<!--Status-loyers-->
			<section class="status-loyers-blocs" id="status-loyers-blocs">

			</section>
			<!--Fin Status-loyers-->



		</div>
		<!-- FIN CONTENT -->


	</div>
	<!--FIN WRAPPER-->

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

			$(".sidebar_menu li ").click(function() {
				$(".sidebar_menu li ").removeClass("active ");
				$(this).addClass("active ");
			});
			$(".hamburger ").click(function() {
				$(".WRAPPER ").addClass("active ");
			});
			$(".closse, .bg_shadow ").click(function() {
				$(".WRAPPER ").removeClass("active ");
			});

		});





		$(document).ready(function() {


			// AJOUTER PASSAGE ADMINE
			$("#ajoutePassage").on("submit", function(e) {
				e.preventDefault();
				var typeAdmine = $('#passageAdmin').val();
				var mailAdmine = $('#passageMailAdmin').val();
				var cleAdmine = $('#passageCleAdmin').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/administration/Admin_controlleur/ajoutePassage'; ?>",
					type: 'post',
					data: {
						typeAdmine: typeAdmine,
						mailAdmine: mailAdmine,
						cleAdmine: cleAdmine,
					},
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
					}
				});
				$('#ajoutePassage')[0].reset();
			});
			// FIN AJOUTER PASSAGE ADMINE



			// AJOUTER NOTIF ADMINE
			$("#ajouteNotif").on("submit", function(e) {
				e.preventDefault();
				var notifboxes = $('#notifBoxes').val();
				var notifMessageBoxes = $('#notifMessageBoxes').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/administration/Admin_controlleur/ajouteNotif'; ?>",
					type: 'post',
					data: {
						notifboxes: notifboxes,
						notifMessageBoxes: notifMessageBoxes,
					},
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
					}
				});
				$('#ajouteNotif')[0].reset();
			});
			// FIN AJOUTER NOTIF ADMINE



			// AJOUTER PAYEMENT ADMINE
			$("#ajoutePayement").on("submit", function(e) {
				e.preventDefault();
				var operateur = $('#payementOperateur').val();
				var nomAppartenance = $('#payementNomAppartenance').val();
				var numeroOperateur = $('#payementNumeroOperateur').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/administration/Admin_controlleur/ajoutePayement'; ?>",
					type: 'post',
					data: {
						operateur: operateur,
						nomAppartenance: nomAppartenance,
						numeroOperateur: numeroOperateur,
					},
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
						affichePayement();
					}
				});
				$('#ajoutePayement')[0].reset();
			});
			// FIN AJOUTER PAYEMENT ADMINE


			// AFFICHE PAYEMENT ADMINE
			affichePayement();

			function affichePayement() {
				$.ajax({
					url: "<?php echo base_url() . 'admin/administration/Admin_controlleur/affichePayement'; ?>",
					type: 'post',
					data: {
						affichePayement: "affichePayement"
					},
					success: function(data) {
						$('.table-responsive').html(data);
					}
				});
			}
			// FIN AFFICHE PAYEMENT ADMINE


			// SUPRIMER PAYEMENT
			$(document).on("click", "#suprimerPayemet", function(e) {
				e.preventDefault();
				var idPayement = $(this).attr("value");
				Swal.fire({
					title: 'Vous êtes sur de suprimer?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, suprimer!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/administration/Admin_controlleur/suprimerPayement'; ?>",
							type: 'post',
							data: {
								idPayement: idPayement,
							},
							success: function(data) {
								Swal.fire(
									'Suppression!',
									data,
									'success'
								);
								affichePayement();
							},
						});
					} else if (result.dismiss === Swal.DismissReason.cancel) {
						Swal.fire(
							'Annulation',
							'Suppression annuler :)',
							'error'
						)
					}
				});

			});

			// FIN SUPRIMER PAYEMENT

			// PAYEMENT

			$(document).on("click", "#payement", function(e) {
				e.preventDefault();
				var idPayement = $(this).attr("value");
				$.ajax({
					url: "<?php echo base_url() . 'admin/administration/Admin_controlleur/afficheOnePayement'; ?>",
					type: "post",
					dataType: "json",
					data: {
						idPayement: idPayement
					},
					success: function(data) {
						if (data.response == "success") {
							$("#idPayement").val(data.post.IDLOYERBOXE);
							$("#ModifierPayementOperateur").val(data.post.OPERATEURLOYERBOXE);
							$("#ModifierPayementNomAppartenance").val(data.post.APARTENANCELOYERBOXE);
							$("#ModifierPayementNumeroOperateur").val(data.post.NUMEROLOYERBOXE);
						} else {
							alert("error");
						}
					}
				});
			});

			// FIN PAYEMENT

			// MODIFIER PAYEMENT 
			$("#ModifierPayement").on("submit", function(e) {
				e.preventDefault();
				var ModifierOperateur = $('#ModifierPayementOperateur').val();
				var ModifierNomAppartenance = $('#ModifierPayementNomAppartenance').val();
				var ModifierNumeroOperateur = $('#ModifierPayementNumeroOperateur').val();
				var ModifierIdPayement = $('#idPayement').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/administration/Admin_controlleur/modifierPayement'; ?>",
					type: 'post',
					data: {
						operateur: ModifierOperateur,
						nomAppartenance: ModifierNomAppartenance,
						numeroOperateur: ModifierNumeroOperateur,
						idPayement: ModifierIdPayement
					},
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
						affichePayement();
						setTimeout(function() {
							location.reload();
						}, 2200);

					}
				});
			});
			// FIN MODIFIER PAYEMENT 




		});







		$(document).ready(function() {

			let acceuils = document.getElementById('acceuils-blocs'),
				openAcceuils = document.getElementById('open_acceuils');

			openAcceuils.addEventListener('click', function() {
				acceuils.style.display = "block";
				listesBoxes.style.display = "none";
				payementsLoyers.style.display = "none";
				statusLoyers.style.display = "none";


			});


			let listesBoxes = document.getElementById('listes-boxes-blocs'),
				openListesBoxes = document.getElementById('open_listes-boxes');

			openListesBoxes.addEventListener('click', function() {
				listesBoxes.style.display = "block";
				acceuils.style.display = "none";
				payementsLoyers.style.display = "none";
				statusLoyers.style.display = "none";


			});



			let payementsLoyers = document.getElementById('payements-loyers-blocs'),
				openPayementsLoyers = document.getElementById('open_payements-loyers');

			openPayementsLoyers.addEventListener('click', function() {
				payementsLoyers.style.display = "block";
				listesBoxes.style.display = "none";
				acceuils.style.display = "none";
				statusLoyers.style.display = "none";


			});



			let statusLoyers = document.getElementById('status-loyers-blocs'),
				openStatusLoyers = document.getElementById('open_status-loyers');

			openStatusLoyers.addEventListener('click', function() {
				statusLoyers.style.display = "block";
				listesBoxes.style.display = "none";
				acceuils.style.display = "none";
				payementsLoyers.style.display = "none";


			});



		});
	</script>
</body>

</html>
