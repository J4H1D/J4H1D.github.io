<?php
$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "artgallery";

$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
session_start();
$Username = $_SESSION['Username'];
$order_id = $_POST['oid'];
$art_id = $_POST['aid'];
if(isset($_POST['yes'])){
	$update_order = "UPDATE payment set Confirmation=1 WHERE id=$order_id";
	$update_art = "UPDATE arts set Arts_billing=2 WHERE Arts_id=$art_id";
	if ($conn->query($update_order) && $conn->query($update_art)){
	echo "The order is confirmed";
}
}
elseif (isset($_POST['no'])) {
	$update_order = "UPDATE payment set Confirmation=0 WHERE id=$order_id";
	$update_art = "UPDATE arts set Arts_billing= NULL WHERE Arts_id=$art_id";
	if ($conn->query($update_order) && $conn->query($update_art)){
	echo "The order is not confirmed";
}
}
}
?>