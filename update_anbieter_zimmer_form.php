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
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Tierpark Hotel <span
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
            $ZimmerID = $_GET["ZimmerID"];
            $AnbieterID = getAnbieterID($conn, $ZimmerID);
            $GebäudeID = getGebäudeID($conn, $ZimmerID);
            ?>
            <form method="POST" action="update_anbieter_zimmer.php">
                <label for="exampleFormControlTextarea1">Listen Sie die Details Ihrer Zimmerangebote
                    auf.</label>
                <br>
                <input type="hidden" name='ZimmerID' value='<?php echo $ZimmerID ?>'>
                <input type="hidden" name='AnbieterID' value='<?php echo $AnbieterID ?>'>
                <input type="hidden" name='GebäudeID' value='<?php echo $GebäudeID ?>'>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="">Zimmerkategorie</label>
                    </div>
                    <div class="col-md-6">
                        <input type="text" name="Zimmerkategorie" class="form-control mx-sm-3"
                            value="<?php echo getZimmerkategorie($conn, $ZimmerID); ?>">
                    </div>
                    <br>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="">Größe(m^2)</label>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="Größe" class="form-control mx-sm-3"
                            value="<?php echo getGrosse($conn, $ZimmerID); ?>">
                    </div>
                    <br>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="">Kapazität</label>
                    </div>
                    <div class="col-md-2">
                        <input type="number" name="Kapazität" class="form-control mx-sm-3"
                            value="<?php echo getKapazitaet($conn, $ZimmerID); ?>">
                    </div>
                    <br>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="">Ausstattung</label>
                    </div>
                    <div class="col-md-10">
                        <input type="text" name="Ausstattung" class="form-control mx-sm-3"
                            value="<?php echo getAusstattung($conn, $ZimmerID); ?>">
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="">Etage</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" name="Etage" class="form-control mx-sm-3"
                            value="<?php echo getEtage($conn, $ZimmerID); ?>">
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="">Zimmernummer</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" name="Zimmernummer" class="form-control mx-sm-3"
                                value="<?php echo getZimmernummer($conn, $ZimmerID); ?>">
                        </div>
                        <br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="">Etage</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="inputEtage" class="form-control mx-sm-3">
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="">Zimmernummer</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" id="inputZimmernummer" class="form-control mx-sm-3">
                        </div>
                        <br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="">Etage</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="inputEtage" class="form-control mx-sm-3">
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="">Zimmernummer</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" id="inputZimmernummer" class="form-control mx-sm-3">
                        </div>
                        <br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="">Etage</label>
                    </div>
                    <div class="col-md-3">
                        <input type="text" id="inputEtage" class="form-control mx-sm-3">
                    </div>
                    <div class="form-group">
                        <div class="col-md-2">
                            <label for="">Zimmernummer</label>
                        </div>
                        <div class="col-md-5">
                            <input type="text" id="inputZimmernummer" class="form-control mx-sm-3">
                        </div>
                        <br>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="">Preis/Nacht</label>
                    </div>
                    <div class="col-md-4">
                        <input placeholder="0.00" required name="Preis" min="0" step="0.01" title="Currency"
                            id="inputPreis" class="form-control mx-sm-3"
                            value="<?php echo getPreis($conn, $ZimmerID); ?>">
                    </div>
                </div>

                <div class="form-row">
                    <div class="col-md-12">
                        <div class="text-right">
                            <div class="btn-group">
                                <input type="submit" name="save" value="Absenden">
                                <input type="button" value="Zurück!" onclick="history.back()">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </main>



</body>

</html>
<?php mysqli_close($conn); ?>