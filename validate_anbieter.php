<?php

include_once 'connect_db.php';

function checkUserExists($conn, $anbietername, $passwort)
{

    $query = sprintf("select * from Unterkunftsanbieter where Name=\"%s\" and Passwort=\"%s\"", $anbietername, $passwort);
    $result = mysqli_query($conn, $query);

    return (mysqli_num_rows($result) > 0);
}

?>
