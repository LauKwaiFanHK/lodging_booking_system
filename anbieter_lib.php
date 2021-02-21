<?php
include_once 'connect_db.php';

function getAnbieterName($conn, $AnbieterID)
{
    $Name = "";
    $sql = "SELECT Name from Unterkunftsanbieter
                WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Name = $row['Name'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Name;
}

function getAnbieterNachricht($conn, $AnbieterID)
{
    $sql = "SELECT Nachricht from Unterkunftsanbieter
                WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Nachricht = $row['Nachricht'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Nachricht;
}

function updateAnbieterNachricht($conn, $AnbieterID, $Nachricht)
{
    $sql = "UPDATE Unterkunftsanbieter 
	         SET Nachricht = '$Nachricht'
             WHERE AnbieterID = $AnbieterID";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
        echo $sql;
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
}

function getGebauedeIDAdresse($conn, $GebäudeID)
{
    $address = "";
    $sql = "SELECT Hausnummer, Straße, Stadt, PLZ, Bundesland, Land, Telefonnummer  from Gebäude
            WHERE GebäudeID = $GebäudeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Hausnr = $row['Hausnummer'];
            $Straße = $row['Straße'];
            $PLZ = $row['PLZ'];
            $Bundesland = $row['Bundesland'];
            $Land = $row['Land'];
            $address = $Hausnr . ', ' . $Straße . ', ' . $PLZ . ', ' . "<br>" . $Bundesland . ', ' .
             $Land;
            mysqli_free_result($result);
            return $address;
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } 
    if (!$result) {
        echo "<i style='color:red'>Geben Sie die Adresse Ihrer Unterkunft mit dem unteren Formular.</i>";
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    
}

function getAnbieterHausnr($conn, $GebäudeID)
{
    $Hausnr = "";
    $sql = "SELECT Hausnummer from Gebäude
            WHERE GebäudeID = $GebäudeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Hausnr = $row['Hausnummer'];
            mysqli_free_result($result); 
            return $Hausnr;
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    }if (!$result) {
        echo "";
    }  
    else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    
}

function getAnbieterStrasse($conn, $GebäudeID)
{
    $Straße = "";
    $sql = "SELECT Straße from Gebäude
            WHERE GebäudeID = $GebäudeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Straße = $row['Straße'];
            mysqli_free_result($result);
            return $Straße;
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } 
    
    if (!$result) {
        echo "";
    } 
    else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    
}

function getAnbieterPLZ($conn, $GebäudeID)
{
    $PLZ = "";
    $sql = "SELECT PLZ from Gebäude
            WHERE GebäudeID = $GebäudeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $PLZ = $row['PLZ'];
            mysqli_free_result($result);
            return $PLZ;
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } 
    if (!$result) {
        echo "";
    } 
    else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    
}

function getAnbieterTelefonnr($conn, $GebäudeID)
{
    $Telefonnummer = "";
    $sql = "SELECT Telefonnummer from Gebäude
            WHERE GebäudeID = $GebäudeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Telefonnummer = $row['Telefonnummer'];
            mysqli_free_result($result);
            return $Telefonnummer;
        } else {
            echo $sql;
            echo "";
        }
    } 
    if (!$result) {
        echo "";
    } 
    else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    
}

function getAnbieterStadt($conn, $GebäudeID)
{
    $Stadt = "";
    $sql = "SELECT Stadt from Gebäude
            WHERE GebäudeID = $GebäudeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Stadt = $row['Stadt'];
            mysqli_free_result($result);
            return $Stadt;
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } 
    if (!$result) {
        echo "";
    } 
    else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    
}

function getAnbieterBundesland($conn, $GebäudeID)
{
    $Bundesland = "";
    $sql = "SELECT Bundesland from Gebäude
            WHERE GebäudeID = $GebäudeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Bundesland = $row['Bundesland'];
            mysqli_free_result($result);
            return $Bundesland;
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } 
    if (!$result) {
        echo "";
    } 
    else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    
}

function getAnbieterLand($conn, $GebäudeID)
{
    $Land = "";
    $sql = "SELECT Land from Gebäude
            WHERE GebäudeID = $GebäudeID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Land = $row['Land'];
            mysqli_free_result($result);
            return $Land;
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } 
    if (!$result) {
        echo "";
    } 
    else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    
}

function updateAnbieterGebaeude($conn, $GebäudeID, $hausnummer, $Straße, $plz, $Stadt, $Bundesland, $Land, $Telefonnummer)
{
    $sql = "UPDATE Gebäude 
            SET hausnummer = '$hausnummer',
                Straße = '$Straße',
                plz = '$plz',
                Stadt = '$Stadt',
                Bundesland = '$Bundesland',
                Land = '$Land',
                Telefonnummer = '$Telefonnummer'
            WHERE GebäudeID = $GebäudeID";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
        echo $sql;
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
}

function getAnbieterURL($conn, $AnbieterID)
{
    $URL = "";
    $sql = "SELECT URL from Unterkunftsanbieter
                WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $URL = $row['URL'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $URL;
}

function getAnbieterkategorie($conn, $AnbieterID)
{
    $kategorie = "";
    $sql = "SELECT Unterkunftskategorie from Unterkunftsanbieter
                WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $kategorie = $row['Unterkunftskategorie'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $kategorie;
}

function getAnbieterZimmer($conn, $AnbieterID)
{
    $sql = "SELECT ZimmerID, Zimmerkategorie,Ausstattung,Größe,Kapazität,Etage,Zimmernummer,Preis from Zimmer
            WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $ZimmerID = $row['ZimmerID'];
                echo "<tr>";
                echo "<td getAnbieterZimmerForReisende>" . $row['Zimmerkategorie'] . "</td>";
                echo "<td align='center'>" . $row['Ausstattung'] . "</td>";
                echo "<td align='center'>" . $row['Größe'] . "</td>";
                echo "<td align='center'>" . $row['Kapazität'] . "</td>";
                echo "<td align='center'>" . $row['Etage'] . "</td>";
                echo "<td align='center'>" . $row['Zimmernummer'] . "</td>";
                echo "<td align='center'>" . $row['Preis'] . "</td>";
                echo "<td align='center'><a href = 'update_anbieter_zimmer_form.php?ZimmerID=$ZimmerID' class='editieren' title='Editieren' data-toggle='tooltip'><i class='material-icons'>&#xe254;</i></td>";
                echo "<td align='center'><a href = 'delete_anbieter_zimmer_form.php?ZimmerID=$ZimmerID' class='delete' title='Delete' data-toggle='tooltip'><i class='material-icons'>&#xe872;</i></td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "Keine verfügbare Information. Fügen Sie Ihres erste Zimmerkategorie ein!";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
}

function getZimmerkategorie($conn, $ZimmerID)
{
    $Zimmerkategorie = "";
    $sql = "SELECT Zimmerkategorie from Zimmer
                WHERE ZimmerID = $ZimmerID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Zimmerkategorie = $row['Zimmerkategorie'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Zimmerkategorie;
}

function getZimmernummer($conn, $ZimmerID)
{
    $Zimmernummer = "";
    $sql = "SELECT Zimmernummer from Zimmer
                WHERE ZimmerID = $ZimmerID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Zimmernummer = $row['Zimmernummer'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Zimmernummer;
}

function getEtage($conn, $ZimmerID)
{
    $Etage = "";
    $sql = "SELECT Etage from Zimmer
                WHERE ZimmerID = $ZimmerID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Etage = $row['Etage'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Etage;
}

function getKapazitaet($conn, $ZimmerID)
{
    $Kapazität = "";
    $sql = "SELECT Kapazität from Zimmer
                WHERE ZimmerID = $ZimmerID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Kapazität = $row['Kapazität'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Kapazität;
}

function getGrosse($conn, $ZimmerID)
{
    $Größe = "";
    $sql = "SELECT Größe from Zimmer
                WHERE ZimmerID = $ZimmerID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Größe = $row['Größe'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Größe;
}

function getAusstattung($conn, $ZimmerID)
{
    $Ausstattung = "";
    $sql = "SELECT Ausstattung from Zimmer
                WHERE ZimmerID = $ZimmerID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Ausstattung = $row['Ausstattung'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Ausstattung;
}

function getPreis($conn, $ZimmerID)
{
    $Preis = "";
    $sql = "SELECT Preis from Zimmer
                WHERE ZimmerID = $ZimmerID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Preis = $row['Preis'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Preis;
}

function updateZimmer($conn, $ZimmerID, $Zimmerkategorie, $Zimmernummer, $Etage, $Kapazität, $Größe, $Ausstattung, $Preis)
{
    $sql = "UPDATE Zimmer 
            SET Zimmerkategorie = '$Zimmerkategorie',
                Zimmernummer = '$Zimmernummer',
                Etage = '$Etage',
                Kapazität = '$Kapazität',
                Größe = '$Größe',
                Ausstattung = '$Ausstattung',
                Preis = '$Preis'
            WHERE ZimmerID = $ZimmerID";

    if (mysqli_query($conn, $sql)) {
        echo "New record created successfully !";
        echo $sql;
    } else {
        echo "Error: " . $sql . "
" . mysqli_error($conn);
    }
}

function getAnbieterID($conn, $ZimmerID)
{
    $sql = "SELECT AnbieterID from Zimmer
                WHERE ZimmerID = $ZimmerID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $AnbieterID = $row['AnbieterID'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $AnbieterID;
}

function getAnbieterID_login($conn, $anbietername)
{
    $sql = "SELECT AnbieterID from Unterkunftsanbieter
            WHERE Name = '$anbietername'";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $AnbieterID = $row['AnbieterID'];
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
    return $AnbieterID;
}

function getGebauedeID_login($conn, $anbietername)
{
    $AnbieterID = getAnbieterID_login($conn, $anbietername);
    
    $sql = "SELECT GebäudeID FROM Zimmer
            WHERE AnbieterID = '$AnbieterID'";


    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $GebäudeID = $row['GebäudeID'];
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
    return $GebäudeID;
}

function getAnbieterID_register($conn, $anbietername)
{
    $sql = "SELECT AnbieterID from Unterkunftsanbieter
            WHERE Name = '$anbietername'";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $AnbieterID = $row['AnbieterID'];
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
    return $AnbieterID;
}

function getGebäudeID($conn, $ZimmerID)
{
    $sql = "SELECT GebäudeID from Zimmer
                WHERE ZimmerID = $ZimmerID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $GebäudeID = $row['GebäudeID'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $GebäudeID;
}

function getGebäudeIDHomepage($conn, $AnbieterID)
{
    $sql = "SELECT GebäudeID from Zimmer
                WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $GebäudeID = $row['GebäudeID'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $GebäudeID;
}

function getZimmerData($conn, $ZimmerID)
{
    $sql = "SELECT Zimmerkategorie, Zimmernummer, Etage, Kapazität, Größe, Ausstattung, Preis from Zimmer
                WHERE ZimmerID = $ZimmerID";

    if ($result = mysqli_query($conn, $sql)) {

        $ZimmerData = "";
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $ZimmerData = "<b>Zimmerkategorie: </b>" . $row['Zimmerkategorie'] . '<br>' . "<b>Zimmernummer: </b>" . $row['Zimmernummer'] . '<br>' . "<b>Etage: </b>" . $row['Etage'] . '<br>' . "<b>Kapazität: </b>" . $row['Kapazität'] . '<br>' . "<b>Größe: </b>" . $row['Größe'] . '<br>' . "<b>Aussttattung: </b>" . $row['Ausstattung'] . '<br>' . "<b>Preis/Nacht: </b>" . $row['Preis'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $ZimmerData;
}

function getAllZimmerkategorie($conn, $AnbieterID)
{
    $sql = "SELECT Zimmer.Zimmerkategorie 
            FROM Zimmer
            WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<ul>";
                echo "<li>" . $row['Zimmerkategorie'] . "</li>";
                echo "</ul>";
            }
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

function getAnbieterZimmerForReisende($conn, $AnbieterID, $KundeID, $checkin, $checkout, $guest)
{
    $sql = "SELECT ZimmerID, Zimmerkategorie,Ausstattung,Größe,Kapazität,Etage,Zimmernummer,Preis from Zimmer
            WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                $ZimmerID = $row['ZimmerID'];
                echo "<tr>";
                echo "<td align='center'>" . $row['Zimmerkategorie'] . "</td>";
                echo "<td align='center'>" . $row['Ausstattung'] . "</td>";
                echo "<td align='center'>" . $row['Größe'] . "</td>";
                echo "<td align='center'>" . $row['Kapazität'] . "</td>";
                echo "<td align='center'>" . $row['Etage'] . "</td>";
                echo "<td align='center'>" . $row['Zimmernummer'] . "</td>";
                echo "<td align='center'>" . $row['Preis'] . "€" . "</td>";
                echo "<td align='center'><button>
                <a href ='kunde_reservieren_form.php?KundeID=" . $KundeID . "&ZimmerID=" . $ZimmerID . "&AnbieterID=" . $AnbieterID . "&checkin=" . $checkin . "&checkout=" . $checkout . "&guest=" . $guest . "' data-toggle='tooltip'>reservieren</a></button></td>";
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

function getAnbieterFoto($conn, $AnbieterID)
{
    $sql = "SELECT Foto from Unterkunftsanbieter
                WHERE AnbieterID = $AnbieterID";

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

function getAllAuftragData($conn, $AnbieterID)
{
    $sql = "SELECT Buchung.CheckInDatum, Buchung.CheckOutDatum, Kunde.Vorname, Kunde.Nachname, Buchung.AnzahlDerReisenden, Zimmer.Zimmerkategorie, Buchung.Betrag, Bewertet.Punkte
            FROM Bucht 
            INNER JOIN Zimmer on Bucht.ZimmerID = Zimmer.ZimmerID 
            INNER JOIN Buchung on Bucht.BuchungID = Buchung.BuchungID 
            INNER JOIN Kunde on Bucht.KundeID = Kunde.KundeID 
            INNER JOIN Bewertet on Buchung.BuchungID = Bewertet.BuchungID
            INNER JOIN Unterkunftsanbieter on Zimmer.AnbieterID = Unterkunftsanbieter.AnbieterID 
            WHERE Unterkunftsanbieter.AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            while ($row = mysqli_fetch_array($result)) {
                echo "<tr>";
                echo "<td align='center'>" . $row['CheckInDatum'] . "</td>";
                echo "<td align='center'>" . $row['CheckOutDatum'] . "</td>";
                echo "<td align='center'>" . $row['Vorname'] . "</td>";
                echo "<td align='center'>" . $row['Nachname'] . "</td>";
                echo "<td align='center'>" . $row['AnzahlDerReisenden'] . "</td>";
                echo "<td align='center'>" . $row['Zimmerkategorie'] . "</td>";
                echo "<td align='center'>" . $row['Betrag'] . "</td>";
                echo "<td align='center'>" . $row['Punkte'] . "</td>";
                echo "</tr>";
            }
            echo "</table>";
            mysqli_free_result($result);
        } else {
            echo "Sie haben noch keinen Auftrag bekommen!";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
}

function updatePhoto($conn, $target_file, $AnbieterID)
{
    $baseUrl = "http://172.16.32.201/~lauk/Buchungsplattform/";
    $fotoUrl = $baseUrl . $target_file;
    $sql = "UPDATE Unterkunftsanbieter
            SET Foto = '$fotoUrl'
            WHERE AnbieterID = $AnbieterID";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function updateUnterkunftPhoto1($conn, $target_file, $AnbieterID)
{
    $baseUrl = "http://172.16.32.201/~lauk/Buchungsplattform/";
    $fotoUrl = $baseUrl . $target_file;
    $sql = "UPDATE Unterkunftsanbieter
            SET Unterkunft_Foto1 = '$fotoUrl'
            WHERE AnbieterID = $AnbieterID";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function updateUnterkunftPhoto2($conn, $target_file, $AnbieterID)
{
    $baseUrl = "http://172.16.32.201/~lauk/Buchungsplattform/";
    $fotoUrl = $baseUrl . $target_file;
    $sql = "UPDATE Unterkunftsanbieter
            SET Unterkunft_Foto2 = '$fotoUrl'
            WHERE AnbieterID = $AnbieterID";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function updateUnterkunftPhoto3($conn, $target_file, $AnbieterID)
{
    $baseUrl = "http://172.16.32.201/~lauk/Buchungsplattform/";
    $fotoUrl = $baseUrl . $target_file;
    $sql = "UPDATE Unterkunftsanbieter
            SET Unterkunft_Foto3 = '$fotoUrl'
            WHERE AnbieterID = $AnbieterID";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function updateUnterkunftPhoto4($conn, $target_file, $AnbieterID)
{
    $baseUrl = "http://172.16.32.201/~lauk/Buchungsplattform/";
    $fotoUrl = $baseUrl . $target_file;
    $sql = "UPDATE Unterkunftsanbieter
            SET Unterkunft_Foto4 = '$fotoUrl'
            WHERE AnbieterID = $AnbieterID";

    if ($conn->query($sql) === TRUE) {
        echo "New record created successfully";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

function getUnterkunftFoto1($conn, $AnbieterID)
{
    $sql = "SELECT Unterkunft_Foto1 from Unterkunftsanbieter
                WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Foto1 = $row['Unterkunft_Foto1'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Foto1;
}

function getUnterkunftFoto2($conn, $AnbieterID)
{
    $sql = "SELECT Unterkunft_Foto2 from Unterkunftsanbieter
                WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Foto2 = $row['Unterkunft_Foto2'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Foto2;
}

function getUnterkunftFoto3($conn, $AnbieterID)
{
    $sql = "SELECT Unterkunft_Foto3 from Unterkunftsanbieter
                WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Foto3 = $row['Unterkunft_Foto3'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Foto3;
}

function getUnterkunftFoto4($conn, $AnbieterID)
{
    $sql = "SELECT Unterkunft_Foto4 from Unterkunftsanbieter
                WHERE AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $Foto4 = $row['Unterkunft_Foto4'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $Foto4;
}

function calculateTotalIncome($conn, $AnbieterID)
{
    $sql = "SELECT SUM(Buchung.Betrag) 
            FROM Bucht 
            INNER JOIN Zimmer on Bucht.ZimmerID = Zimmer.ZimmerID 
            INNER JOIN Buchung on Bucht.BuchungID = Buchung.BuchungID 
            INNER JOIN Kunde on Bucht.KundeID = Kunde.KundeID 
            INNER JOIN Bewertet on Buchung.BuchungID = Bewertet.BuchungID 
            INNER JOIN Unterkunftsanbieter on Zimmer.AnbieterID = Unterkunftsanbieter.AnbieterID
            WHERE Unterkunftsanbieter.AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $einkommen = $row['SUM(Buchung.Betrag)'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    return $einkommen;
}

function calculateAverageScore($conn, $AnbieterID)
{
    $sql = "SELECT AVG(Bewertet.Punkte) 
            FROM Bucht 
            INNER JOIN Zimmer on Bucht.ZimmerID = Zimmer.ZimmerID 
            INNER JOIN Buchung on Bucht.BuchungID = Buchung.BuchungID 
            INNER JOIN Kunde on Bucht.KundeID = Kunde.KundeID 
            INNER JOIN Bewertet on Buchung.BuchungID = Bewertet.BuchungID 
            INNER JOIN Unterkunftsanbieter on Zimmer.AnbieterID = Unterkunftsanbieter.AnbieterID
            WHERE Unterkunftsanbieter.AnbieterID = $AnbieterID";

    if ($result = mysqli_query($conn, $sql)) {

        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_array($result);
            $averageScore = $row['AVG(Bewertet.Punkte)'];
            mysqli_free_result($result);
        } else {
            echo $sql;
            echo "Row could not be found.";
        }
    } else {
        echo " Error: " . $sql . "
" . mysqli_error($conn);
    }
    $finalScore = round($averageScore, 1);
    return $finalScore;
}

?>