<?php
include_once 'connect_db.php';

$AnbieterID = $_POST['AnbieterID']; echo $AnbieterID;
$hausnummer = $_POST['hausnummer'];
$Straße = $_POST['Straße'];
$Stadt = $_POST['Stadt'];
$Bundesland = $_POST['Bundesland'];
$PLZ = $_POST['PLZ'];
$Land = $_POST['Land'];
$Telefonnummer = $_POST['Telefonnummer'];
$sql = "INSERT INTO Gebäude (hausnummer,Straße,Stadt,Bundesland,PLZ,Land,Telefonnummer)
     VALUES ('$hausnummer','$Straße','$Stadt','$Bundesland','$PLZ','$Land','$Telefonnummer')";

if (mysqli_query($conn, $sql)) {
    echo " New record created successfully !";
    $last_id = $conn->insert_id;
    header('Location: anbieter_über_uns.php?AnbieterID=' . $AnbieterID . "&GebäudeID=" . $last_id);
    
} else {
    echo " Error: " . $sql . "
" . mysqli_error($conn);
}

mysqli_close($conn);
