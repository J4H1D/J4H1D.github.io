<?php

$category = filter_input(INPUT_POST, 'category');
$title = filter_input(INPUT_POST, 'title');
$description = filter_input(INPUT_POST, 'description');
$price  = filter_input(INPUT_POST, 'price');
$image = filter_input(INPUT_POST, 'image');


$host = "localhost";
$dbusername = "root";
$dbpassword = "";
$dbname = "artgallery";

// Create connection
$conn = new mysqli ($host, $dbusername, $dbpassword, $dbname);

if (mysqli_connect_error()){
  die('Connect Error ('. mysqli_connect_errno() .') '
    . mysqli_connect_error());
}
else{
  $sql = "INSERT INTO arts (Arts_category, Arts_title, Arts_description, Arts_price, Arts_image)
  values ('$category', '$title', '$description', '$price', '$image')";
  
  if ($conn->query($sql)){
    echo "New art is inserted sucessfully";
  }
  else{
    echo "Error: ". $sql ."
". $conn->error;
  }
	 
 }
 
?>