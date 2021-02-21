<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Unterkunftsanbieter - Gebäude Form</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>

<body translate="no">
    <?php
    include_once "connect_db.php";
    include_once "anbieter_lib.php";

    ?>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--img id="mylogo" src="untitled.png" width="200" class="center" alt="Logo des Buchungsplattforms"-->
                <a class="navbar-brand" href="#">FeelsLikeHome</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Währung auswählen<span
                            class="caret "></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="#">Europa – Euro</a></li>
                    </ul>
                </li>
                <li><a href="anbieter_hilfe.php?AnbieterID=<?php echo $AnbieterID ?>"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-home"></span> Tierpark Hotel <span
                            class="caret"></span></a>
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
        <div class="col-md-7">
            <?php
            $GebäudeID = $_GET["GebäudeID"]; 
            $AnbieterID = $_GET["AnbieterID"];
            ?>
            <form method="POST" action="update_anbieter_gebaeude.php">
                <label for="exampleFormControlTextarea1">Listen Sie die Details Ihrer Zimmerangebote
                    auf. </label>
                <input type="hidden" name='GebäudeID' value='<?php echo $GebäudeID ?>'>
                <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                <div class="form-row">
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom03">Hausnr.</label>
                        <input type="text" class="form-control" name="hausnummer" placeholder="Hausnummer" required
                            value="<?php echo getAnbieterHausnr($conn, $GebäudeID) ?>">
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="validationCustom04">Straße</label>
                        <input type="text" class="form-control" name="Straße" placeholder="Straße" required
                            value="<?php echo getAnbieterStrasse($conn, $GebäudeID) ?>">
                    </div>
                    <div class="col-md-2 mb-3">
                        <label for="validationCustom05">PLZ</label>
                        <input type="number" class="form-control" name="PLZ" placeholder="PLZ" required
                            value="<?php echo getAnbieterPLZ($conn, $GebäudeID) ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom05">Stadt</label>
                        <input type="text" class="form-control" name="Stadt" placeholder="Stadt" required
                            value="<?php echo getAnbieterStadt($conn, $GebäudeID) ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom03">Bundesland</label>
                        <input type="text" class="form-control" name="Bundesland" placeholder="Bundesland" required
                            value="<?php echo getAnbieterBundesland($conn, $GebäudeID) ?>">
                    </div>
                    <div class="col-md-3 mb-3">
                        <label for="validationCustom04">Land</label>
                        <input type="text" class="form-control" name="Land" placeholder="Land" required
                            value="<?php echo getAnbieterLand($conn, $GebäudeID) ?>">
                    </div>
                </div>
                <div class="form-row">
                    <div class="col-md-4 mb-3">
                        <br>
                        <label for="validationCustom03">Telefonnummer</label>
                        <input type="text" class="form-control" name="Telefonnummer" placeholder="Telefonnummer"
                            required value="<?php echo getAnbieterTelefonnr($conn, $GebäudeID) ?>">
                    </div>
                    <div class="col"></div>
                    <div class="col-md-12">
                        <div class="text-right">
                            <div class="btn-group">
                                <button type="submit" class="btn btn-secondary">speichern</button>
                            </div>
                        </div>
                        <br>
                    </div>

                </div>
            </form>
</body>



</html>
<?php mysqli_close($conn); ?>