<?php
    // need to return a AnbieterID for upload photo
    include_once 'connect_db.php';
    $Nachname = $_POST['nachname'];
    $Vorname = $_POST['vorname'];
    $Passwort = $_POST['password'];
    $Email = $_POST['email'];

    $sql = "INSERT INTO Kunde (Nachname,Vorname,Passwort,Email)
	 VALUES ('$Nachname','$Vorname','$Passwort','$Email')";
	 if (mysqli_query($conn, $sql)) {
        echo " New record created successfully !";
        $last_id = $conn->insert_id;
        header('Location: kunde_suchseite.php?KundeID=' . $last_id);
	 } else {
		echo " Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);

    ?>