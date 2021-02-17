<?php
include_once 'connect_db.php';
include_once 'anbieter_lib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$AnbieterID = $_POST['AnbieterID'];
	$GebäudeID = $_POST['GebäudeID'];
	$hausnummer = $_POST['hausnummer'];
	$Straße = $_POST['Straße'];
	$PLZ = $_POST['PLZ'];
	$Stadt = $_POST['Stadt'];
	$Bundesland = $_POST['Bundesland'];
	$Land = $_POST['Land'];
	$Telefonnummer = $_POST['Telefonnummer'];

	updateAnbieterGebaeude($conn, $GebäudeID, $hausnummer, $Straße, $PLZ, $Stadt, $Bundesland, $Land, $Telefonnummer);
	header('Location: anbieter_über_uns.php?AnbieterID=' . $AnbieterID . '&GebäudeID=' . $GebäudeID);
}

?>