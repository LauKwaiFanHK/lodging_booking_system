<?php
include_once 'connect_db.php';
if(isset($_POST['save']))
{	 
	 $AnbieterID = $_POST['AnbieterID'];
     $GebäudeID = $_POST['GebäudeID'];
     $Zimmerkategorie = $_POST['Zimmerkategorie'];
	 $Ausstattung = $_POST['Ausstattung'];
	 $Größe = $_POST['Größe'];
	 $Kapazität = $_POST['Kapazität'];
	 $Etage = $_POST['Etage'];
     $Zimmernummer = $_POST['Zimmernummer'];
	 $Preis = $_POST['Preis'];
	 $sql = "INSERT INTO Zimmer (Zimmerkategorie,Ausstattung,Größe,Kapazität,Etage,Zimmernummer,Preis,AnbieterID,GebäudeID)
	 VALUES ('$Zimmerkategorie','$Ausstattung','$Größe','$Kapazität','$Etage','$Zimmernummer','$Preis','$AnbieterID','$GebäudeID')";
	 if (mysqli_query($conn, $sql)) {
		echo "New record created successfully !";
		
	 } else {
		echo "Error: " . $sql . "
" . mysqli_error($conn);
	 }
	 header('Location: anbieter_über_uns.php?AnbieterID='.$AnbieterID.'&GebäudeID='.$GebäudeID);
	 
}
?>