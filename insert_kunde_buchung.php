<?php
include_once 'connect_db.php';
include_once 'kunde_lib.php';

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

$KundeID = $_POST['KundeID'];
$AnbeiterID = $_POST['AnbieterID'];
$ZimmerID = $_POST['ZimmerID'];
$city = $_POST['city'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$NumberOfGuests = $_POST['NumberOfGuests'];
$Betrag = $_POST['Betrag'];
$Zahlungsmittel = $_POST['checkbox'];
//$BuchungID = getBuchungID($conn, $KundeID, $checkin, $checkout);
//echo $BuchungID;

$sql = "INSERT INTO Buchung (Reiseziel,CheckInDatum, CheckOutDatum, AnzahlDerReisenden, Betrag)
	 VALUES ('$city','$checkin','$checkout','$NumberOfGuests','$Betrag')";

if (mysqli_query($conn, $sql)) {
	$last_id = $conn->insert_id; echo "$last_id";

	$sql2 = "INSERT INTO Bucht (ZimmerID, BuchungID, KundeID)
	VALUES ('$ZimmerID','$last_id','$KundeID')";

	if (mysqli_query($conn, $sql2)) {

		$sql3 = "INSERT INTO Bezahlt (BuchungID, KundeID, AnbieterID, Zahlungsmittel)
		VALUES ('$last_id','$KundeID','$AnbeiterID', '$Zahlungsmittel')";

		if (mysqli_query($conn, $sql3)) {
			
			$sql4 = "INSERT INTO Bewertet(BuchungID, KundeID, AnbieterID)
			VALUES ('$last_id','$KundeID','$AnbeiterID')";

				if (mysqli_query($conn, $sql4)) {

					echo "New record created successfully !";
				}
		}
	}
} else {
	echo "Error: " . $sql . "
" . mysqli_error($conn);
}
header('Location: reisende_buchungshistorie.php?KundeID=' . $KundeID . "&BuchungID=" . $last_id);
