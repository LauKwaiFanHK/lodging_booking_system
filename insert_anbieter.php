<?php
    // need to return a AnbieterID for upload photo
    include_once 'connect_db.php';
    $Name = $_POST['Name'];
    $Passwort = $_POST['Passwort'];
    $URL = $_POST['URL'];
    $Unterkunftskategorie = implode(',', $_POST[checkbox]);

    $sql = "INSERT INTO Unterkunftsanbieter (Name,Passwort,URL,Unterkunftskategorie)
	 VALUES ('$Name','$Passwort','$URL','" . $Unterkunftskategorie . "')";
	 if (mysqli_query($conn, $sql)) {
        echo " New record created successfully !";
        $last_id = $conn->insert_id;
        header('Location: anbieter_profilbild_form.php?AnbieterID=' . $last_id);
	 } else {
		echo " Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 mysqli_close($conn);

    ?>