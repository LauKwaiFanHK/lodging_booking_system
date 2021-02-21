<!DOCTYPE html>
<html lang="de">


<head>
    <meta charset="UTF-8">
    <title>Reisende Seite - Unterkunft anzeigen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
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

    ?>
    <?php
    $AnbieterID = $_GET["AnbieterID"];
    $GebäudeID = getGebauedeID($conn, $AnbieterID);
    //$ZimmerID = $_GET["ZimmerID"];
    $KundeID = $_GET["KundeID"];
    $city = getAnbieterStadt($conn, $GebäudeID);
    $checkin = $_GET['checkin'];
    $checkout = $_GET['checkout'];
    $guest = $_GET['guest'];
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
                <li><a href="kunde_hilfe.php?KundeID=<?php echo $KundeID ?>"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
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
    <main>
        <div class="row">
            <div class="col-md-6">
                <div class="col-md-1"></div>
                <div class="text-left">
                    <div class="btn-group">
                        <input type="button" class="btn btn-success" value="⇐ Zurück zum Suchergebnis" onclick="history.back()">
                    </div>
                </div>
            </div>
        </div>
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-1"></div>
                <h2 class="col-md-10" style><span class="glyphicon glyphicon-home"></span> &nbsp;
                    <?php echo getAnbieterName($conn, $AnbieterID) ?></h2>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="card" style="width: 26rem;">
                        <img class="card-img-top" src="<?php echo getAnbieterFoto($conn, $AnbieterID) ?>" alt="Unterkunftsprofilbild" style="width:250px; height:150px">
                        <br>
                        <br>
                        <div class="card-body">
                            <ul>
                                <li>&nbsp; &nbsp;<b><br>Website:</b> <br> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <?php echo getAnbieterURL($conn, $AnbieterID) ?></li>
                                <li>&nbsp; &nbsp;<b>Unterkufntskategorie:</b> <br> &nbsp; &nbsp; &nbsp;
                                    &nbsp;<?php echo getAnbieterkategorie($conn, $AnbieterID) ?></li>
                            </ul>
                            <ul>
                                <li>&nbsp; &nbsp;<b>Adresse:</b> <br>
                                    &nbsp; &nbsp; &nbsp;
                                    <?php echo getGebauedeIDAdresse($conn, $GebäudeID) ?>
                                </li>
                                <li>&nbsp; &nbsp;<b>Telefonnummer:</b><br>
                                    &nbsp; &nbsp; &nbsp; <?php echo getAnbieterTelefonnr($conn, $GebäudeID) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <form action="update_anbieter_nachricht.php" method="post">
                        <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">
                                <span class="glyphicon glyphicon-comment"></span>&nbsp;
                                Eine Nachricht von der Unterkunftsanbieter:</label>
                            <textarea class="form-control" name="Nachricht" rows="3" placeholder="Hello! &#128521;"><?php echo getAnbieterNachricht($conn, $AnbieterID) ?></textarea>

                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-7">
                    <div class="container">
                        <label><span class="glyphicon glyphicon-picture"></span>&nbsp;Fotos der Unterkunft:</label>
                        <div class="row">
                            <div class="foto1">
                                <img style="float: left; width: 300px; height: 250px; object-fit: cover;" src="<?php echo getUnterkunftFoto1($conn, $AnbieterID) ?>" alt="Unterkunftsprofilbild">
                                <img style="float: left; width: 300px; height: 250px; object-fit: cover;" src="<?php echo getUnterkunftFoto2($conn, $AnbieterID) ?>" alt="Unterkunftsprofilbild">
                            </div>
                        </div>
                        <div class="row">
                            <img style="float: left; width: 300px; height: 250px; object-fit: cover;" src="<?php echo getUnterkunftFoto3($conn, $AnbieterID) ?>" alt="Unterkunftsprofilbild">
                            <img style="float: left; width: 300px; height: 250px; object-fit: cover;" src="<?php echo getUnterkunftFoto4($conn, $AnbieterID) ?>" alt="Unterkunftsprofilbild">
                        </div>
                        <br>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-4"></div>
            <div class="col-md-7">
                <div class="card" style="width: 60rem">
                    <h3 class="card-header text-left"><b><span class="glyphicon glyphicon-thumbs-up"></span>
                            &nbsp;Reiseempfehlung
                        </b></h4>

                        <p class="card-text"><?php echo getThingsToDo($conn, $city) ?>
                        </p>
                        </a>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form>
                    <br>
                    <h4><span class="glyphicon glyphicon-list-alt"></span>&nbsp;
                        <strong>Verfügbare Zimmer</strong>
                    </h4>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th scope="col">Zimmerkategorie</th>
                                <th scope="col">Ausstattung</th>
                                <th scope="col">Größe(m^2)</th>
                                <th scope="col">Kapzität</th>
                                <th scope="col">Etage</th>
                                <th scope="col">Zimmernummer</th>
                                <th scope="col">Preis/Nacht</th>
                                <th scope="col">Reservieren</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php getAnbieterZimmerForReisende($conn, $AnbieterID, $KundeID, $checkin, $checkout, $guest) ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </main>



</body>



</html>
<?php mysqli_close($conn); ?>