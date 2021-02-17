<?php
$servername='localhost';
$username='liakh';
$password='mango';
$dbname = 'liakh';
$conn=mysqli_connect($servername,$username,$password,$dbname);
if(!$conn){
   die('Could not Connect My Sql:');
}
echo 'Connect DB sucessfully'
?>