<?php
include_once 'connect_db.php';
include_once 'anbieter_lib.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$AnbieterID = $_POST['AnbieterID'];
	$Nachricht = $_POST['Nachricht'];
	updateAnbieterNachricht($conn, $AnbieterID, $Nachricht);
	header('Location: anbieter_über_uns.php?AnbieterID=' . $AnbieterID);
}

?>