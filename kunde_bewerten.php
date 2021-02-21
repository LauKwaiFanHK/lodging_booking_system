<?php
    include_once 'connect_db.php';
    $AnbieterID = $_POST['AnbieterID']; echo $AnbieterID;
    $KundeID = $_POST['KundeID']; echo $KundeID;
    $BuchungID = $_POST['BuchungID']; echo $BuchungID;
    $Punkte = $_POST['Punkte']; echo $Punkte;

    $sql = "UPDATE Bewertet SET Punkte = '$Punkte' WHERE BuchungID = '$BuchungID'";
	 if (mysqli_query($conn, $sql)) {
        echo " New record created successfully !";
        header('Location: reisende_buchungshistorie.php?KundeID=' . $KundeID);
	 } else {
		echo " Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);

    ?>