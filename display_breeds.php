<?php
$servername =  "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

//check connection
if ($conn->connect_error) {
  die("Connection failed=" . $conn->connect_error);
}

$check = "SELECT id, breed, breed_key, best_skill FROM breeds";
mysqli_select_db($conn, 'horse_game');
$result = mysqli_query($conn, $check);
$info = mysqli_fetch_all($result, MYSQLI_ASSOC);
echo json_encode($info);

?>