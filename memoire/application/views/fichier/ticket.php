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
			display: flex;
			padding: 5px;
			border-bottom: 1px solid #D0D0D0;
		}

		.nomClinique {
			color: #32cd32;
			margin-bottom: -5px;
			font-size: 25px;
		}

		.adresseClinique {
			font-size: 18px;
			margin-top: 10px;
			margin-bottom: -10px;

		}

		.contactClinique {
			font-size: 16px;
			margin-top: 10px;
		}

		#body {
			padding: 5px;
		}

		.logo {
			margin-left: 460px;
			max-width: 200px;
			max-height: auto;
			display: block;
			margin-top: -10px;
		}

		#bloc1 {
			margin-top: -150px;
		}

		.Patient {
			font-size: 14px;
			margin-top: 10px;
		}

		.descrptionPatient {
			border-bottom: 1px solid #D0D0D0;
		}
		.declaration{
			font-size: 14px;
			margin-top: 10px;
		}
		.ponctuelle{
			font-size: 14px;
			margin-top: 10px;
			text-align: center;
		}
	</style>
</head>

<body>
	<div id="container">
		<div id="content">
			<div id="header">
				<div id="bloc2">
					<img src="<?php echo base_url() . 'upload/clinique/' . $logoClinique; ?>" class="logo" alt="image" />
				</div>
				<div id="bloc1">
					<h2 class="nomClinique"><?php echo $nomClinique; ?></h2>
					<h4 class="adresseClinique"><?php echo $adresseClinique; ?></h4>
					<h4 class="contactClinique">Contact : <?php echo $telephoneClinique; ?></h4>
				</div>
			</div>
			<div id="body">
				<div class="content_patient">
					<div class="descrptionPatient">
						<h5 class="Patient">Patient: <?php echo $nomPatient . " " . $prenomPatient; ?></h5>
						<h5 class="Patient">Adresse: <?php echo $adressePatient; ?></h5>
						<h5 class="Patient">Téléphone: <?php echo $telephonePatient; ?></h5>
					</div>
					<div class="rendezVous">
						<h5 class="Patient">Date prise: <?php echo $datePrise; ?></h5>
						<h5 class="Patient">Heure prise: <?php echo $heurePrise; ?></h5>
					</div>
					<div class="declaration">
					<h5 class="declaration">Si vous annulez le rendez-vous contacter avant le jour le numéro <?php echo $telephoneClinique;?>, merci de votre coopération!</h5>
					<h5 class="ponctuelle">Soyez Poctuelle !</h5>
					</div>
				</div>


			</div>
		</div>
	</div>

</body>

</html>
