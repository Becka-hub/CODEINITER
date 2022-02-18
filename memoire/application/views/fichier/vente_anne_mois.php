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
			margin-top: 40px;
			margin-bottom: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
		}

		#container {
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}

		table {
			font-family: arial, sans-serif;
			border-collapse: collapse;
			width: 100%;
		}

		th {
			border: 1px solid #dddddd;
			text-align: center;
			padding-top: 15px;
			padding-bottom: 15px;
			padding-left: 20px;
			padding-right: 20px;
			background-color: #00ff00;
			color: #f8f8ff;
		}

		td {
			border: 1px solid #dddddd;
			text-align: center;
			font-size: 13px;
			padding-left: 5px;
			padding-right: 5px;
			padding-top: 5px;
			padding-bottom: 5px;
		}
	</style>
</head>

<body>
	<div id="container">
		<div id="content">
			<table>
				<tr>
					<th>N°</th>
					<th>IDPatients</th>
					<th>Médicaments</th>
					<th>Prix</th>
					<th>Frais</th>
					<th>Totals</th>
				</tr>
				<tbody>
					<?php
					$patientVente = 0;
					$vente = 0;
					$venteFrais = 0;
					$id = 1;
					if ($data->num_rows() > 0) {
						foreach ($data->result() as $row) {
							$patientVente = $row->PRIXVENTE + $row->FRAISLIVRAISON;
					?>
							<tr>
								<td><?php echo $id++; ?></td>
								<td><?php echo $row->IDPATIENT; ?></td>
								<td><?php echo $row->MEDICAMENTVENTE; ?></td>
								<td><?php echo $row->PRIXVENTE ?> Ar</td>
								<td><?php echo $row->FRAISLIVRAISON; ?> Ar</td>
								<td><?php echo $patientVente; ?> Ar</td>
							</tr>
						<?php
							$vente += $row->PRIXVENTE;
							$venteFrais += $patientVente;
						}
						?>
						<tr>
							<td colspan="3" style="padding:10px; background-color:#b8860b; color: #f8f8ff;">
								Totals prix médicaments : <?php echo $vente; ?> Ar
							</td>
							<td colspan="3" style="padding:10px; background-color:#b8860b; color: #f8f8ff;">
								Totals prix médicaments + frais : <?php echo $venteFrais; ?> Ar
							</td>
						</tr>
					<?php
					} else {
					?>
						<tr>
						<td colspan="6" style="padding:10px; background-color:#b8860b; color: #f8f8ff;">
							Pas de vente !
						</td>
					</tr>
					<?php
					}
					?>



				</tbody>
			</table>
		</div>
	</div>

</body>

</html>
