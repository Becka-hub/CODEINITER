<?php
defined('BASEPATH') or exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<title>Ordonnance</title>

	<style type="text/css">
		::selection {
			background-color: #E13300;
			color: white;
		}

		::-moz-selection {
			background-color: #E13300;
			color: white;
		}

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}

		#content {
			margin: 0 15px 0 15px;
		}

		#header {
			display:flex;
			padding: 5px;
			border-bottom: 1px solid #D0D0D0;
		}

		.nomClinique {
			color: #32cd32;
			margin-bottom: -5px;
			font-size: 25px;
		}

		.nomDocteur {
			font-size: 18px;
			margin-top:10px;
			margin-bottom:-10px;
			
		}

		.contactDocteur {
			font-size: 16px;
			margin-top:10px;
		}

		#body {
			padding: 15px;
		}

		.content_patient {
			display: flex;
		}

		.descrptionPatient {
			margin-left: 200px;
			margin-top: -200px;
			margin-bottom: -20px;
		}

		.date_ordonnance {
			margin-top: 2px;
		}
		.patient_date{
			font-size: 15px;
			margin-bottom: -20px;
		}
		.patient_délais {
			font-size: 15px;
			margin-top:5px;
		}
		.ordonnance{
			padding: 5px;
			border: 2px solid #32cd32;
			margin-bottom: 20px;
		}
		.messageOrdonnance{
			font-size: 15px;
			margin-top:10px;
			margin-bottom:10px;
		}
		.logo{
			margin-left: 460px;
			max-width:200px;
			max-height:auto;
			display:block;
		}
		#bloc1{
			margin-top:-130px;
		}
		.Patient{
			font-size:14px;
		}
	</style>
</head>

<body>
	<div id="container">
		<div id="content">
			<div id="header">
			<div id="bloc2">
					<img class="logo" src="<?php echo base_url('assets/image/logo.png'); ?>"/>
				</div>
				<div id="bloc1">
					<h2 class="nomClinique">Centre Médicale <?php echo $cliniqueDocteur; ?></h2>
					<h4 class="nomDocteur">DOCTEUR <?php echo $nomDoctuer . " " . $prenomDocteur; ?></h4>
					<h4 class="contactDocteur">Contact : <?php echo $telephoneDocteur; ?></h4>
				</div>
			</div>
			<div id="body">
				<div class="content_patient">
					<div class="photoPatient">
						<img src="<?php echo base_url() . 'upload/patient/' . $photoPatient; ?>" width="180px" alt="image" />
					</div>
					<div class="descrptionPatient">
						<h5 class="Patient">NOM : <?php echo $nomPatient; ?></h5>
						<h5 class="Patient">PRENOM : <?php echo $prenomPatient; ?></h5>
						<h5 class="Patient">ADRESSE : <?php echo $adressePatient; ?></h5>
						<h5 class="Patient">TELEPHONE : <?php echo $telephonePatient; ?></h5>
						<h5 class="Patient">ADRESSE MAIL : <?php echo $mailPatient; ?></h5>
					</div>
				</div>
				<div class="content_ordonnance">
					<div class="date_ordonnance">
						<h5 class="patient_date">Date de création d'ordonnance : <?php echo $dateOrdonnance; ?></h5>
						<h5 class="patient_délais">Delais d'ordonnance : <?php echo $delaisOrdonnance; ?></h5>
					</div>
					<div class="ordonnance">
						<h6 class="messageOrdonnance"><?php echo $messageOrdonnance; ?></h6>
					</div>
				</div>
			</div>
		</div>
	</div>

</body>

</html>
