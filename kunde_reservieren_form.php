<!DOCTYPE html>
<html lang="en">


<head>
    <meta charset="UTF-8">
    <title>Reservieren</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="kunde_reservieren_form.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body translate="no">
    <?php
    ini_set('display_errors', 1);
    ini_set('display_startup_errors', 1);
    error_reporting(E_ALL);

    include_once "connect_db.php";
    include_once "kunde_lib.php";
    include_once "anbieter_lib.php";

    $KundeID = $_GET["KundeID"];
    $ZimmerID = $_GET["ZimmerID"];
    $AnbieterID = $_GET["AnbieterID"];
    $GebäudeID = getGebäudeID($conn, $ZimmerID);
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $NumberOfGuests = $_GET['guest'];
    $timestamp1 = strtotime($checkin);
    $timestamp2 = strtotime($checkout);
    $days = ($timestamp2 - $timestamp1) / (24 * 60 * 60);
    $city = getAnbieterStadt($conn, $GebäudeID); 

    ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--img id="mylogo" src="untitled.png" width="200" class="center" alt="Logo des Buchungsplattforms"-->
                <<a class="navbar-brand" href="#">FeelsLikeHome</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Währung auswählen<span class="caret "></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Europa – Euro</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown" style="width:auto"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-user"></span><?php echo getKundeVorname($conn, $KundeID) . " " . getKundeNachname($conn, $KundeID) ?><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                    <li><a href="reisende_konto_verwalten.php?KundeID=<?php echo $KundeID ?>">Profil</a></li>
                        <li><a href="reisende_buchungshistorie.php?KundeID=<?php echo $KundeID ?>">Buchungshistorie</a></li>
                    </ul>
                </li>
                <li><a href="kunde_logout.php"><span class="glyphicon glyphicon-log-in"></span> Ausloggen</a></li>
                </li>
            </ul>
        </div>
    </nav>

    <h1 class="text-center">Buchungsformular</h1>

    <div class="container-fluid">
        <section class="col-md-12">
            <div class="row">
                <main class="col-md-3 col-lg-3">
                    <img src="<?php echo getAnbieterFoto($conn, $AnbieterID) ?>" class="img-fluid" alt="Responsive image" style="width:200px;height:auto">
                    <h3 class="font-weight-bold"><?php echo getAnbieterName($conn, $AnbieterID) ?></h3>
                    <ul class="list-unstyled">
                        <li>&nbsp; &nbsp;<b>Adresse:</b> <br>
                            &nbsp; &nbsp; &nbsp;
                            <?php echo  getGebauedeIDAdresse($conn, $GebäudeID) ?>
                        </li>
                        <li>&nbsp; &nbsp;<b>Kontakt:</b><br>
                            &nbsp; &nbsp; &nbsp; <?php echo getAnbieterTelefonnr($conn, $GebäudeID) ?></li>
                        <li>&nbsp; &nbsp;<b>Website:</b> <br> &nbsp; &nbsp; &nbsp; &nbsp;
                            <?php echo getAnbieterURL($conn, $AnbieterID) ?></li>
                        <li>&nbsp; &nbsp;<b>Unterkufntskategorie:</b> <br> &nbsp; &nbsp; &nbsp;
                            &nbsp;<?php echo getAnbieterkategorie($conn, $AnbieterID) ?></li>
                    </ul>
                </main>
                <!-- ASIDE -->
                <div class="col-md-9 col-lg-9">
                    <div class="row">
                        <!-- ASIDE #1 -->
                        <aside class="col-sm-12 col-md-12 information">
                            <h3 class="font-weight-bold">Buchungsangaben</h5>
                                <p> CheckInDatum: <?= $checkin ?> </p>
                                <p> CheckOutDatum: <?= $checkout ?></p>
                                <p> Ausgewähltes Zimmer: 1</p>
                                <p> Zimmerkategorie: <?php echo getZimmerkategorie($conn, $ZimmerID) ?></p>
                                <p> Anzahl der Reisenden: <?php echo $NumberOfGuests ?></p>
                                <p> Gesamtes Preis: <?php echo $Betrag = getZimmerPreis($conn, $ZimmerID) * $days ?>€</p>
                        </aside>
                        <!-- ASIDE #2 -->
                        <aside class="col-sm-12 col-md-12 submit">
                            <p> Tragen Sie die folgenden Informationen ein.</p>
                            <form action="insert_kunde_buchung.php" method="post">
                                <input type="hidden" name='KundeID' value='<?php echo $KundeID ?>'>
                                <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                                <input type="hidden" name='ZimmerID' value='<?php echo $ZimmerID ?>'>
                                <input type="hidden" name='Betrag' value='<?php echo $Betrag ?>'>
                                <input type="hidden" name='city' value='<?php echo $city ?>'>
                                <input type="hidden" name='NumberOfGuests' value='<?php echo $NumberOfGuests ?>'>
                                <input type="hidden" name='checkin' value='<?php echo $checkin ?>'>
                                <input type="hidden" name='checkout' value='<?php echo $checkout ?>'>

                                <div class="form-row">
                                    <div class="form-group col-md-6">
                                        <label for="inputName">Vorname</label>
                                        <input type="text" class="form-control" name="Vorname" placeholder="Vorname" required />
                                    </div>
                                    <div class="form-group col-md-6">
                                        <label for="inputSurname">Nachname</label>
                                        <input type="text" class="form-control" name="Nachname" placeholder="Nachname" required />
                                    </div>
                                </div>
                                <div class="form-row">
                                    <div class="form-group col-md-12">
                                        <label for="inputEmail">Email Adresse</label>
                                        <input type="email" class="form-control" name="Email" placeholder="Email" required />
                                    </div>
                                </div>
                                <p> <br>Zahlungsmittel</p>
                                <div class="form-group">
                                    <div class="form-check">
                                        <p>Wählen Sie eine Zahlungsmethode aus.</p>
                                        <input class="form-check-input" type="checkbox" name="checkbox" value="Bar">
                                        <label class=" form-check-label" for="gridCheck1">
                                        vor Ort mit Bar Geld
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="checkbox" value="Banküberweisung">
                                        <label class=" form-check-label" for="gridCheck2">
                                        Banküberweisung
                                        </label>
                                    </div>
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="checkbox" value="Kreditkarte">
                                        <label class=" form-check-label" for="gridCheck3">
                                        Kreditkarte
                                        </label>
                                    </div>
                                </div>
                                <script>
                                    $('input[type="checkbox"]').on('change', function() {
                                        $('input[name="' + this.name + '"]').not(this).prop('checked', false);
                                    });
                                </script>

                                <button type="submit" class="btn btn-primary float-right">Bestätigen</button>
                            </form>

                        </aside>
                    </div>
                </div>
            </div>
        </section>

    </div>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>

</body>

</html>
<?php mysqli_close($conn); ?>