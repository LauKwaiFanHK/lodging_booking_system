<?php
include_once 'connect_db.php';
include_once 'kunde_lib.php';

echo $_SERVER['REQUEST_METHOD'];
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $KundeID = $_POST['KundeID'];
	$Vorname = $_POST['Vorname'];
	$Nachname = $_POST['Nachname'];
	$Passwort = $_POST['Passwort'];
	$Email = $_POST['Email'];

	updateKunde($conn, $KundeID, $Vorname, $Nachname, $Passwort, $Email);
	header('Location: reisende_konto_verwalten.php?KundeID=' . $KundeID);
} else {
    echo "Error: data cannot be edited.";
}


?>
