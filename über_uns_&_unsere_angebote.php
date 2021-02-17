<!DOCTYPE html>
<html lang="de">

<head>
    <meta charset="UTF-8">
    <title>Unterkunftsanbieter Seite - Über uns & unsere Angebote</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="style.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
</head>


<body translate="no">
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
                        <li><a href="#">Hong Kong Dollars – HKD</a></li>
                        <li><a href="#">United Kingdom Pounds – GBP</a></li>
                        <li><a href="#">United States Dollars – USD</a></li>
                    </ul>
                </li>
                <li><a href="#"><span class="glyphicon glyphicon-question-sign"></span>Hilfe</a></li>
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"> Tierpark Hotel <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="">Über uns & unsere Angebote</a></li>
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
                <h2 class="col-md-11" style>&nbsp; &nbsp; Tierpark Hotel</h2>
            </div>
            <div class="row">
                <div class="col-md-1"></div>
                <div class="col-md-3">
                    <div class="card" style="width: 26rem;">
                        <img class="card-img-top" src="photo_background.png" alt="Unterkunftsprofilbild" style="width:250px">
                        <br>
                        <br>
                        <div class="col text-center">
                            <button type="button" class="btn btn-secondary">Foto verändern</button>
                        </div>
                        <div class="card-body">
                            <h4 class="card-title"> Tierpark Hotel</h4>
                            <ul>
                                <li>&nbsp; &nbsp; E-Mail: </li>
                                <li>&nbsp; &nbsp;Website: </li>
                                <li>&nbsp; &nbsp;Unterkufntskategorie: </li>
                            </ul>
                            <h5> Gebäude A</h5>
                            <ul>
                                <li>&nbsp; &nbsp;Telefonnummer:</li>
                                <li>&nbsp; &nbsp;Adressenummer:</li>
                            </ul>
                        </div>
                    </div>
                </div>
                <div class="col-md-7">
                    <form action="update_anbieter_nachricht.php?" method="post">
                        <input type="hidden" name='AnbieterID' value='<?php echo $_GET["AnbieterID"] ?>'>
                        <div class="form-group">
                            <label for="exampleFormControlTextarea1">Schreiben Sie eine Nachricht an der
                                Reisende:</label>
                            <textarea class="form-control" name="Nachricht" rows="4" placeholder="Beispiel: Herzlich Willkommen! Tierpark Hotel ist eine 4-Sterne-Hotel. Bei uns werden Sie die besten Unterkunft in Berlin erfahren. Umweltschutz ist uns von überragender Bedeutung. Deswegen bieten wir zum alle Mahlzeiten mit bio-Lebensmitteln an. Wir sind eines der besten Arbeitgeber in Berlin."><?php echo $Nachricht; ?></textarea>
                        </div>
                        <div class="text-right">
                            <div class="btn-group">
                                <button type="button" class="btn btn-secondary">editieren</button>
                            </div>
                            <div class="btn-group">
                                <button type="submit" class="btn btn-secondary" name="save">speichern</button>
                            </div>
                        </div>
                        <br>
                    </form>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-7">
                        <label class=>Laden Sie Fotos Ihrer Unterkunft hoch:</label>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="image" accept="image/*" capture style="display:none" id="exampleFormControlFile1" />
                                <img src="camera.png" id="upload_photo" style="cursor:pointer" width="30" height="auto" />
                                </p>
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="image" accept="image/*" capture style="display:none" id="exampleFormControlFile1" />
                                <img src="camera.png" id="upload_photo" style="cursor:pointer" width="30" height="auto" />
                                </p>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-6">
                                <input type="file" name="image" accept="image/*" capture style="display:none" id="exampleFormControlFile1" />
                                <img src="camera.png" id="upload_photo" style="cursor:pointer" width="30" height="auto" />
                                </p>
                            </div>
                            <div class="col-md-6">
                                <input type="file" name="image" accept="image/*" capture style="display:none" id="exampleFormControlFile1" />
                                <img src="camera.png" id="upload_photo" style="cursor:pointer" width="30" height="auto" />
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-7">
                        <form>
                            <div class="form-group">
                                <label for="exampleFormControlTextarea1">Listen Sie die Austattung Ihrer Unterkunft
                                    auf.</label>
                                <textarea class="form-control" id="exampleFormControlTextarea1" rows="4" placeholder="Beispiel: Nichtraucherzimmer, Restaurant, Privatparkplatz, WLAN, Bar"></textarea>
                            </div>
                            <div class="text-right">
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary">editieren</button>
                                </div>
                                <div class="btn-group">
                                    <button type="button" class="btn btn-secondary">speichern</button>
                                </div>
                            </div>
                            <br>
                        </form>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4"></div>
                    <div class="col-md-7">
                        <form method="POST" action="insert_gebaeude_adresse.php">
                            <label for="exampleFormControlTextarea1">Listen Sie die Details Ihrer Zimmerangebote
                                auf.</label>
                            <div class="form-row">
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom03">Hausnr.</label>
                                    <input type="text" class="form-control" name="hausnummer" placeholder="Hausnummer" required>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="validationCustom04">Straße</label>
                                    <input type="text" class="form-control" name="Straße" placeholder="Straße" required>
                                </div>
                                <div class="col-md-2 mb-3">
                                    <label for="validationCustom05">PLZ</label>
                                    <input type="number" class="form-control" name="PLZ" placeholder="PLZ" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom05">Stadt</label>
                                    <input type="text" class="form-control" name="Stadt" placeholder="Stadt" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom03">Bundesland</label>
                                    <input type="text" class="form-control" name="Bundesland" placeholder="Bundesland" required>
                                </div>
                                <div class="col-md-3 mb-3">
                                    <label for="validationCustom04">Land</label>
                                    <input type="text" class="form-control" name="Land" placeholder="Land" required>
                                </div>
                            </div>
                            <div class="form-row">
                                <form>
                                    <div class="col-md-4 mb-3">
                                        <br>
                                        <label for="validationCustom03">Telefonnummer</label>
                                        <input type="text" class="form-control" name="Telefonnummer" placeholder="Telefonnummer" required>
                                    </div>
                                    <div class="col"></div>
                                    <div class="col-md-12">
                                        <div class="text-right">
                                            <div class="btn-group">
                                                <button type="button" class="btn btn-secondary">editieren</button>
                                            </div>
                                            <div class="btn-group">
                                                <button type="submit" class="btn btn-secondary">speichern</button>
                                            </div>
                                        </div>
                                        <br>
                                    </div>
                                </form>
                            </div>
                            <div class="form-row">
                                <form>
                                    <div class="row">
                                        <div class="col-sm-8">
                                            <button type="button" class="btn btn-info add-new" onclick="document.location='formular_neue_zimmerkategorie.php?anbieterId=1&GebäudeID=1'">Neue Zimmerkategorie hinzufügen</button>
                                        </div>
                                    </div>
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th scope="col">Ausstattung</th>
                                                <th scope="col">Größe(m^2)</th>
                                                <th scope="col">Kapzität</th>
                                                <th scope="col">Zimmernummer</th>
                                                <th scope="col">Preis/Nacht</th>
                                                <th>Aktionen</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <th scope="row"></th>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td></td>
                                                <td>
                                                    <a class="add" title="Add" data-toggle="tooltip"><i class="material-icons">&#xE03B;</i></a>
                                                    <a class="edit" title="Edit" data-toggle="tooltip"><i class="material-icons">&#xE254;</i></a>
                                                    <a class="delete" title="Delete" data-toggle="tooltip"><i class="material-icons">&#xE872;</i></a>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </form>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <p>fdfd</p>
        </div>
        </div>

    </main>



</body>



</html>