<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Unterkunftsanbieter Seite - Über uns & unsere Angebote</title>
    <!--link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css"-->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
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
                <!-- direct to frontpage!-->
                <a class="navbar-brand" href="anbieter_über_uns.php?AnbieterID=<?php echo $AnbieterID ?>"><strong>FeelsLikeHome</strong></a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-euro"></span>
                        Währung auswählen<span class="caret "></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Europa – Euro</a></li>
                    </ul>
                </li>
                <li><a href="anbieter_hilfe.php?AnbieterID=<?php echo $AnbieterID ?>"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#">
                        <span class="glyphicon glyphicon-home"></span>
                        <?php echo getAnbieterName($conn, $AnbieterID) ?> <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="anbieter_über_uns.php?AnbieterID=<?php echo $AnbieterID ?>">Über uns & unsere
                                Angebote</a></li>
                        <li><a href="anbieter_auftragshistorie.php?AnbieterID=<?php echo $AnbieterID ?>">Auftragshistorie</a>
                        </li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-log-in"></span> Ausloggen</a></li>
            </ul>
        </div>
    </nav>
    <main>

        <div class="row">
            <div class="col-md-1"></div>
            <div class="row">
                <div class="col-md-8">
                    <br>
                    <form method="POST" action="insert_gebaeude_adresse.php">
                        <label for="exampleFormControlTextarea1">
                            <span class="glyphicon glyphicon-list-alt"></span>&nbsp;
                            Geben Sie die Adresse Ihrer Unterkunft ein:</label>
                        <div class="form-row">
                            <div class="col-md-2 mb-3">
                                <label for="validationCustom03">Hausnr.</label>
                                <input type="text" class="form-control" name="hausnummer" placeholder="Hausnummer" required />
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="validationCustom04">Straße</label>
                                <input type="text" class="form-control" name="Straße" placeholder="Straße" required />
                            </div>
                            <div class="col-md-2 mb-3">
                                <label for="validationCustom05">PLZ</label>
                                <input type="number" class="form-control" name="PLZ" placeholder="PLZ" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom05">Stadt</label>
                                <input type="text" class="form-control" name="Stadt" placeholder="Stadt" required />
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom03">Bundesland</label>
                                <input type="text" class="form-control" name="Bundesland" placeholder="Bundesland" required />
                            </div>
                            <div class="col-md-3 mb-3">
                                <label for="validationCustom04">Land</label>
                                <input type="text" class="form-control" name="Land" placeholder="Land" required />
                            </div>
                        </div>
                        <div class="form-row">
                            <form>
                                <div class="col-md-4 mb-3">
                                    <br>
                                    <label for="validationCustom03">Telefonnummer</label>
                                    <input type="text" class="form-control" name="Telefonnummer" placeholder="Telefonnummer" required />
                                </div>
                                <div class="col"></div>

                                <div class="col-md-12">
                                    <div class="text-left">
                                        <div class="btn-group">
                                            <br>
                                            <button type="button" class="btn btn-secondary"><a href="anbieter_gebaeude_form.php?AnbieterID=<?php echo $AnbieterID ?>&GebäudeID=<?php echo $GebäudeID ?>">
                                                    <span class="glyphicon glyphicon-floppy-disk"></span>&nbsp;speichern</a></button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </main>


</body>



</html>
<?php mysqli_close($conn); ?>