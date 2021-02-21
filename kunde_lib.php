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

function getAllBuchungData($conn, $KundeID)
{
    $sql = "SELECT Bucht.BuchungID, Zimmer.Zimmerkategorie, Buchung.Reiseziel, Buchung.AnzahlDerReisenden, Buchung.CheckInDatum, Buchung.CheckOutDatum, Buchung.Betrag, Unterkunftsanbieter.Name, Bewertet.Punkte
            FROM Bucht
            INNER JOIN Zimmer on Bucht.ZimmerID = Zimmer.ZimmerID
            INNER JOIN Buchung on Bucht.BuchungID = Buchung.BuchungID
            INNER JOIN Unterkunftsanbieter ON Zimmer.AnbieterID = Unterkunftsanbieter.AnbieterID
            INNER JOIN Bewertet ON Buchung.BuchungID = Bewertet.BuchungID
            WHERE Bucht.KundeID = $KundeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $AnbieterName = $row['Name'];
                $BuchungID = $row['BuchungID'];
                mysqli_query($conn, "SELECT AnbieterID FROM Unterkunftsanbieter WHERE Name = '$AnbieterName'");
                echo "<tr>";
                echo "<td align='center'>" . $BuchungID . "</td>";
                echo "<td align='center'>" . $row['Reiseziel'] . "</td>";
                echo "<td align='center'>" . $row['AnzahlDerReisenden'] . "</td>";
                echo "<td align='center'>" . $row['CheckInDatum'] . "</td>";
                echo "<td align='center'>" . $row['CheckOutDatum'] . "</td>";
                echo "<td align='center'>" . $row['Name'] . "</td>";
                echo "<td align='center'>" . $row['Zimmerkategorie'] . "</td>";
                echo "<td align='center'>" . $row['Betrag'] . "€</td>";
                echo "<td align='center'>" .
                "<form action='kunde_bewerten.php' method='POST'>" . 
                "<input type='hidden' name='KundeID' value='$KundeID'>" .
                "<input type='hidden' name='BuchungID' value='$BuchungID'>" .
                "<input type='number' class='form-control' name='Punkte' placeholder='/10' max='10' min='0' step='0.5' value='" . getBewertung($conn, $BuchungID) . "'>
                <button type='submit' class='btn btn-success'>bewerten</button></form>"
                . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "Sie haben noch keine Buchung gemacht.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
}

function getGebauedeID ($conn, $AnbieterID) {
    $GebauedeID = "";
    $sql = "SELECT GebäudeID from Zimmer
                WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $GebauedeID = $row['GebäudeID'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $GebauedeID;
}

function getThingsToDo ($conn, $city) {
    $todo[] = "";
    $sql = "SELECT ThingsToDo from ReiseRecommendation
                WHERE Ort = '$city'";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            while($row = mysqli_fetch_array($result)){
                $todo = $row['ThingsToDo'];
                echo "<h4 align='left'>";
                echo "<ul>";
                echo "<li>";
                echo "&nbsp;<span class='glyphicon glyphicon-eye-open'></span>&nbsp;";
                echo "<a href='" . getLink($conn, $todo) . "' target='_blank'>";
                echo "$todo";
                echo "</a>";
                echo "<br>";
                echo "</li>";
                echo "</ul>";
                echo "</h4>";
            };
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
}

function getLink ($conn, $todo) {
    $link = "";
    $sql = "SELECT Link from ReiseRecommendation
                WHERE ThingsToDo = '$todo'";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $link = $row['Link'];
            return $link;
            mysqli_free_result($result);            
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    
}

function getZimmerPreis($conn, $ZimmerID) {
    $preis = "";
    $sql = "SELECT Preis from Zimmer
                WHERE ZimmerID = '$ZimmerID'";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $preis = $row['Preis'];
            return $preis;
            mysqli_free_result($result);            
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }

}

function getBuchungID($conn, $KundeID, $checkin, $checkout) {
    $BuchungID = "";
    $sql = "SELECT Buchung.BuchungID from Buchung left join 

                WHERE KundeID = '$KundeID' and CheckInDatum = '$checkin' and CheckOutDatum = '$checkout'";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $BuchungID = $row['BuchungID'];
            return $BuchungID;
            mysqli_free_result($result);            
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }

}

function getPunkte ($conn, $BuchungID) {
    $Punkte = "";
    $sql = "SELECT Punkte from Bewertet
                WHERE BuchungID = $BuchungID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Punkte = $row['Punkte'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Punkte;
}
function insertPhoto($conn, $target_file, $KundeID)
{
    $baseUrl = "http://172.16.32.201/~lauk/Buchungsplattform/";
    $fotoUrl = $baseUrl . $target_file;
    $sql = "UPDATE Kunde
            SET Foto = '$fotoUrl'
            WHERE KundeID = '$KundeID'";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getKundeFoto($conn, $KundeID)
{
    $sql = "SELECT Foto from Kunde
                WHERE KundeID = $KundeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Foto = $row['Foto'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Foto;
}

function getBewertung($conn, $BuchungID)
{
    $sql = "SELECT Punkte from Bewertet
                WHERE BuchungID = $BuchungID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Punkte = $row['Punkte'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Punkte;
}

?>