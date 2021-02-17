<?php

include_once 'connect_db.php';

function checkUserExists($conn, $kundename, $passwort)
{

    $query = sprintf("select * from Kunde where Nachname=\"%s\" and Passwort=\"%s\"", $kundename, $passwort);
    $result = mysqli_query($conn, $query);

    return (mysqli_num_rows($result) > 0);
}

?>