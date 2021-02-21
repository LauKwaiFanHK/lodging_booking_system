<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="searchForm.css">
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
</head>
   
    <body>
    
<?php
ini_set('display_errors', '1');
ini_set('display_startup_errors', '1');
error_reporting(E_ALL);
$city = strip_tags($_POST['city']);
$checkin = strip_tags($_POST['checkin']);
$checkout = strip_tags($_POST['checkout']);
$numberOfGuests = strip_tags($_POST['numberOfGuests']);
if($numberOfGuests < 1)
	$numberOfGuests = 1;

$beautySights = $_POST['Sehenswurdigkeiten'];

$timestamp1 = strtotime($checkin);
$timestamp2 = strtotime($checkout);
$days = ($timestamp2 - $timestamp1)/(24*60*60);
$PAGE = $_GET['page'] ?: 1

?>
<div class="container mt-5 header">
				<div class="row">
					<div class="col-sm">
						<a href="/Suchseite.php"><h2><b>Plattfrom fur Unterkunfte</b></h2></a>
					</div>
					<div class="col-sm">
						<div class="container right">
							<div class="row">
								<div class="col-sm text-right currency">€</div>
								<div class="col-sm text-right">
									<span class="round-icon">?</span>
								</div>
								<div class="col-sm text-right">
									<?php 
									if(stripos($_SERVER['HTTP_COOKIE'],$_COOKIE['PHPSESSID']) !== false){?>
										<div class="login">
											<div class="dropdown d-none">
												<a href='/profile.php'>Profile</a>
												<a href='/history.php'>History</a>
												<a href='/logout.php'>Logout</a>
											</div>
										</div>
									<?} else {?>
										<a href="/signUpForm1.php" class='signup'>Login</a>
									<?}?>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="container mt-5">
<form action="showResults.php"  method="post">
  <div class="row justify-content-center">
  
   <?php


		$connection = mysqli_connect('localhost','liakh','mango','liakh');
		$result = mysqli_query($connection, "SELECT DISTINCT Stadt FROM `Gebäude`");
		
  ?>
   <div class="col-2 my-auto">
		<select name="city" class="form-control">
			<?php while($cities = mysqli_fetch_row($result)){
				foreach($cities as $key => $town) {?>
			
				<option <?=($town == $city) ? 'selected' : ''?> value="<?=$town?>"><?=$town?></option>
			<?php }
			}?>
		</select>
   </div>
   <div class="col-2 my-auto">
	   <input type="date" class="form-control" name="checkin" value="<?=$checkin?>">
   </div>
   <div class="col-2 my-auto">
	   <input type="date" class="form-control" name="checkout" value="<?=$checkout?>">
   </div>
   <div class="col-2 my-auto">
	   <input type="number" class="form-control" name="numberOfGuests" placeholder="Guests" value="<?=$numberOfGuests?>">
   </div>
   
  
	<div class="col-2 my-auto text-center custom-control custom-checkbox">
	  <input type="checkbox" class="custom-control-input" name="Sehenswurdigkeiten" <?=(!empty($beautySights)) ? 'checked' : ''?> id="customCheck1">
	  <label class="custom-control-label" for="customCheck1">Sehenswurdigkeiten anzeigen</label>
	 </div>
  
	<div class="col-2 my-auto mx-auto">
	   <input type="submit" value="Suchen">
   </div>
   
  </div>
</form>
</div>


<?php
ini_set('display_errors', 1); ini_set('display_startup_errors', 1); error_reporting(E_ALL);
//include_once 'connect_db.php';
include_once 'kunde_lib.php';

$KundeID = $_POST['KundeID'];
$city = $_POST['city'];
$checkin = $_POST['checkin'];
$checkout = $_POST['checkout'];
$numberOfGuests = $_POST['numberOfGuests'];
$Sehenswurdigkeiten = $_POST['Sehenswurdigkeiten'];
echo $KundeID;
echo $city;
echo $checkin;
echo $checkout;
echo $numberOfGuests;
echo $Sehenswurdigkeiten;
echo $KundeID;

$query = "SELECT * FROM Unterkunftsanbieter left join Zimmer on Unterkunftsanbieter.AnbieterID = Zimmer.AnbieterID left join Gebäude on Zimmer.GebäudeID = Gebäude.GebäudeID";
echo "<br><br>query1" . $query;
$city = "Berlin";
echo "<br><Br>city: " . $city;
$numberOfGuests = 2;
echo "<br><Br>guest: " . $numberOfGuests;
$checkin = "2020-12-29";
echo "<br><Br>checkin: " . $checkin;
$checkout = "2020-12-31";
echo "<br><Br>checkout: " . $checkout;
$Sehenswurdigkeiten = true;
echo "<br><Br>checkbox: " . $Sehenswurdigkeiten;

$filter = [];
$arCities = [];
     
$connection = mysqli_connect('localhost','liakh','mango','liakh');
$query = "SELECT * FROM Unterkunftsanbieter left join Zimmer on Unterkunftsanbieter.AnbieterID = Zimmer.AnbieterID left join Gebäude on Zimmer.GebäudeID = Gebäude.GebäudeID";
echo "<br><br> query:" . $query;

$filter = [];

if(!empty($city))
{
	$arCities = []; echo $arCities;
	$cities = mysqli_query($connection,"select * from Gebäude where Stadt = '{$city}'");
	if(!empty($cities)) {
		while($city = mysqli_fetch_assoc($cities))
		{
            $arCities[] = $city['GebäudeID'];
		}
	}
	
	if(!empty($arCities))
	{
		$arCities = implode(',',$arCities);
		$filter['city'] = "Gebäude.GebäudeID in ({$arCities})";
	}
}
echo "<br><br> filter[city]:" . $filter['city'];

if(!empty($numberOfGuests))
{
	$filter['Kapazität'] = "Zimmer.Kapazität >= {$numberOfGuests}";
}
echo "<br><br> filter[Kapazität]:" . $filter['Kapazität'];


if(!empty($checkin)) {
    $sql = "select * from Buchung left join Bucht on Buchung.BuchungID = Bucht.BuchungID where Buchung.CheckInDatum >= '{$checkin}'";
	$buch = mysqli_query($connection, $sql);
	if(mysqli_num_rows($buch) > 0) {
		while($bill = mysqli_fetch_assoc($buch))
		{
			$filter['ZimmerID'][] = $bill['ZimmerID'];
		}
    }
    echo "<br><br>sql: " . $sql;
}
echo "<br><br> filter[ZimmerID]:" . $filter['ZimmerID'];


if(!empty($checkout)) {
    $sql = "select * from Buchung left join Bucht on Buchung.BuchungID = Bucht.BuchungID where Buchung.CheckOutDatum <= '{$checkout}'";
	$buch = mysqli_query($connection, $sql);
	if(mysqli_num_rows($buch) > 0) {
		while($bill = mysqli_fetch_assoc($buch))
		{
			$filter['ZimmerID'][] = $bill['ZimmerID'];
		}
    }
    echo "<br><br>" . $sql;
}
echo "<br><br> filter[ZimmerID]:" . $filter['ZimmerID'];

if(!empty($checkout) && !empty($checkin)) {
    $sql = "select * from Buchung left join Bucht on Buchung.BuchungID = Bucht.BuchungID where Buchung.CheckOutDatum <= '{$checkout}' and Buchung.CheckInDatum >= '{$checkin}'";
	$filter['ZimmerID'] = [];
	$buch = mysqli_query($connection,$sql);
	if(mysqli_num_rows($buch) > 0) {
		while($bill = mysqli_fetch_assoc($buch))
		{
			$filter['ZimmerID'][] = $bill['ZimmerID'];
		}
	} else {
		unset($filter['ZimmerID']);
	}
}
echo "<br><br> filter[ZimmerID]:" . $filter['ZimmerID'];

if(!empty($filter['ZimmerID']))
{
	$filter['ZimmerID'] = array_unique($filter['ZimmerID']);
	$filter['ZimmerID'] = implode(',',$filter['ZimmerID']);
	$filter['ZimmerID'] = "Zimmer.ZimmerID not in ({$filter['ZimmerID']})";
}
echo "<br><br> filter[ZimmerID]:" . $filter['ZimmerID'];

if(!empty($filter)){
	$filter = implode(' and ',$filter);
	$query .= ' where '.$filter;
};

echo "<br><br> query2: " . $query;

$resultALL = mysqli_query($connection, $query);
$query .= ' LIMIT 6';

echo "<br><br> query3: " . $query;


if($PAGE > 1) {
	$query .= ' OFFSET '.(($PAGE * 6) - 6);
}

echo "<br><br> query4: " . $query;

$result = mysqli_query($connection, $query);

if ($result) {
    echo "hello";
	if (mysqli_num_rows($result) > 0) {
		$row = mysqli_fetch_array($result);
		$Name = $row['Name'];
		echo $Name;
		mysqli_free_result($result);
	} else {
        echo $query;
		echo "Row could not be found.";
	}
} else {
	echo " Error: " . $query . "
" . mysqli_error($connection);
}

?>
     
<div class='container mt-5'>
<div class="row align-center">
<?if(!$result){?>
	<h2 class="bold">Nichts gefunden, <a href="/Suchseite.php"> zurückkehren</a></h2>
<?} else {?>
    
<?while($line = mysqli_fetch_assoc($result))  {?>
      
		<div class="card" style="width: 18rem;" onclick='window.open("<?=$line['URL']?>")'>
		  <img class="card-img-top" src="<?=$line['Foto']?>" alt="<?=$line['Name']?>">
		  <div class="card-body">
			<div class='row'>
				<div class='col-sm'>
				<h5 class="card-title"><?=$line['Name']?> <?=$line['Unterkunftskategorie']?></h5>
				</div>
				<div class='col-sm text-right'>
					<div class='rating'><?=$line['Bewertung']?>/10</div>
				</div>
			</div>
			<p class="card-text"><?=$line['PLZ']?>, <?=$line['Stadt']?>, <?=$line['Straße']?></p>
			<p class="card-text align-right"><?=($line['Preis'] * $days)?>€</p>
		  </div>
		</div>
     
    
<?php }?>
<?}?>

</div>

<?
$pages = ceil(mysqli_num_rows($resultALL)/6);

if($pages <= 1) return;
?>
<div class="row align-center pt-5">
<nav aria-label="Page navigation example">
  <div class="pagination">
  <?if($_GET['page'] > 1){?>
    <div class="page-item">
	<form action="showResults2.php?page=<?=($PAGE - 1)?>"  method="post">
	<input type="hidden" name="city" value="<?=$city?>">
	<input type="hidden" name="checkin" value="<?=$checkin?>">
	<input type="hidden" name="checkout" value="<?=$checkout?>">
	<input type="hidden" name="numberOfGuests" value="<?=$numberOfGuests?>">
	<button type="submit" class="page-link">
      <span aria-hidden="true">&laquo;</span>
        <span class="sr-only">Previous</span>
	  </button>
	  </form>
    </div>
  <?}?>
	<?for($page = 1; $page <= $pages;$page++){?>
	<div class="page-item<?=$_GET['page'] == $page ? 'active' : ''?>">
	<form action="showResults2.php?page=<?=$page?>"  method="post">
	<input type="hidden" name="city" value="<?=$city?>">
	<input type="hidden" name="checkin" value="<?=$checkin?>">
	<input type="hidden" name="checkout" value="<?=$checkout?>">
	<input type="hidden" name="numberOfGuests" value="<?=$numberOfGuests?>">
	<button type="submit" class="page-link">
      <?=$page?>
	  </button>
	  </form>
    </div>
    <?}?>
	<?if($_GET['page'] < $pages){?>
    <div class="page-item">
	<form action="showResults2.php?page=<?=($PAGE + 1)?>"  method="post">
	<input type="hidden" name="city" value="<?=$city?>">
	<input type="hidden" name="checkin" value="<?=$checkin?>">
	<input type="hidden" name="checkout" value="<?=$checkout?>">
	<input type="hidden" name="numberOfGuests" value="<?=$numberOfGuests?>">
	<button type="submit" class="page-link">
      <span aria-hidden="true">&raquo;</span>
        <span class="sr-only">Next</span>
	  </button>
	  </form>
    </div>
	<?}?>
  </div>
</nav>
</div>
</div>

    </body>
</html>