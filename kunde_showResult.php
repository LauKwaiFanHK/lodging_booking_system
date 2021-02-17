<?php

include_once 'connect_db.php';
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

$city = "Berlin";

$filter = [];
echo "<br>"; "filter: " . $filter . "<br>";

$arCities = [];
echo "arCities: " . $arCities . "<br>";

echo "cities: ";
getCities($conn);
    
while($city = mysqli_fetch_assoc($cities))
		{
			$arCities[] = $city['GebäudeID'];
        }
    
    echo $arCities;
	
	if(!empty($arCities))
	{
		$arCities = implode(',',$arCities);
		$filter['city'] = "Gebäude.GebäudeID in ({$arCities})";
	}

if(!empty($numberOfGuests))
{
	$filter['Kapazität'] = "Zimmer.Kapazität >= 1 ";
}

if(!empty($checkin)) {
	$buch = mysqli_query($connection,"select * from buchung left join bucht on buchung.BuchungID = bucht.BuchungID where buchung.CheckInDatum >= '{$checkin}'");
	if(mysqli_num_rows($buch) > 0) {
		while($bill = mysqli_fetch_assoc($buch))
		{
			$filter['ZimmerID'][] = $bill['ZimmerID'];
		}
	}
}
if(!empty($checkout)) {
	$buch = mysqli_query($connection,"select * from buchung left join bucht on buchung.BuchungID = bucht.BuchungID where buchung.CheckOutDatum <= '{$checkout}'");
	if(mysqli_num_rows($buch) > 0) {
		while($bill = mysqli_fetch_assoc($buch))
		{
			$filter['ZimmerID'][] = $bill['ZimmerID'];
		}
	}
}

if(!empty($checkout) && !empty($checkin)) {
	$filter['ZimmerID'] = [];
	$buch = mysqli_query($connection,"select * from buchung left join bucht on buchung.BuchungID = bucht.BuchungID where buchung.CheckOutDatum <= '{$checkout}' and buchung.CheckInDatum >= '{$checkin}'");
	if(mysqli_num_rows($buch) > 0) {
		while($bill = mysqli_fetch_assoc($buch))
		{
			$filter['ZimmerID'][] = $bill['ZimmerID'];
		}
	} else {
		unset($filter['ZimmerID']);
	}
}

if(!empty($filter['ZimmerID']))
{
	$filter['ZimmerID'] = array_unique($filter['ZimmerID']);
	$filter['ZimmerID'] = implode(',',$filter['ZimmerID']);
	$filter['ZimmerID'] = "Zimmer.ZimmerID not in ({$filter['ZimmerID']})";
}
if(!empty($filter)){
	$filter = implode(' and ',$filter);
	$query .= ' where '.$filter;
};

$resultALL = mysqli_query($connection, $query);
$query .= ' LIMIT 6';

if($PAGE > 1) {
	$query .= ' OFFSET '.(($PAGE * 6) - 6);
}

$result = mysqli_query($connection, $query);


mysqli_close($conn);

?>
