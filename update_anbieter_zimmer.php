<?php
include_once 'connect_db.php'; echo "xxx";
include_once 'anbieter_lib.php'; echo "yyy";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $AnbieterID = $_POST['AnbieterID'];
    $GebäudeID = $_POST['GebäudeID'];
    $ZimmerID = $_POST['ZimmerID'];
	$Zimmerkategorie = $_POST['Zimmerkategorie'];
	$Zimmernummer = $_POST['Zimmernummer'];
	$Etage = $_POST['Etage'];
	$Kapazität = $_POST['Kapazität'];
	$Größe = $_POST['Größe'];
	$Ausstattung = $_POST['Ausstattung'];
    $Preis = $_POST['Preis'];
    echo "aaa";
    echo $ZimmerID;
    echo $Zimmerkategorie;
    echo $Zimmernummer;
    echo $Etage;
    echo $Kapazität;
    echo $Größe;
    echo $Ausstattung;
    echo $Preis;

	updateZimmer($conn, $ZimmerID, $Zimmerkategorie, $Zimmernummer, $Etage, $Kapazität, $Größe, $Ausstattung, $Preis);
	header('Location: anbieter_über_uns.php?AnbieterID=' . $AnbieterID . '&GebäudeID=' . $GebäudeID);
} else {
    echo "bbb";
}

?>