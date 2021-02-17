<?php
include_once 'connect_db.php';

function getKundeVorname($conn, $KundeID)
{
    $Vorname = "";
    $sql = "SELECT Vorname from Kunde
                WHERE KundeID = $KundeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Vorname = $row['Vorname'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Vorname;
}

function getKundeNachname($conn, $KundeID)
{
    $Nachname = "";
    $sql = "SELECT Nachname from Kunde
                WHERE KundeID = $KundeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Nachname = $row['Nachname'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Nachname;
}

function getKundePasswort($conn, $KundeID)
{
    $Passwort = "";
    $sql = "SELECT Passwort from Kunde
                WHERE KundeID = $KundeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Passwort = $row['Passwort'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Passwort;
}

function getKundeEmail($conn, $KundeID)
{
    $Email = "";
    $sql = "SELECT Email from Kunde
                WHERE KundeID = $KundeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Email = $row['Email'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Email;
}

function getKundeID_login($conn, $kundename)
{
    $sql = "SELECT KundeID from Kunde
            WHERE Nachname = '$kundename'";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $KundeID = $row['KundeID'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
        echo $conn->error;
        echo $result;
    }
    return $KundeID;
}

function updateKunde($conn, $KundeID, $Vorname, $Nachname, $Passwort, $Email)
{
    $sql = "UPDATE Kunde
            SET Vorname = '$Vorname',
                Nachname = '$Nachname',
                Passwort = '$Passwort',
                Email = '$Email'
            WHERE KundeID = $KundeID";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
        echo $sql;
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
}

function getAllBuchungData($conn)
{
    $sql = "SELECT Bucht.BuchungID, Zimmer.Zimmerkategorie, Buchung.Reiseziel, Buchung.AnzahlDerReisenden, Buchung.CheckInDatum, Buchung.CheckOutDatum, Buchung.Betrag, Unterkunftsanbieter.Name, Bewertet.Punkte
            FROM Bucht
            INNER JOIN Zimmer on Bucht.ZimmerID = Zimmer.ZimmerID
            INNER JOIN Buchung on Bucht.BuchungID = Buchung.BuchungID
            INNER JOIN Unterkunftsanbieter ON Zimmer.AnbieterID = Unterkunftsanbieter.AnbieterID
            INNER JOIN Bewertet ON Buchung.BuchungID = Bewertet.BuchungID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td align='center'>" . $row['BuchungID'] . "</td>";
                echo "<td align='center'>" . $row['Reiseziel'] . "</td>";
                echo "<td align='center'>" . $row['AnzahlDerReisenden'] . "</td>";
                echo "<td align='center'>" . $row['CheckInDatum'] . "</td>";
                echo "<td align='center'>" . $row['CheckOutDatum'] . "</td>";
                echo "<td align='center'>" . $row['Name'] . "</td>";
                echo "<td align='center'>" . $row['Zimmerkategorie'] . "</td>";
                echo "<td align='center'>" . $row['Betrag'] . "</td>";
                echo "<td align='center'>" . $row['Punkte'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "No records matching your query were found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
}

function getCities($conn)
{
    $sql = "SELECT * FROM Gebäude WHERE Stadt = 'Berlin'";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo $row['GebäudeID'] . "<br>";
            }
            while ($city = mysqli_fetch_array($result)) {
                echo  $arCities[] = $city['GebäudeID'];
            }

            echo "arCities: " . $arCities;
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "No records matching your query were found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
}
