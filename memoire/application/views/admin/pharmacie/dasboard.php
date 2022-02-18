<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/Bootstrap/css/bootstrap-reboot.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/dasboardPharmacie.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/animate.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/font-awesome/css/font-awesome.min.css'); ?>">
	<link rel="stylesheet" href="<?php echo base_url('assets/css/sweetalert2.css'); ?>">
</head>

<body>
	<input type="hidden" value="<?php echo $_SESSION['IDPHARMACIE']; ?>" id="IDPHARMACIE">
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
						<a href="#" id="open_profile">
							<div class="icon"><i class="fa fa-home" aria-hidden="true"></i></div>
							<div class="title">Profile</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_gererProduit">
							<div class="icon"><i class="fa fa-plus-square-o" aria-hidden="true"></i></div>
							<div class="title">Gérer Médicaments</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_statusVente">
							<div class="icon"><i class="fa fa-bar-chart-o" aria-hidden="true"></i></div>
							<div class="title">Status Ventes</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_achats">
							<div class="icon"><i class="fa fa-shopping-cart" aria-hidden="true"></i></div>
							<div class="title">Achats <span class="badge badge-danger badge_Achat ml-1"></span></div>
						</a>
					</li>
					<li>
						<a href="#" id="open_patients">
							<div class="icon"><i class="fa fa-user-plus" aria-hidden="true"></i></div>
							<div class="title">Listes Patients</div>
						</a>
					</li>
					<li>
						<a href="#" id="open_payements">
							<div class="icon"><i class="fa fa-money" aria-hidden="true"></i></div>
							<div class="title">Payements</div>
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
						<img src="<?php echo base_url() . 'upload/pharmacie/' . $_SESSION['LOGOPHAMACIE']; ?>" width="35px" height="30px" alt="">
						<a href="#">Pharmacie <?php echo $_SESSION['NOMPHARMACIE']; ?></a>
					</div>
				</div>
				<div class="bloc_right">
					<div class="btn-group btn_deconnection mr-1">
						<a href="<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/logout' ?>"><i class="fa fa-power-off"></i></a>
					</div>
				</div>
			</div>
			<!--Fin Navbar-->

			<!-- Profile -->
			<section class="profile-blocs" id="profile-blocs">
				<div class="profile">
					<div class="row">
						<div class="col-12 col-sm-8 col-md-8 col-lg-8 bloc1">
							<div class="col d-flex justify-content-center">
								<div class="logo_pharmacie">
									<img src="<?php echo base_url() . 'upload/pharmacie/' . $_SESSION['LOGOPHAMACIE']; ?>" alt="">
								</div>
							</div>
							<div class="description_pharmacie">
								<h6><span>Nom:</span> Pharmacie <?php echo $_SESSION['NOMPHARMACIE']; ?></h6>
								<h6><span>Adresse:</span> <?php echo $_SESSION['ADRESSEPHARMACIE']; ?></h6>
								<h6><span>Téléphone:</span> <?php echo $_SESSION['TELEPHONEPHARMACIE']; ?></h6>
								<h6><span>Adresse Mail:</span> <?php echo $_SESSION['MAILPHARMACIE']; ?></h6>
								<h6><span>Type Pharmacie:</span> <?php echo $_SESSION['TYPEPHARMACIE']; ?> </h6>
								<h6><span>Ouverture:</span> <?php echo $_SESSION['JOUROUVERTUREPHARMACIE']; ?></h6>
								<h6><span>Heure:</span> <?php echo $_SESSION['HEUREOUVERTUREPHARMACIE']; ?></h6>
								<h6><span>Propriétaire:</span> <?php echo $_SESSION['NOMPROPRIETAIREPHARMACIE']; ?> <?php echo $_SESSION['PRENOMPROPRIETAIREPHARMACIE']; ?></h6>
								<h6><span>Province:</span> <?php echo $_SESSION['PROVINCEPHARMACIE']; ?> - <span>Région:</span> <?php echo $_SESSION['REGIONPHARMACIE']; ?> -
									<span>District:</span> <?php echo $_SESSION['DISTRICTPHARMACIE']; ?> - <span>Communes:</span>
									<?php echo $_SESSION['COMMUNEPHARMACIE']; ?>
								</h6>
							</div>
						</div>
						<div class="col-12 col-sm-4 col-md-4 col-lg-4 bloc2">
							<div class="astuces_profile">
								<h6 class="text-center"> <i class="fa fa-tint"></i> Astuces</h6>
								<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor
									incididunt ut labore et dolore magna aliqua. Duis aute irure dolor in reprehenderit
									Asperiores dolores sed et. Tenetur quia eos. Autem tempore quibusdam vel
									necessitatibus optio ad corporis,necessitatibus optio ad corporis.. Duis aute irure
									dolor in reprehenderit Asperiores dolores sed et. Tenetur quia eos. </p>
								<div class="d-flex justify-content-center">
									<div class="image_astuce">
										<img src="<?php echo base_url('assets/image/login-pharmacie.png'); ?>" alt="">
									</div>
								</div>
							</div>
							<div class="button_modification col d-flex justify-content-center">
								<button class="btn btn-success btn-sm">Modifications des informations</button>
							</div>
						</div>
					</div>
				</div>
			</section>
			<!-- Fin Profile -->




			<!-- Gerer Produit -->
			<section class="gererProduit-blocs" id="gererProduit-blocs">
				<div class="gerer_produit">
					<div class="header_produit">
						<div class="recherche_produit">
							<input type="text" id="rechercheMedicament" class="form-control" placeholder="Cherche médicament">
						</div>
						<div class="ajoute_produit">
							<button class="btn  btn-sm" data-toggle="modal" data-target="#ajoute_medicament">Ajouter</button>
						</div>
					</div>
					<div class="body_produit overflow-auto">
						<div class="table-responsive table_medicament">

						</div>
					</div>
				</div>

				<div class="modal fade" id="ajoute_medicament" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Ajoutes Médicaments</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" id="ajoute_medicament_form" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="form-group">
										<label>Nom :</label>
										<input type="text" class="form-control" name="nomMedicament" placeholder="Entrer nom médicament ..." required>
									</div>
									<div class="form-group">
										<label>Quantité :</label>
										<input type="text" class="form-control" name="quantiteMedicament" placeholder="Entrer quantité médicament ex: 1 boites ..." required>
									</div>
									<div class="form-group">
										<label>Prix :</label>
										<input type="text" class="form-control" name="prixMedicament" placeholder="Entrer prix médicament en Ar ex: 1000" required>
									</div>
									<div class="form-group">
										<label>Article :</label>
										<textarea class="form-control" name="articleMedicament" placeholder="Entrer article médicament" required></textarea>
									</div>
									<div class="form-group">
										<label>Photo :</label>
										<input type="file" class="form-control" name="photoMedicament" required>
									</div>
									<input type="hidden" name="idPharmacie" value="<?php echo $_SESSION['IDPHARMACIE']; ?>">
									<input type="hidden" name="ajouteMedicament">
								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-sm">Ajouter</button>
								</div>
							</form>
						</div>
					</div>
				</div>


				<div class="modal fade" id="detailsMedicament" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Détails médicaments</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body modal_detailsMedicament">

							</div>
						</div>
					</div>
				</div>


				<div class="modal fade" id="modifierMedicament" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Modifier médicaments</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="modifier_medicament_form" method="POST" enctype="multipart/form-data">
								<div class="modal-body">
									<div class="form-group">
										<label>Nom :</label>
										<input type="text" class="form-control" name="modifierNomMedicament" id="modifierNomMedicament" placeholder="Entrer nom médicament ..." required>
									</div>
									<div class="form-group">
										<label>Quantité :</label>
										<input type="text" class="form-control" name="modifierQuantiteMedicament" id="modifierQuantiteMedicament" placeholder="Entrer quantité médicament ex: 1 boites" required>
									</div>
									<div class="form-group">
										<label>Prix :</label>
										<input type="text" class="form-control" name="modifierPrixMedicament" id="modifierPrixMedicament" placeholder="Entrer prix médicament en Ar ex: 1000" required>
									</div>
									<div class="form-group">
										<label>Article :</label>
										<textarea class="form-control" name="modifierArticleMedicament" id="modifierArticleMedicament" placeholder="Entrer article médicament" required></textarea>
									</div>
									<div class="form-group">
										<label>Photo :</label>
										<input type="file" class="form-control" name="modifierPhotoMedicament" id="modifierPhotoMedicament">
									</div>
									<input type="hidden" class="form-control" name="namePhoto" id="namePhoto">
									<input type="hidden" name="modifierIdMedicament" id="modifierIdMedicament">
								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-sm">Ajouter</button>
								</div>
							</form>
						</div>
					</div>
				</div>


			</section>
			<!-- Fin Gerer Produit -->





			<!-- status vente -->
			<section classelect_statuss="statusVente-blocs" id="statusVente-blocs">
				<div class="statusVente">
					<div class="select_status">
						<div class="anne">
							<select class="custom-select custom-select-sm mb-3 selectVenteAnne">
								<option value=""> Select année</option>
								<option value="2021">2021</option>
								<option value="2022">2022</option>
								<option value="2023">2023</option>
								<option value="2024">2024</option>
								<option value="2025">2025</option>
							</select>
						</div>
						<div class="mois ml-3">
							<input type="hidden" id="anneMois">
							<select class="custom-select custom-select-sm mb-3 selectVenteMois" id="selectVenteMois">
								<option value="" selected>Select mois</option>
								<option value="01">Janvier</option>
								<option value="02">Fevrier</option>
								<option value="03">Mars</option>
								<option value="04">Avril</option>
								<option value="05">Mais</option>
								<option value="06">Juin</option>
								<option value="07">Juillet</option>
								<option value="08">Août</option>
								<option value="09">Septembre</option>
								<option value="10">Octobre</option>
								<option value="11">Novembre</option>
								<option value="12">Décembre</option>
							</select>
						</div>
					</div>
					<div class="content_status overflow-auto">
						<div class="table-responsive statusVente_liste">

						</div>
					</div>
					<div class="button_export d-flex justify-content-center">
						<form action="<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/pdfVente'; ?>" id="venteForm" method="POST">
							<input type="hidden" name="anneVente" id="anneVente" required>
							<input type="hidden" name="moisVente" id="moisVente">
							<input type="hidden" value="<?php echo $_SESSION['IDPHARMACIE']; ?>" name="IDPHARMACIE" id="IDPHARMACIE">
							<input type="hidden" name="exportPdf">
							<button type="submit" class="btn btn-sm">EXPORTER EN PDF</button>
						</form>
					</div>
				</div>
			</section>
			<!-- Fin Status vente -->


			<!-- Achats -->
			<section class="achats-blocs" id="achats-blocs">
				<div class="achats">
					<div class="content_achats">

					</div>
				</div>



				<!-- Modal -->
				<div class="modal fade" id="modal_achats" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Validations Achats</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="validationAchatForm" method="POST">
								<div class="modal-body">
									<select class="custom-select custom-select-sm mb-3" id="validation_select" name="reponseValidation">
										<option selected value="">Selects validations</option>
										<option value="accepter">Accepter</option>
										<option value="refuser">Réfuser</option>
									</select>
									<div class="form-group" id="form_frais">
										<label>Frais de livraisons :</label>
										<input type="text" class="form-control form-control-sm" id="frais" name="frais" placeholder="Entrer frais de livraisons ex:1000">
									</div>
									<div id="nom_valider">
										<label>Réponse non valider :</label>
										<textarea class="form-control" placeholder="Entrer réponse non valider ..." id="nonValider" name="nonValider"></textarea>
									</div>
									<input type="hidden" id="idAchatValidation" name="idAchatValidation">
									<input type="hidden" value="<?php echo $_SESSION['IDPHARMACIE']; ?>" id="IDPHARMACIE" name="IDPHARMACIE">
								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-sm">valider</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="modal_reference" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-dialog-scrollable" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Validations réferences</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form method="POST" enctype="multipart/form-data" id="validationReferenceForm">
								<div class="modal-body">
									<select class="custom-select custom-select-sm mb-3" id="validation_selectReference" name="validation_selectReference">
										<option selected value="">Selects validations</option>
										<option value="accepter">Accepter</option>
										<option value="refuser">Réfuser</option>
									</select>
									<div id="form_validerReference">
										<div class="form-group">
											<label>Réponse valider :</label>
											<textarea class="form-control" placeholder="Entrer réponse valider ..." id="reponseValiderReference" name="reponseValiderReference"></textarea>
										</div>
										<div class="form-group">
											<label>Réçue :</label>
											<input type="file" class="form-control" name="recueAchat" id="recueAchat" />
										</div>
									</div>
									<div id="nom_validerReference">
										<label>Réponse non valider :</label>
										<textarea class="form-control" placeholder="Entrer réponse non valider ..." id="reponseNonValiderReference" name="reponseNonValiderReference"></textarea>
									</div>
									<input type="hidden" id="idReferenceValidation" name="idReferenceValidation">
									<input type="hidden" value="<?php echo $_SESSION['IDPHARMACIE']; ?>" id="IDPHARMACIE" name="IDPHARMACIE">
								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-sm">valider</button>
								</div>
							</form>
						</div>
					</div>
				</div>

				<!-- Modal -->
				<div class="modal fade" id="ordonnance" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog  modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-body body_ordonnance">

							</div>
							<div class="modal-footer d-flex justify-content-center">
								<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							</div>
						</div>
					</div>
				</div>

			</section>
			<!-- Fin achats -->

			<!-- Listes des Patients -->
			<section class="listesPatients-blocs" id="listesPatients-blocs">
				<div class="listesPatients overflow-auto">
					<div class="recherche_patients">
						<input type="text" id="recherche_patients" class="form-control" placeholder="Recherche ...">
					</div>
					<div class="content_listesPatients">

					</div>
				</div>

				<!--Modal Details Patients -->
				<div class="modal fade modal-detailsPatients" id="detailsPatients" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Details Patients</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body details_patients">

							</div>
						</div>
					</div>
				</div>
				<!--Fin Modal Details Patients -->


				<!--Modal Notifier Patients -->
				<div class="modal fade modal-notifierPatients" id="notifierPatients" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
					<div class="modal-dialog " role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalScrollableTitle">Notifications</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<form id="notification" method="post">
								<div class="modal-body">
									<div class="form-group">
										<select class="custom-select custom-select-sm mb-3" id="typeNotification" required>
											<option selected value="">Select types notifications</option>
											<option value="message">Message</option>
											<option value="averstissement">Avertissement</option>
										</select>
									</div>
									<div class="form-group">
										<textarea class="form-control" id="messageNotification" placeholder="Notications ..." required></textarea>
									</div>
									<input type="hidden" id="idPatientNotif">
									<input type="hidden" value="<?php echo $_SESSION['NOMPHARMACIE'];; ?>" id="nomPharmacieNotif">
									<input type="hidden" value="<?php echo $_SESSION['LOGOPHAMACIE']; ?>" id="photoPharmacieNotif">
								</div>
								<div class="modal-footer d-flex justify-content-center">
									<button type="submit" class="btn btn-sm">Envoyer</button>
								</div>
							</form>
						</div>
					</div>
				</div>
				<!--Fin Modal Notifier Patients -->

			</section>
			<!-- Fin Listes des Patients -->



			<!-- Payements -->
			<section class="payements-blocs" id="payements-blocs">
				<div class="payements">
					<ul class="nav nav-pills mb-3 nav-justified" id="pills-tab" role="tablist">

						<li class="nav-item">
							<a class="nav-link active" id="pills-home-tab" data-toggle="pill" href="#pills-peyement_pharmacie" role="tab" aria-controls="pills-peyement_pharmacie" aria-selected="true">Payements Pharmacie</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-payement_loyer" role="tab" aria-controls="pills-payement_loyer" aria-selected="false">Payements
								Loyer</a>
						</li>

					</ul>


					<div class="tab-content" id="pills-tabContent">
						<div class="tab-pane fade show active" id="pills-peyement_pharmacie" role="tabpanel" aria-labelledby="pills-home-tab">
							<div class="ajoute_payement_pharmacie d-flex justify-content-end">
								<button class="btn btn-success btn-sm btn_ajoute_payement" data-toggle="modal" data-target="#ajoutePayement">Ajouter</button>
							</div>
							<div class="table-responsive table_payement">

							</div>



							<div class="modal fade" id="ajoutePayement" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalScrollableTitle">Ajoute Payements
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="POST" id="ajoutePayementPharmacie">
											<div class="modal-body">
												<select class="custom-select custom-select-sm mb-3" name="operateurPharmacie" required>
													<option value="">Selects opérateur</option>
													<option value="Orange Money">Orange Money</option>
													<option value="Mvola">Mvola</option>
													<option value="Airtel Money">Airtel Money</option>
												</select>
												<div class="form-group">
													<label>Appartennance :</label>
													<input type="text" class="form-control form-control-sm" name="nomAppartenancePharmacie" placeholder="Entrer appartennance ..." required>
												</div>
												<div class="form-group">
													<label>Numéro :</label>
													<input type="text" class="form-control form-control-sm" name="numeroPharmacie" placeholder="Entrer numéro ..." required>
												</div>
												<input type="hidden" value="<?php echo $_SESSION['IDPHARMACIE']; ?>" id="IDPHARMACIE" name="idPharmacie">
												<div class="modal-footer d-flex justify-content-center">
													<button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
												</div>
											</div>
										</form>
									</div>
								</div>

							</div>


							<div class="modal fade" id="modifierPayement" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalScrollableTitle">Modifier Payements
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<form method="POST" id="modifierPayementPharmacie">
											<div class="modal-body">
												<select class="custom-select custom-select-sm mb-3" name="modifierOperateurPharmacie" id="modifierOperateurPharmacie" required>
													<option value="">Selects opérateur</option>
													<option value="Orange Money">Orange Money</option>
													<option value="Mvola">Mvola</option>
													<option value="Airtel Money">Airtel Money</option>
												</select>
												<div class="form-group">
													<label>Appartennance :</label>
													<input type="text" class="form-control form-control-sm" name="modifierNomAppartenancePharmacie" id="modifierNomAppartenancePharmacie" placeholder="Entrer appartennance ..." required>
												</div>
												<div class="form-group">
													<label>Numéro :</label>
													<input type="text" class="form-control form-control-sm" name="modifierNumeroPharmacie" id="modifierNumeroPharmacie" placeholder="Entrer numéro ..." required>
												</div>
												<input type="hidden" name="modifierIdPayementPharmacie" id="modifierIdPayementPharmacie">
												<div class="modal-footer d-flex justify-content-center">
													<button type="submit" class="btn btn-primary btn-sm">Modifier</button>
												</div>
											</div>
										</form>
									</div>
								</div>

							</div>
						</div>

						<div class="tab-pane fade" id="pills-payement_loyer" role="tabpanel" aria-labelledby="pills-profile-tab">
							<div class="button_loyer d-flex justify-content-between">
								<div class="select_annee">
									<select class="custom-select custom-select-sm mb-3">
										<option value="">Select année</option>
										<option value="2021">2021</option>
										<option value="2022">2022</option>
										<option value="2023">2023</option>
										<option value="2024">2024</option>
										<option value="2025">2025</option>
										<option value="2026">2026</option>
										<option value="2027">2027</option>
										<option value="2028">2028</option>
										<option value="2029">2029</option>
										<option value="2030">2030</option>
									</select>
								</div>
								<div class="button_ajoute_loyer">
									<button class="btn btn-success btn-sm" data-toggle="modal" data-target="#ajouter_loyer">Ajouter</button>
								</div>

							</div>
							<div class="content_loyer">
								<div class="table-responsive">
									<table class="table table-bordered table-striped">
										<thead class="bg-thead">
											<tr>
												<th>Mois</th>
												<th>Opérateur</th>
												<th>Réference</th>
												<th>Status</th>
											</tr>
										</thead>
										<tbody>
											<tr>
												<td align="center">Janvier</td>
												<td align="center">Orange Money</td>
												<td align="center">0326587985456121321254</td>
												<td align="center"><button class="btn btn-success btn-sm">Valider</button></td>
											</tr>
										</tbody>
									</table>
								</div>
							</div>



							<div class="modal fade" id="ajouter_loyer" tabindex="-1" role="dialog" aria-labelledby="exampleModalScrollableTitle" aria-hidden="true">
								<div class="modal-dialog modal-dialog-scrollable" role="document">
									<div class="modal-content">
										<div class="modal-header">
											<h5 class="modal-title" id="exampleModalScrollableTitle">Ajoute Loyer
											</h5>
											<button type="button" class="close" data-dismiss="modal" aria-label="Close">
												<span aria-hidden="true">&times;</span>
											</button>
										</div>
										<div class="modal-body">
											<select class="custom-select custom-select-sm mb-3">
												<option value="">Select année</option>
												<option value="2021">2021</option>
												<option value="2022">2022</option>
												<option value="2023">2023</option>
												<option value="2024">2024</option>
												<option value="2025">2025</option>
												<option value="2026">2026</option>
												<option value="2027">2027</option>
												<option value="2028">2028</option>
												<option value="2029">2029</option>
												<option value="2030">2030</option>
											</select>
											<select class="custom-select custom-select-sm mb-3">
												<option value="">Select mois</option>
												<option value="Janvier">Janvier</option>
												<option value="Fevrier">Fevrier</option>
												<option value="Mars">Mars</option>
												<option value="Avril">Avril</option>
												<option value="Mais">Mais</option>
												<option value="Juin">Juin</option>
												<option value="Juillet">Juillet</option>
												<option value="Août">Août</option>
												<option value="Septembre">Septembre</option>
												<option value="Octobre">Octobre</option>
												<option value="Novembre">Novembre</option>
												<option value="Décembre">Décembre</option>
											</select>
											<select class="custom-select custom-select-sm mb-3">
												<option selected>Selects opérateur</option>
												<option value="Orange Money">Orange Money</option>
												<option value="Mvola">Mvola</option>
												<option value="Airtel Money">Airtel Money</option>
											</select>

											<div class="form-group">
												<label>Réference :</label>
												<input type="text" class="form-control form-control-sm" id="reference" placeholder="Entrer réference ...">
											</div>
											<div class="modal-footer d-flex justify-content-center">
												<button type="submit" class="btn btn-primary btn-sm">Ajouter</button>
											</div>
										</div>
									</div>
								</div>

							</div>

						</div>
					</div>


				</div>
			</section>
			<!-- Fin Payements -->



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


			// VALIDATION ACHATS
			$('#validation_select').change(function() {
				var validation = $('#validation_select').val();
				let accepteValidation = document.getElementById('form_frais');
				let nomValidation = document.getElementById('nom_valider');
				if (validation != '' && validation == 'accepter') {
					accepteValidation.style.display = "block";
					nomValidation.style.display = "none";
				} else if (validation != '' && validation == 'refuser') {
					accepteValidation.style.display = "none";
					nomValidation.style.display = "block";
				} else {
					accepteValidation.style.display = "none";
					nomValidation.style.display = "none";
				}
			});
			// FIN VALIDATION ACHATS

			// VALIDATION REFERENCE
			$('#validation_selectReference').change(function() {
				var validation = $('#validation_selectReference').val();
				let accepteValidation = document.getElementById('form_validerReference');
				let nomValidation = document.getElementById('nom_validerReference');
				if (validation != '' && validation == 'accepter') {
					accepteValidation.style.display = "block";
					nomValidation.style.display = "none";
				} else if (validation != '' && validation == 'refuser') {
					accepteValidation.style.display = "none";
					nomValidation.style.display = "block";
				} else {
					accepteValidation.style.display = "none";
					nomValidation.style.display = "none";
				}
			});
			// FIN VALIDATION REFERENCE



			// AJOUTE MEDICAMENT
			$("#ajoute_medicament_form").on("submit", function(e) {
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/ajouteMedicament'; ?>",
					method: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
						medicament();
						setTimeout(function() {
							location.reload();
						}, 2200);

					}
				});
			});
			// FIN AJOUTE MEDICAMENT


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
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/afficheMedicament'; ?>",
					method: "POST",
					data: {
						query: search,
						medicament: "medicament",
						idPharmacie: idPharmacie,
					},
					success: function(data) {
						$('.table_medicament').html(data);
					}
				});
			}
			// FIN AFFICHE LISTES MEDICAMENTS

			// DETAILS MEDICAMENT
			$(document).on("click", "#details_medicament", function(e) {
				e.preventDefault();
				var idMedicament = $(this).attr("value");
				detaileMedicament(idMedicament);
			});

			function detaileMedicament(id) {

				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/detaileMedicament' ?>",
					method: "POST",
					data: {
						detaileMedicament: "detaileMedicament",
						idMedicament: id,
					},
					success: function(data) {
						$('.modal_detailsMedicament').html(data);
					}
				});

			}
			// FIN DETAILS MEDICAMENTF



			// SELECT ONE MEDICAMENT
			$(document).on('click', '#modifier_medicament', function(e) {
				e.preventDefault();
				var idMedicament = $(this).attr("value");
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/oneMedicament'; ?>",
					type: "post",
					dataType: "json",
					data: {
						idMedicament: idMedicament
					},
					success: function(data) {
						if (data.response == "success") {
							$("#modifierIdMedicament").val(data.post.IDMEDICAMENT);
							$("#modifierNomMedicament").val(data.post.NOMMEDICAMENT);
							$("#modifierQuantiteMedicament").val(data.post.QUANTITEMEDICAMENT);
							$("#modifierPrixMedicament").val(data.post.PRIXMEDICAMENT);
							$("#modifierArticleMedicament").val(data.post.ARTICLEMEDICAMENT);
							$("#namePhoto").val(data.post.PHOTOMEDICAMENT);
						} else {
							alert("error");
						}
					}
				});
			});
			// FIN SELECT ONE MEDICAMENT


			// MODIFIER MEDICAMENT
			$("#modifier_medicament_form").on("submit", function(e) {
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/modifierMedicament'; ?>",
					method: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
						medicament();
						setTimeout(function() {
							location.reload();
						}, 2200);


					}
				});

			});
			// FIN MODIFIER MEDICAMENT

			// SUPRIMER MEDICAMENT
			$(document).on('click', '#suprimer_medicament', function(e) {
				var idMedicament = $(this).attr("value");
				Swal.fire({
					title: 'Vous êtes sur de suprimer?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, suprimer!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/suprimerMedicament'; ?>",
							type: 'post',
							data: {
								idMedicament: idMedicament,
								suprimerMedicament: "suprimerMedicament"
							},
							success: function(data) {
								Swal.fire(
									'Suppression!',
									data,
									'success'
								);
								medicament();
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
			// FIN SUPRIMER MEDICAMENT


			// AJOUTER PAYEMENT PHARMACIE
			$("#ajoutePayementPharmacie").on("submit", function(e) {
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/ajoutePayement'; ?>",
					method: 'post',
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
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
				$('#ajoutePayementPharmacie')[0].reset();
			});
			// FIN AJOUTER PAYEMENT PHARMACIE

			// AFFICHE PAYEMENT ADMINE
			affichePayement();

			function affichePayement() {
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/affichePayement'; ?>",
					type: 'post',
					data: {
						affichePayement: "affichePayement",
						idPharmacie: idPharmacie,
					},
					success: function(data) {
						$('.table_payement').html(data);
					}
				});
			}
			// FIN AFFICHE PAYEMENT ADMINE


			// SELECT ONE MEDICAMENT
			$(document).on('click', '#getPayement', function(e) {
				e.preventDefault();
				var idPayementPharmacie = $(this).attr("value");
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/onePayement'; ?>",
					type: "post",
					dataType: "json",
					data: {
						idPayementPharmacie: idPayementPharmacie
					},
					success: function(data) {
						if (data.response == "success") {
							$("#modifierOperateurPharmacie").val(data.post.OPERATEURPAYEMENT);
							$("#modifierNomAppartenancePharmacie").val(data.post.APARTENANCEPAYEMENT);
							$("#modifierNumeroPharmacie").val(data.post.NUMERO);
							$("#modifierIdPayementPharmacie").val(data.post.IDPAYEMENTPHARMACIE);
						} else {
							alert("error");
						}
					}
				});
			});
			// FIN SELECT ONE MEDICAMENT




			// MODIFIER PAYEMENT
			$("#modifierPayementPharmacie").on("submit", function(e) {
				e.preventDefault();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/modifierPayement'; ?>",
					method: "POST",
					data: new FormData(this),
					contentType: false,
					cache: false,
					processData: false,
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


			// SUPRIMER PAYEMENT
			$(document).on('click', '#suprimerPayement', function(e) {
				var idPayementPharmacie = $(this).attr("value");
				Swal.fire({
					title: 'Vous êtes sur de suprimer?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, suprimer!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/suprimerPayement'; ?>",
							type: 'post',
							data: {
								idPayementPharmacie: idPayementPharmacie,
								suprimerPayement: "suprimerPayement"
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


			// AFFICHE PAYEMENT ADMINE
			setInterval(afficheAchat, 1000);
			afficheAchat();

			function afficheAchat() {
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/afficheAchat'; ?>",
					type: 'post',
					data: {
						afficheAchat: "afficheAchat",
						idPharmacie: idPharmacie,
					},
					success: function(data) {
						$('.content_achats').html(data);
					}
				});
			}
			// FIN AFFICHE PAYEMENT ADMINE

			// VOIR ORDONNANCE
			$(document).on('click', '#voirOrdonnance', function() {
				var idAchat = $(this).attr('value');
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/afficheOrdonnance'; ?>",
					type: 'post',
					data: {
						voirOrdonnance: "voirOrdonnance",
						idAchat: idAchat,
					},
					success: function(data) {
						$('.body_ordonnance').html(data);
					}
				});
			});
			// FIN VOIR ORDONNANCE

			// VALIDATION ACHAT
			$(document).on('click', '#validationAchat', function() {
				var idAchat = $(this).attr('value');
				$('#idAchatValidation').val(idAchat);
			});

			$("#validationAchatForm").on("submit", function(e) {
				e.preventDefault();
				var validation_select = $('#validation_select').val();
				var frais = $('#frais').val();
				var nonValider = $('#nonValider').val();
				if (validation_select != '' && validation_select == 'accepter') {
					$('#nonValider').val("");
					if (frais != '') {
						$.ajax({
							url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/validationAchat'; ?>",
							method: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								Swal.fire({
									title: 'validation avec success!',
									icon: 'success'
								});
								setTimeout(function() {
									location.reload();
								}, 2000);

							}
						});
					} else {
						Swal.fire({
							title: 'Remplir le champ frais de livraison',
							icon: 'warning'
						});
					}
				} else if (validation_select != '' && validation_select == 'refuser') {
					$('#frais').val("");
					if (nonValider != '') {
						$.ajax({
							url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/validationAchat'; ?>",
							method: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								Swal.fire({
									title: 'validation avec success!',
									icon: 'success'
								});
								setTimeout(function() {
									location.reload();
								}, 2000);

							}
						});
					} else {
						Swal.fire({
							title: 'Remplir le champ reponse non valider',
							icon: 'warning'
						});
					}
				} else {
					Swal.fire({
						title: 'Selectionner la validation!',
						icon: 'warning'
					});
				}

				$('#validationAchatForm')[0].reset();

			});
			// FIN VALIDATION ACHAT



			// VALIDATION REFERENCE
			$(document).on('click', '#validationReference', function() {
				var idAchat = $(this).attr('value');
				$('#idReferenceValidation').val(idAchat);
			});

			$("#validationReferenceForm").on("submit", function(e) {
				e.preventDefault();
				var validation_select = $('#validation_selectReference').val();
				var reponseValider = $('#reponseValiderReference').val();
				var recue = $('#recueAchat').val();
				var reponseNonValider = $('#reponseNonValiderReference').val();
				if (validation_select != '' && validation_select == 'accepter') {
					$('#reponseNonValiderReference').val("");
					if (reponseValider != '' && recue != '') {
						$.ajax({
							url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/validationReference'; ?>",
							method: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								Swal.fire({
									title: 'validation avec success!',
									icon: 'success'
								});
								setTimeout(function() {
									location.reload();
								}, 2000);


							}
						});
					} else {
						Swal.fire({
							title: 'Remplir tous les champs',
							icon: 'warning'
						});
					}
				} else if (validation_select != '' && validation_select == 'refuser') {
					$('#reponseValiderReference').val("");
					$('#recue').val("");
					if (reponseNonValider != '') {
						$.ajax({
							url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/validationReference'; ?>",
							method: "POST",
							data: new FormData(this),
							contentType: false,
							cache: false,
							processData: false,
							success: function(data) {
								Swal.fire({
									title: 'validation avec success!',
									icon: 'success'
								});
								setTimeout(function() {
									location.reload();
								}, 2000);

							}
						});
					} else {
						Swal.fire({
							title: 'Remplir le champ reponse non valider',
							icon: 'warning'
						});
					}
				} else {
					Swal.fire({
						title: 'Selectionner la validation!',
						icon: 'warning'
					});
				}


				$('#validationReferenceForm')[0].reset();
			});
			// FIN VALIDATION REFERENCE


			// SELECT COUNT ACHAT
			afficheCountAchat();
			setInterval(afficheCountAchat, 1000);

			function afficheCountAchat() {
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/afficheCountAchat'; ?>",
					type: 'post',
					data: {
						afficheCountAchat: "afficheCountAchat",
						idPharmacie: idPharmacie,
					},
					success: function(data) {
						$('.badge_Achat').html(data);
					}
				});
			}
			// FIN SELECT COUNT ACHAT

			// MODIFIER COUNT ACHAT
			$(document).on('click', '#open_achats', function() {
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/modifierCountAchat'; ?>",
					type: 'post',
					data: {
						modifierCountAchat: "modifierCountAchat",
						idPharmacie: idPharmacie,
					},
					success: function(data) {
						afficheCountAchat();
					}
				});
			});
			// FIN MODIFIER COUNT ACHAT

			// AFFICHE LISTES PATIENTS
			$('#recherche_patients').keyup(function() {
				var search = $(this).val();
				if (search != '') {
					patient(search);
				} else {
					patient();
				}
			});
			patient();

			// patient();
			function patient(search) {
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/affichePatient'; ?>",
					method: "POST",
					data: {
						query: search,
						patient: "patient"
					},
					success: function(data) {
						$('.content_listesPatients').html(data);
					}
				});
			}
			// FIN AFFICHE LISTES PATIENTS
			// CLICK AFFICHE DETAILS PATIENTS
			$(document).on("click", "#detailsPatient", function(e) {
				e.preventDefault();
				var idPatient = $(this).attr("value");
				detailsPatient(idPatient);
			});

			function detailsPatient(idPatient) {
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/detailsPatient'; ?>",
					type: 'post',
					data: {
						idPatient: idPatient
					},
					success: function(data) {
						$('.details_patients').html(data);
					}
				});
			}
			// FIN AFFICHE DETAILS PATIENTS

			// CLICK NOTIF PATIENTS
			$(document).on("click", "#notificationPatient", function(e) {
				e.preventDefault();
				var idPatient = $(this).attr("value");
				$('#idPatientNotif').val(idPatient);
			});
			// FIN

			// AJOUTER NOTIFICATION

			$("#notification").on("submit", function(e) {
				e.preventDefault();
				var typeNotification = $('#typeNotification').val();
				var messageNotification = $('#messageNotification').val();
				var idPatientNotif = $('#idPatientNotif').val();
				var nomPharmacieNotif = $('#nomPharmacieNotif').val();
				var photoPharmacieNotif = $('#photoPharmacieNotif').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/ajouteNotification'; ?>",
					type: 'post',
					data: {
						typeNotification: typeNotification,
						messageNotification: messageNotification,
						idPatientNotif: idPatientNotif,
						nomPharmacieNotif: nomPharmacieNotif,
						photoPharmacieNotif: photoPharmacieNotif,
						ajouteNotif: "ajoutNotif"
					},
					success: function(data) {
						Swal.fire({
							title: data,
							icon: 'success'
						});
						setTimeout(function() {
							location.reload();
						}, 2200);

					}
				});
				$('#notification')[0].reset();
			});
			// FIN AJOUTER NOTIFICATION

            // SUPRIMER PATIENT
			$(document).on('click','#idPatientSuprimer',function(){
               var idPatient=$(this).attr('value');
			   Swal.fire({
					title: 'Vous êtes sur de suprimer?',
					icon: 'warning',
					showCancelButton: true,
					confirmButtonText: 'Oui, suprimer!',
					cancelButtonText: 'Non, annuler'
				}).then((result) => {
					if (result.value) {
						$.ajax({
							url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/suprimerPatient'; ?>",
							type: 'post',
							data: {
								idPatient: idPatient,
								suprimerPatient: "suprimerPatient"
							},
							success: function(data) {
								Swal.fire(
									'Suppression!',
									data,
									'success'
								);
								patient();
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
			// FIN SUPRIMER PATIENT


			// AFFICHE VENTE
			vente();

			function vente() {
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/afficheVente'; ?>",
					method: "POST",
					data: {
						idPharmacie: idPharmacie,
						vente: "vente"
					},
					success: function(data) {
						$('.statusVente_liste').html(data);
					}
				});
			}
			// FIN AFFICHE VENTE


			// AFFICHE VENTE ANNE
			$('.selectVenteAnne').change(function() {
				var anne = $('.selectVenteAnne').val();
				var idPharmacie = $('#IDPHARMACIE').val();
				let mois = document.getElementById('selectVenteMois');
				if (anne != '') {
					$('#anneMois').val(anne);
					$('#anneVente').val(anne);
					$('#moisVente').val("");
					mois.style.display = "block";
					$('.selectVenteMois').append('');
					$.ajax({
						url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/afficheVenteAnne'; ?>",
						type: 'post',
						data: {
							idPharmacie: idPharmacie,
							anne: anne,
						},
						success: function(data) {
							$('.statusVente_liste').html(data);
						}
					});
				} else {
					vente();
					$('#anneMois').val("");
					$('#anneVente').val("");
					$('#moisVente').val("");
					mois.style.display = "none";


				}
			});
			// FIN AFFICHE VENTE ANNE


			// AFFICHE VENTE MOIS
			$('.selectVenteMois').change(function() {
				var mois = $('.selectVenteMois').val();
				var idPharmacie = $('#IDPHARMACIE').val();
				var anneVente = $('#anneMois').val();
				if (anneVente != '') {
					if (mois != '') {
						$('#moisVente').val(mois);
						$.ajax({
							url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/afficheVenteMois'; ?>",
							type: 'post',
							data: {
								idPharmacie: idPharmacie,
								mois: mois,
							},
							success: function(data) {
								$('.statusVente_liste').html(data);
							}
						});
					} else {
						venteAnne(anneVente);
						$('#moisVente').val("");

					}
				} else {
					Swal.fire('Oops...', 'Selectionner l\'année!', 'error');
				}
			});
			// FIN AFFICHE VENTE MOIS

			// FIN REAFFICHE VENTE ANNE
			function venteAnne(anne) {
				var idPharmacie = $('#IDPHARMACIE').val();
				$.ajax({
					url: "<?php echo base_url() . 'admin/pharmacie/Pharmacie_controlleur/afficheVenteAnne'; ?>",
					type: 'post',
					data: {
						idPharmacie: idPharmacie,
						anne: anne,
					},
					success: function(data) {
						$('.statusVente_liste').html(data);
					}


				});
			}
			// FIN REAFFICHE VENTE ANNE

			// SUBMIT PDF VENTE
			$(document).on('submit', '#venteForm', function(e) {
				var anne = $('#anneVente').val();
				if (anne == '') {
					Swal.fire('Oops...', 'Selectionner l\'année!', 'error');
					e.preventDefault();
				} else {
					setTimeout(function() {
						$('.selectVenteAnne')[0].reset();
					}, 3000);

				}
			});
			// FIN SUBMIT PDF VENTE

			reactualiseAnne();
            setInterval(reactualiseAnne,1000);
			function reactualiseAnne() {
				var anne = $('.selectVenteAnne').val();
				var mois = $('.selectVenteMois').val();
				let moisSelect = document.getElementById('selectVenteMois');
				$('#anneVente').val(anne);
				$('#anneMois').val(anne);
				$('#moisVente').val(mois);
				if(anne != ''){
					moisSelect.style.display = "block";
				}
                
			}

		});

		$(document).ready(function() {

			let profile = document.getElementById('profile-blocs'),
				openProfile = document.getElementById('open_profile');

			openProfile.addEventListener('click', function() {
				profile.style.display = "block";
				gererProduit.style.display = "none";
				statusVente.style.display = "none";
				achats.style.display = "none";
				payements.style.display = "none";
				patient.style.display = "none";

			});


			let gererProduit = document.getElementById('gererProduit-blocs'),
				openGererProduit = document.getElementById('open_gererProduit');

			openGererProduit.addEventListener('click', function() {
				gererProduit.style.display = "block";
				profile.style.display = "none";
				statusVente.style.display = "none";
				achats.style.display = "none";
				payements.style.display = "none";
				patient.style.display = "none";

			});



			let statusVente = document.getElementById('statusVente-blocs'),
				openStatusVente = document.getElementById('open_statusVente');

			openStatusVente.addEventListener('click', function() {
				statusVente.style.display = "block";
				gererProduit.style.display = "none";
				profile.style.display = "none";
				achats.style.display = "none";
				payements.style.display = "none";
				patient.style.display = "none";

			});



			let achats = document.getElementById('achats-blocs'),
				openAchats = document.getElementById('open_achats');

			openAchats.addEventListener('click', function() {
				achats.style.display = "block";
				statusVente.style.display = "none";
				profile.style.display = "none";
				gererProduit.style.display = "none";
				payements.style.display = "none";
				patient.style.display = "none";

			});


			let patient = document.getElementById('listesPatients-blocs'),
				openPatient = document.getElementById('open_patients');

			openPatient.addEventListener('click', function() {
				patient.style.display = "block";
				achats.style.display = "none";
				statusVente.style.display = "none";
				profile.style.display = "none";
				gererProduit.style.display = "none";
				payements.style.display = "none";

			});




			let payements = document.getElementById('payements-blocs'),
				openPayements = document.getElementById('open_payements');

			openPayements.addEventListener('click', function() {
				payements.style.display = "block";
				achats.style.display = "none";
				statusVente.style.display = "none";
				profile.style.display = "none";
				gererProduit.style.display = "none";
				patient.style.display = "none";


			});



		});
	</script>
</body>

</html>
