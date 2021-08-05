<?php
/*ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);*/
include_once 'kunde_lib.php';

//$query = "SELECT * FROM Unterkunftsanbieter left join Zimmer on Unterkunftsanbieter.AnbieterID = Zimmer.AnbieterID 
            //left join Gebäude on Zimmer.GebäudeID = Gebäude.GebäudeID";
$city = $_POST['city']; 
$numberOfGuests = $_POST['numberOfGuests']; 
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$thingstodo = $_POST['Sehenswurdigkeiten'];
$timestamp1 = strtotime($checkin);
$timestamp2 = strtotime($checkout);
$days = ($timestamp2 - $timestamp1) / (24 * 60 * 60);
$PAGE = isset($_GET['page']) ? $_GET['page'] :  1;

$filter = [];
$arCities = [];

$connection = mysqli_connect('localhost', 'liakh', 'mango', 'liakh');
$query = "SELECT * FROM Unterkunftsanbieter left join Zimmer on Unterkunftsanbieter.AnbieterID = Zimmer.AnbieterID 
            left join Gebäude on Zimmer.GebäudeID = Gebäude.GebäudeID";

$filter = [];
//echo "city: " . $city;

if (!empty($city)) {
    $arCities = [];
    //echo $arCities;
    //echo "city: " . $city;
    $cities = mysqli_query($connection, "select * from Gebäude where Stadt = '{$city}'");
    if (!empty($cities)) {
        while ($city2 = mysqli_fetch_assoc($cities)) {
            $arCities[] = $city2['GebäudeID'];
        }
    }

if (!empty($arCities)) {
        $arCities = implode(',', $arCities);
        $filter['city2'] = "Gebäude.GebäudeID in ({$arCities})";
    }
}


if (!empty($numberOfGuests)) {
    $filter['Kapazität'] = "Zimmer.Kapazität >= {$numberOfGuests}";
}

if (!empty($checkin)) {
    $buch = mysqli_query($connection, "select * from Buchung left join Bucht on Buchung.BuchungID = Bucht.BuchungID where Buchung.CheckInDatum >= '{$checkin}'");
    if (mysqli_num_rows($buch) > 0) {
        while ($bill = mysqli_fetch_assoc($buch)) {
            $filter['ZimmerID'][] = $bill['ZimmerID'];
        }
    }
}

if (!empty($checkout)) {
    $buch = mysqli_query($connection, "select * from Buchung left join Bucht on Buchung.BuchungID = Bucht.BuchungID where Buchung.CheckOutDatum <= '{$checkout}'");
    if (mysqli_num_rows($buch) > 0) {
        while ($bill = mysqli_fetch_assoc($buch)) {
            $filter['ZimmerID'][] = $bill['ZimmerID'];
        }
    }
}

if (!empty($checkout) && !empty($checkin)) {
    $filter['ZimmerID'] = [];
    $buch = mysqli_query($connection, "select * from Buchung left join Bucht on Buchung.BuchungID = Bucht.BuchungID where Buchung.CheckOutDatum <= '{$checkout}' and Buchung.CheckInDatum >= '{$checkin}'");
    if (mysqli_num_rows($buch) > 0) {
        while ($bill = mysqli_fetch_assoc($buch)) {
            $filter['ZimmerID'][] = $bill['ZimmerID'];
        }
    } else {
        unset($filter['ZimmerID']);
    }
}

if (!empty($filter['ZimmerID'])) {
    $filter['ZimmerID'] = array_unique($filter['ZimmerID']);
    $filter['ZimmerID'] = implode(',', $filter['ZimmerID']);
    $filter['ZimmerID'] = "Zimmer.ZimmerID not in ({$filter['ZimmerID']})";
}

if (!empty($filter)) {
    $filter = implode(' and ', $filter);
    $query .= ' where ' . $filter . ' group by Unterkunftsanbieter.AnbieterID';
};

$resultALL = mysqli_query($connection, $query);
$query .= ' LIMIT 6';

//echo "<br><br> query4: " . $query;

if ($PAGE > 1) {
    $query .= ' OFFSET ' . (($PAGE * 6) - 6);
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Unterkunftsanbieter Suchen</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="kunde_suchseite.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">

</head>

<body>
    <?php
    $KundeID = $_GET["KundeID"];
    ?>

    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <!--img id="mylogo" src="untitled.png" width="200" class="center" alt="Logo des Buchungsplattforms"-->
                <<a class="navbar-brand" href="#">FeelsLikeHome</a>
            </div>
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown"><a class="dropdown-toggle" data-toggle="dropdown" href="#"><span class="glyphicon glyphicon-euro"></span> Währung auswählen<span class="caret "></span></a>
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
            </ul>
        </div>
    </nav>

    <div class="container">
        <form action="kunde_showResult.php?KundeID=<?php echo $KundeID ?>" method="post">
            <div class="card" style="width: 100rem;">
                <div class="card-body">
                    <div class="row">
                        <input type="hidden" name='KundeID' value='<?php echo $KundeID ?>'>
                        <?php
                        $result = mysqli_query($connection, "SELECT DISTINCT Stadt FROM Gebäude");
                        ?>
                        <div class="col-md-2">
                            <label>Reiseziel: </label>
                            <select name="city" class="form-control">
                                <?php while ($cities = mysqli_fetch_row($result)) {
                                    foreach ($cities as $key => $town) { ?>

                                        <option <?= ($town == $city) ? 'selected' : '' ?> value="<?= $town ?>"><?= $town ?></option>
                                <?php }
                                } ?>
                            </select>
                        </div>
                        <div class="col-md-3">
                            <label>Checkin-Datum:</label>
                            <input type="date" class="form-control" name="checkin" value="<?= $checkin ?>">
                        </div>
                        <div class="col-md-3">
                            <label>Checkout-Datum:</label>
                            <input type="date" class="form-control" name="checkout" value="<?= $checkout ?>">
                        </div>
                        <div class="col-md-1">
                            <label>Gäste:</label>
                            <input type="number" class="form-control" name="numberOfGuests" placeholder="1" min="1" value="<?= $numberOfGuests ?>">
                        </div>
                        <div class="col-md-3 text-center custom-control custom-checkbox">
                            <label>Reiseempfehlung anzeigen?:</label>
                            <input type="checkbox" class="custom-control-input" name="Sehenswurdigkeiten" <?= (!empty($thingstodo)) ? 'checked' : '' ?> id="customCheck1" data-toggle="tooptip" data-placement="bottom" title="Wählen Sie aus, um die Sehenswürdigkeiten in der Nähe anzusehen." style=width:20px;height:20px>
                        </div>
                    </div>
                    <br>
                    <div class="row">
                        <div class="text-center">
                            <button type="submit" class="btn btn-success">
                                suchen</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <br>

        <div class='container mt-5'>
            <div class="row align-center">

                <?php
                $result = mysqli_query($connection, $query);

                while ($row = mysqli_fetch_array($result)) {
                ?>
                    <div class="card" style="width: 28rem">
                        <a href="reisende_unterkunft_ausgewählt.php?KundeID=<?php echo $KundeID ?>&AnbieterID=<?php echo $row['AnbieterID'] ?>&checkin=<?php echo $checkin ?>&checkout=<?php echo $checkout ?>&guest=<?php echo $numberOfGuests ?>">
                            <img style="width: 26rem; height: 18rem" ; class=" card-img-top" src="<?php echo $row['Foto'] ?>" alt="<?php echo $row['Name'] ?>">
                            <div class="card-body">
                                <h3>
                                    <?php echo $row['Name'] . "<br>" ?>
                        </a>
                        </h3>
                        </a>
                        <h4>
                            <?php echo $row['Unterkunftskategorie'] ?>
                            <br>
                            <?php echo $row['Bewertung'] ?>/10
                            <br>
                            <?php echo $row['Hausnummer'] . ', ' . $row['Straße'] . ', ' . $row['Stadt'] ?>
                            <br>
                            <?php echo ($row['Preis'] * $days) ?>€
                        </h4>
                    </div>
            </div>
        <?php }
        ?>

        <?php
        $pages = ceil(mysqli_num_rows($resultALL) / 6);

        if ($pages <= 1) return;
        ?>
        <div class="row">
            <div class="text-right">
                <div class="btn-group">
                    <div class="page-item">
                        <?php if($_GET['page'] > 1 ){ ?>
                        <form action="kunde_showResult.php?KundeID=<?php echo $KundeID ?>&page=<?php echo ($PAGE - 1) ?>" method="post">
                            <input type="hidden" name="city" value="<?php echo $city ?>">
                            <input type="hidden" name="checkin" value="<?php echo $checkin ?>">
                            <input type="hidden" name="checkout" value="<?php echo $checkout ?>">
                            <input type="hidden" name="numberOfGuests" value="<?php echo $numberOfGuests ?>">
                            <button type="submit" class="page-link">
                                <span aria-hidden="true">&laquo; Previous  </span>
                            </button>
                        </form>
                    </div>
                </div>
                <?php } ?>
                <div class="btn-group">
                    <? for($page = 1; $page <= $pages;$page++){?>
                    <div class="page-item<?php $_GET['page'] == $PAGE ? 'active' : '' ?>">
                        <form action="kunde_showResult.php?KundeID=<?php echo $KundeID ?>&page=<?php echo $PAGE ?>" method="post">
                            <input type="hidden" name="city" value="<?php echo $city ?>">
                            <input type="hidden" name="checkin" value="<?php echo $checkin ?>">
                            <input type="hidden" name="checkout" value="<?php echo $checkout ?>">
                            <input type="hidden" name="numberOfGuests" value="<?php echo $numberOfGuests ?>">
                            <button type="submit" class="page-link">
                                <?php echo $PAGE ?>
                            </button>
                        </form>
                    </div>
                </div>
                <? }?>
                <div class="btn-group">
                    <? if($_GET['page'] < $pages){?>
                    <div class="page-item">
                        <form action="kunde_showResult.php?KundeID=<?php echo $KundeID ?>&page=<?php echo ($PAGE + 1) ?>" method="post">
                            <input type="hidden" name="city" value="<?php echo $city ?>">
                            <input type="hidden" name="checkin" value="<?php echo $checkin ?>">
                            <input type="hidden" name="checkout" value="<?php echo $checkout ?>">
                            <input type="hidden" name="numberOfGuests" value="<?php echo $numberOfGuests ?>">
                            <button type="submit" class="page-link">
                                <span aria-hidden="true">&raquo; Next</span>
                            </button>
                        </form>
                    </div>
                </div>
                <? }?>
            </div>
</body>

</html>
<?php mysqli_close($conn); ?>