<?php
require_once('connect_db.php');

	$result = mysqli_query($conn, "SELECT * FROM Kunde where Auth = 1");
	while($user = mysqli_fetch_assoc($result)) {
			if(stripos($user['Sess'],$_SERVER['HTTP_COOKIE']) !== false){
										
			$logout = mysqli_query($conn, "UPDATE Kunde SET Auth = NULL, Sess = '' WHERE KundeID = {$user['KundeID']}");
										
			if($logout){
				print_r($user);
				}
			}
	}
									
	header('Location: http://172.16.32.201/~lauk/Buchungsplattform/frontpage.php');
