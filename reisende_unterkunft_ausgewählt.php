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
    include_once "connect_db.php";
    include_once "kunde_lib.php";
    include_once "anbieter_lib.php";

    ?>
    <?php
    $AnbieterID = $_GET["AnbieterID"];
    $GebäudeID = $_GET["GebäudeID"];
    $ZimmerID = $_GET["ZimmerID"];
    $KundeID = $_GET["KundeID"];
    ?>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--img id="mylogo" src="untitled.png" width="200" class="center" alt="Logo des Buchungsplattforms"-->
                <<a class="navbar-brand" href="#">FeelsLikeHome</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Währung auswählen<span
                            class="caret "></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Europa – Euro</a></li>
                        <li><a href="#">Hong Kong Dollars – HKD</a></li>
                        <li><a href="#">United Kingdom Pounds – GBP</a></li>
                        <li><a href="#">United States Dollars – USD</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown" style="width:auto"><a class="dropdown-toggle" data-toggle="dropdown"
                        href="#"><?php echo getKundeVorname($conn, $KundeID) . "" . getKundeNachname($conn, $KundeID) ?><span
                            class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Profil</a></li>
                        <li><a href="#">Buchungshistorie</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Ausloggen</a></li>
            </ul>
        </div>
    </nav>
    <main>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-6">
                <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                <div class="row">
                    <ul>
                        <img class="card-img-top" src="<?php echo getAnbieterFoto($conn, $AnbieterID) ?>" alt="Unterkunftsprofilbild"
                            style="width:250px">
                        <h3><strong><?php echo getAnbieterName($conn, $AnbieterID) ?></strong></h3>

                        <li><b>Website: </b><?php echo getAnbieterURL($conn, $AnbieterID) ?></li>
                        <li><b>Unterkunftskategorie: </b><?php echo getAnbieterkategorie($conn, $AnbieterID) ?>
                        </li>
                    </ul>
                    <br>
                </div>
                <div class="row">
                    <h5><Strong>Nachricht von der Unterkunftsanbieter an der Reisende:</Strong></h5>
                    <?php echo getAnbieterNachricht($conn, $AnbieterID) ?>
                </div>
            </div>
            <div class="col-md-3">
                <div class="card" style="width: 350px">
                    <h4 class="card-header text-center"><b>Reiseempfehlung</b></h4>
                    <div class="card-body text-center">
                        <p class="card-text">xxxx
                            <!--?php echo getAnbieterkategorie($conn, $AnbieterID) ?-->
                        </p>
                        <p class="card-text">xxxx
                            <!--?php echo getAnbieterkategorie($conn, $AnbieterID) ?-->
                        </p>
                        <p class="card-text">xxxx
                            <!--?php echo getAnbieterkategorie($conn, $AnbieterID) ?-->
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="image" accept="image/*" capture style="display:none"
                            id="exampleFormControlFile1" />
                        <img src="camera.png" id="upload_photo" style="cursor:pointer" width="30" height="auto" />
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="image" accept="image/*" capture style="display:none"
                            id="exampleFormControlFile1" />
                        <img src="camera.png" id="upload_photo" style="cursor:pointer" width="30" height="auto" />
                    </div>
                </div>
                <br>
                <div class="row">
                    <div class="col-md-6">
                        <input type="file" name="image" accept="image/*" capture style="display:none"
                            id="exampleFormControlFile1" />
                        <img src="camera.png" id="upload_photo" style="cursor:pointer" width="30" height="auto" />
                    </div>
                    <div class="col-md-6">
                        <input type="file" name="image" accept="image/*" capture style="display:none"
                            id="exampleFormControlFile1" />
                        <img src="camera.png" id="upload_photo" style="cursor:pointer" width="30" height="auto" />
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-7">
                <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                <ul>
                    <br>
                    <h4><strong>Verfügbare Zimmer</strong></h4>
                    <li><b>Address der Gebäude: </b>
                        <?php echo getAnbieterStrasse($conn, 14) . " " . getAnbieterHausnr($conn, 14) . ", " . 
                                            getAnbieterStadt($conn, 14) . ", " . getAnbieterPLZ($conn, 14) . ", " .
                                            getAnbieterBundesland($conn, 14) . ", " .  getAnbieterLand($conn, 14) ?>
                    </li>
                    <li><b>Telefonnummer: </b><?php echo getAnbieterTelefonnr($conn, 14) ?></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col-md-2"></div>
            <div class="col-md-8">
                <form>
                    <br>
                    <h4><strong>Verfügbare Zimmer</strong></h4>
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
                                <th scope="col">Registrieren</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php getAnbieterZimmerForReisende($conn, $AnbieterID) ?>
                        </tbody>
                    </table>
                </form>
            </div>
        </div>

    </main>



</body>



</html>
<?php mysqli_close($conn); ?>