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

		.nomPharmacie {
			color: #32cd32;
			margin-bottom: -5px;
			font-size: 25px;
		}

		.adressePharmacie {
			font-size: 18px;
			margin-top:10px;
			margin-bottom:-10px;
			
		}

		.contactPharmacie {
			font-size: 16px;
			margin-top:10px;
		}

		#body {
			padding: 5px;
		}

		.logo{
			margin-left: 460px;
			max-width:200px;
			max-height:auto;
			display:block;
			margin-top:-10px;
		}
		#bloc1{
			margin-top:-150px;
		}
		.merci{
			font-size:18px;
			text-align:center;
			margin-bottom:-0px;
		}
		.Patient{
			font-size:14px;
			text-align:center;
			margin-top:10px;
		}
		.content_achat{
			margin-top:-20px;
		}
		.medicament{
			font-size:13px;
			margin-bottom:-0px;
		}
		.prix{
			font-size:13px;
			margin-top:5px;
			margin-bottom:-0px;
		}
		.frais{
			font-size:13px;
			margin-top:5px;
			margin-bottom:-0px;
		}
		.total{
			font-size:13px;
			margin-top:5px;
			margin-bottom:-0px;
		}
		.payement{
			font-size:13px;
			margin-top:5px;
			margin-bottom:-0px;
		}
		.operateur{
			margin-top:10px;
		}
		.reference{
			font-size:13px;
			margin-top:5px;
			margin-bottom:30px;
		}
	</style>
</head>

<body>
	<div id="container">
		<div id="content">
			<div id="header">
			<div id="bloc2">
			<img src="<?php echo base_url() . 'upload/pharmacie/' . $logoPharmacie; ?>" class="logo" alt="image" />
				</div>
				<div id="bloc1">
					<h2 class="nomPharmacie">Pharmacie <?php echo $pharmacie; ?></h2>
					<h4 class="adressePharmacie"><?php echo $adressePharmacie; ?></h4>
					<h4 class="contactPharmacie">Contact : <?php echo $telephonePharmacie; ?></h4>
				</div>
			</div>
			<div id="body">
				<div class="content_patient">
					<div class="descrptionPatient">
						<h4 class="merci">Merci pour votre achat !</h4>
						<h5 class="Patient"><?php echo $nomPatient." ".$prenomPatient; ?></h5>
					</div>
				</div>
				<div class="content_achat">
                 <h6 class="medicament">Médicament achetées : <?php echo $medicament; ?></h6>
				 <hr>
				 <h6 class="prix">Prix totals du médicaments : <?php echo $prix; ?> Ar</h6>
				 <hr>
				 <h6 class="frais">Frais de livraison : <?php echo $frais; ?> Ar</h6>
				 <hr>
				 <?php
				 $totals=$prix + $frais;
				 ?>
				 <h6 class="total">Totals : <?php echo $totals; ?> Ar</h6>
				 <hr>
				 <h6 class="payement">Payement :</h6>
				 <?php
				 if($operateur=='Orange Money'){
				 ?>
					<img src="<?php echo base_url('assets/image/orange.png');?>" class="operateur" width="140" height="50"  alt="image" />
				<?php
				 }elseif($operateur=='Mvola'){
				 ?>
				 <img src="<?php echo base_url('assets/image/telma.png'); ?>" class="operateur" width="140" height="50"  alt="image" />
				 <?php 
				 }else{
				 ?>
				 <img src="<?php echo base_url('assets/image/airtel.jpg'); ?>" class="operateur" width="140" height="50"  alt="image" />
				 <?php
				 }
				 ?>
				 <h6 class="reference">Réference du payement : <?php echo $reference; ?></h6>
				</div>

			</div>
		</div>
	</div>

</body>

</html>
