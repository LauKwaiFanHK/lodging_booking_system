<?php
require_once('kunde_lib.php');
require_once('connect_db.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<title>Unterkunftsanbieter Suchen</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
	<link rel="stylesheet" href="kunde_suchseite.css">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>
	<?php
	$KundeID = $_GET["KundeID"];
	?>

	<nav class="navbar navbar-inverse">
		<div class="container-fluid">
			<div class="navbar-header">
				<!--img id="mylogo" src="untitled.png" width="200" class="center" alt="Logo des Buchungsplattforms"-->
				<<a class="navbar-brand" href="#">FeelsLikeHome</a>
			</div>
			<ul class="nav navbar-nav navbar-right">
				<li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-euro"></span> Währung auswählen<span class="caret "></span></a>
					<ul class="dropdown-menu">
						<li><a href="#">Europa – Euro</a></li>
					</ul>
				</li>
				<li><a href="kunde_hilfe.php?KundeID=<?php echo $KundeID ?>"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
				<li class="dropdown" style="width:auto"><a class="dropdown-toggle" data-toggle="dropdown" href="kunde_suchseite.php?KundeID=<?php echo $KundeID?>"><span class="glyphicon glyphicon-user"></span><?php echo getKundeVorname($conn, $KundeID) . " " . getKundeNachname($conn, $KundeID) ?><span class="caret"></span></a>
					<ul class="dropdown-menu">
						<li><a href="reisende_konto_verwalten.php?KundeID=<?php echo $KundeID ?>">Profil</a></li>
						<li><a href="reisende_buchungshistorie.php?KundeID=<?php echo $KundeID ?>">Buchungshistorie</a></li>
					</ul>
				</li>
				<li><a href="kunde_logout.php"><span class="glyphicon glyphicon-log-in"></span> Ausloggen</a></li>
			</ul>
		</div>
	</nav>

	<div class="container">
		<form action="kunde_showResult.php?KundeID=<?php echo $KundeID ?>&page=1" method="post">
		<input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
			<div class="card" style="width: 100rem;">
				<div class="card-body">
					<div class="row">
						<?php
						$result = mysqli_query($conn, "SELECT DISTINCT Stadt FROM Gebäude");
						?>
						<div class="col-md-2">
							<label>Reiseziel</label>
							<select name="city" class="form-control">
								<?php while ($cities = mysqli_fetch_row($result)) {
									foreach ($cities as $key => $city) { ?>

										<option <?= ($key == 0) ? 'selected' : '' ?> value="<?= $city ?>"><?= $city ?></option>
								<?php }
								} ?>
							</select>
						</div>
						<div class="col-md-3">
							<label>Checkin-Datum</label>
							<input type="date" class="form-control" name="checkin">
						</div>
						<div class="col-md-3">
							<label>Checkout-Datum</label>
							<input type="date" class="form-control" name="checkout">
						</div>
						<div class="col-md-1">
							<label>Gäste</label>
							<input type="number" class="form-control" name="numberOfGuests" placeholder="1" min="1">
						</div>
						<div class="col-md-3 text-center custom-control custom-checkbox">
							<label>Reiseempfehlung anzeigen? &nbsp;&nbsp; &nbsp;</label>
							<input type="checkbox" value ="yes" class="custom-control-input" name="Sehenswurdigkeiten" id="customCheck1" data-toggle="tooptip" data-placement="bottom" title="Wählen Sie aus, um die Things-to-do in der Nähe anzusehen." style=width:20px;height:20px>
						</div>
					</div>
					<br>
					<div class="row">
						<div class="text-center">
							<button type="submit" class="btn btn-success">
								suchen</button>
						</div>
					</div>
					<br>
				</div>
			</div>
		</form>
	</div>

</body>

</html>
<?php mysqli_close($conn); ?>