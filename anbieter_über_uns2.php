<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Unterkunftsanbieter Seite - Über uns & unsere Angebote</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css" />
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body translate="no">
    <?php
    include_once "connect_db.php";
    include_once "anbieter_lib.php";

    ?>
    <?php
    $AnbieterID = $_GET["AnbieterID"];
    $GebäudeID = $_GET["GebäudeID"];
    $ZimmerID = $_GET["ZimmerID"];
    ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <a class="navbar-brand" href="#"><strong>FeelsLikeHome</strong></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-euro"></span>
                        Währung auswählen<span class="caret "></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Europa – Euro</a></li>
                        <li><a href="#">Hong Kong Dollars – HKD</a></li>
                        <li><a href="#">United Kingdom Pounds – GBP</a></li>
                        <li><a href="#">United States Dollars – USD</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-home"></span>
                        <?php echo getAnbieterName($conn, $AnbieterID) ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Über uns & unsere Angebote</a></li>
                        <li><a href="#">Auftragshistorie</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Ausloggen</a></li>
            </ul>
        </div>
    </nav>
    <main>

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
                        <img class="card-img-top" src="<?php echo getAnbieterFoto($conn, $AnbieterID) ?>"
                            alt="Unterkunftsprofilbild" style="width:250px; height:150px">
                        <br>
                        <br>
                        <form action="update_anbieter_foto.php" method="post" enctype="multipart/form-data">
                            <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                            <div class="text-center">
                                <input type="file" type="hidden" name="anbieter_photo">
                                <div>
                                    <button type="submit"><span class="glyphicon glyphicon-camera"></span>&nbsp; Foto
                                        verändern</button>
                                </div>
                            </div>
                        </form>
                        <div class="card-body">
                            <ul>
                                <li>&nbsp; &nbsp;<b>Website:</b> <br> &nbsp; &nbsp; &nbsp; &nbsp;
                                    <?php echo getAnbieterURL($conn, $AnbieterID) ?></li>
                                <li>&nbsp; &nbsp;<b>Unterkufntskategorie:</b> <br> &nbsp; &nbsp; &nbsp;
                                    &nbsp;<?php echo getAnbieterkategorie($conn, $AnbieterID) ?></li>
                            </ul>
                            <ul>
                                <li>&nbsp; &nbsp;<b>Adresse:</b> <br>
                                    &nbsp; &nbsp; &nbsp;
                                    <?php echo getAnbieterHausnr($conn, 14) . ", " . getAnbieterStrasse($conn, 14) .
                                        "," . "<br>\n" .
                                        "&nbsp; &nbsp; &nbsp;" . getAnbieterStadt($conn, 14) . ", " . getAnbieterPLZ($conn, 14) . "," . "<br>\n" .
                                        "&nbsp; &nbsp; &nbsp;" . getAnbieterBundesland($conn, 14) . ", " .  getAnbieterLand($conn, 14) ?>
                                </li>
                                <li>&nbsp; &nbsp;<b>Telefonnummer:</b><br>
                                    &nbsp; &nbsp; &nbsp; <?php echo getAnbieterTelefonnr($conn, 14) ?></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <form action="update_anbieter_nachricht.php" method="post">
                        <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">
                                <span class="glyphicon glyphicon-send"></span>&nbsp;
                                Eine Nachricht an der Reisende:</label>
                            <textarea class="form-control" name="Nachricht" rows="3"
                                placeholder="Beispiel: Herzlich Willkommen! Tierpark Hotel ist eine 4-Sterne-Hotel. Bei uns werden Sie die besten Unterkunft in Berlin erfahren. Umweltschutz ist uns von überragender Bedeutung. Deswegen bieten wir zum alle Mahlzeiten mit bio-Lebensmitteln an. Wir sind eines der besten Arbeitgeber in Berlin."><?php echo getAnbieterNachricht($conn, $AnbieterID) ?></textarea>
                            <div class="text-right">
                                <div class="btn-group">
                                    <button type="submit" class="btn btn-secondary"><a
                                            href="anbieter_nachricht_form.php?AnbieterID=<?php echo $AnbieterID ?>">
                                            <span class="glyphicon glyphicon-pencil"></span>&nbsp;editieren</a></button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-md-4"></div>
                <div class="col-md-7">
                    <div class="container">
                        <label><span class="glyphicon glyphicon-picture"></span>&nbsp;Fotos Ihrer Unterkunft:</label>
                        <div class="row">
                            <img style="float: left; width: 300px; height: 250px; object-fit: cover;"
                                src="<?php echo getUnterkunftFoto1($conn, $AnbieterID) ?>" alt="Unterkunftsprofilbild">
                            <img style="float: left; width: 300px; height: 250px; object-fit: cover;"
                                src="<?php echo getUnterkunftFoto2($conn, $AnbieterID) ?>" alt="Unterkunftsprofilbild">
                        </div>
                        <div class="row">
                            <img style="float: left; width: 300px; height: 250px; object-fit: cover;"
                                src="<?php echo getUnterkunftFoto3($conn, $AnbieterID) ?>" alt="Unterkunftsprofilbild">
                            <img style="float: left; width: 300px; height: 250px; object-fit: cover;"
                                src="<?php echo getUnterkunftFoto4($conn, $AnbieterID) ?>" alt="Unterkunftsprofilbild">
                        </div>
                        <br>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-7">
                        <form method="POST" action="insert_gebaeude_adresse.php">
                            <label for="exampleFormControlTextarea1">
                                <span class="glyphicon glyphicon-list-alt"></span>&nbsp;
                                Adresse Ihrer Unterkunft:</label>
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom03">Hausnr.</label>
                                    <input type="text" class="form-control" name="hausnummer" placeholder="Hausnummer"
                                        required value="<?php echo getAnbieterHausnr($conn, $GebäudeID) ?>" />
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Straße</label>
                                    <input type="text" class="form-control" name="Straße" placeholder="Straße" required
                                        value="<?php echo getAnbieterStrasse($conn, $GebäudeID) ?>" />
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom05">PLZ</label>
                                    <input type="number" class="form-control" name="PLZ" placeholder="PLZ" required
                                        value="<?php echo getAnbieterPLZ($conn, $GebäudeID) ?>" />
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Stadt</label>
                                    <input type="text" class="form-control" name="Stadt" placeholder="Stadt" required
                                        value="<?php echo getAnbieterStadt($conn, $GebäudeID) ?>" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom03">Bundesland</label>
                                    <input type="text" class="form-control" name="Bundesland" placeholder="Bundesland"
                                        required value="<?php echo getAnbieterBundesland($conn, $GebäudeID) ?>" />
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">Land</label>
                                    <input type="text" class="form-control" name="Land" placeholder="Land" required
                                        value="<?php echo getAnbieterLand($conn, $GebäudeID) ?>" />
                                </div>
                            </div>
                            <div class="form-row">
                                <form>
                                    <div class="col-md-4 mb-3">
                                        <br>
                                        <label for="validationCustom03">Telefonnummer</label>
                                        <input type="text" class="form-control" name="Telefonnummer"
                                            placeholder="Telefonnummer" required
                                            value="<?php echo getAnbieterTelefonnr($conn, $GebäudeID) ?>" />
                                    </div>
                                    <div class="col"></div>
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary"><a
                                                        href="anbieter_gebaeude_form.php?AnbieterID=<?php echo $AnbieterID ?>&GebäudeID=<?php echo $GebäudeID ?>">
                                                        <span
                                                            class="glyphicon glyphicon-pencil"></span>&nbsp;editieren</a></button>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-2"></div>
                    <div class="col-md-8">
                        <div class="row">
                            <label><span class="glyphicon glyphicon-bed"></span>&nbsp;Zimmerangaben Ihrer
                                Unterkunft:</label>
                            <form method="POST" action="insert_gebaeude_adresse.php">
                                <label for="exampleFormControlTextarea1">
                                    <span class="glyphicon glyphicon-list-alt"></span>&nbsp;
                                    Adresse Ihrer Unterkunft:</label>
                                <div class="form-row">
                                    <div class="col-md-2 mb-3">
                                        <label for="validationCustom03">Hausnr.</label>
                                        <input type="text" class="form-control" name="hausnummer"
                                            placeholder="Hausnummer" required
                                            value="<?php echo getAnbieterHausnr($conn, $GebäudeID) ?>" />
                                    </div>
                                    <div class="col-md-6 mb-3">
                                        <label for="validationCustom04">Straße</label>
                                        <input type="text" class="form-control" name="Straße" placeholder="Straße"
                                            required value="<?php echo getAnbieterStrasse($conn, $GebäudeID) ?>" />
                                    </div>
                                    <div class="col-md-2 mb-3">
                                        <label for="validationCustom05">PLZ</label>
                                        <input type="number" class="form-control" name="PLZ" placeholder="PLZ" required
                                            value="<?php echo getAnbieterPLZ($conn, $GebäudeID) ?>" />
                                    </div>
                                </div>
                            </form>
                            <form>
                                <form method="POST" action="insert_gebaeude_adresse.php">
                                    <label for="exampleFormControlTextarea1">
                                        <span class="glyphicon glyphicon-list-alt"></span>&nbsp;
                                        Adresse Ihrer Unterkunft:</label>
                                    <div class="form-row">
                                        <div class="col-md-2 mb-3">
                                            <label for="validationCustom03">Hausnr.</label>
                                            <input type="text" class="form-control" name="hausnummer"
                                                placeholder="Hausnummer" required
                                                value="<?php echo getAnbieterHausnr($conn, $GebäudeID) ?>" />
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <label for="validationCustom04">Straße</label>
                                            <input type="text" class="form-control" name="Straße" placeholder="Straße"
                                                required value="<?php echo getAnbieterStrasse($conn, $GebäudeID) ?>" />
                                        </div>
                                        <div class="col-md-2 mb-3">
                                            <label for="validationCustom05">PLZ</label>
                                            <input type="number" class="form-control" name="PLZ" placeholder="PLZ"
                                                required value="<?php echo getAnbieterPLZ($conn, $GebäudeID) ?>" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom05">Stadt</label>
                                            <input type="text" class="form-control" name="Stadt" placeholder="Stadt"
                                                required value="<?php echo getAnbieterStadt($conn, $GebäudeID) ?>" />
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom03">Bundesland</label>
                                            <input type="text" class="form-control" name="Bundesland"
                                                placeholder="Bundesland" required
                                                value="<?php echo getAnbieterBundesland($conn, $GebäudeID) ?>" />
                                        </div>
                                        <div class="col-md-3 mb-3">
                                            <label for="validationCustom04">Land</label>
                                            <input type="text" class="form-control" name="Land" placeholder="Land"
                                                required value="<?php echo getAnbieterLand($conn, $GebäudeID) ?>" />
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <form>
                                            <div class="col-md-4 mb-3">
                                                <br>
                                                <label for="validationCustom03">Telefonnummer</label>
                                                <input type="text" class="form-control" name="Telefonnummer"
                                                    placeholder="Telefonnummer" required
                                                    value="<?php echo getAnbieterTelefonnr($conn, $GebäudeID) ?>" />
                                            </div>
                                            <div class="col"></div>
                                            <div class="col-md-12">
                                                <div class="text-right">
                                                    <div class="btn-group">
                                                        <button type="button" class="btn btn-secondary"><a
                                                                href="anbieter_gebaeude_form.php?AnbieterID=<?php echo $AnbieterID ?>&GebäudeID=<?php echo $GebäudeID ?>">
                                                                <span
                                                                    class="glyphicon glyphicon-pencil"></span>&nbsp;editieren</a></button>
                                                    </div>
                                                </div>
                                                <br>
                                            </div>
                                        </form>
                                    </div>
                                </form>
                        </div>
                        <div class="row">
                            <div class="col-sm-8">
                                <button type="button" class="btn btn-info add-new"
                                    onclick="document.location='formular_neue_zimmerkategorie.php?AnbieterID=<?php echo $AnbieterID ?>&GebäudeID=<?php echo $GebäudeID ?>'">
                                    <span class="glyphicon glyphicon-plus"></span>&nbsp;
                                    Neue Zimmerkategorie hinzufügen</a></button>
                            </div>
                        </div>
                        <table class="table table-striped" width="450" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th scope="col">Zimmerkategorie</th>
                                    <th scope="col">Ausstattung</th>
                                    <th scope="col">Größe(m^2)</th>
                                    <th scope="col">Kapzität</th>
                                    <th scope="col">Etage</th>
                                    <th scope="col">Zimmernummer</th>
                                    <th scope="col">Preis/Nacht</th>
                                    <th scope="col">Editieren</th>
                                    <th scope="col">Löschen</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php getAnbieterZimmer($conn, $AnbieterID) ?>
                            </tbody>
                        </table>
                        </form>
                    </div>
                </div>
            </div>
        </div>


    </main>

    <hr />
    <footer>
        <div class="row">
            <img src="image_anbieter/logo.png" style="float: center; width:150px" alt="mylogo">
            <h4>FeelsLikeHome GmbH</h4>
            <p><a href="#">feelslikehome@gmail.com</a></p>
            <p>+49 1527362859</p>
        </div>
    </footer>


</body>



</html>
<?php mysqli_close($conn); ?>