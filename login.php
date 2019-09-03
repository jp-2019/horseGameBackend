<?php
 header('Access-Control-Allow-Origin: *');
 header( 'Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization' );
 header( 'Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE' );
 header('Content-Type: application/json');

$servername =  "localhost";
$username = "root";
$password = "";

$conn = new mysqli($servername, $username, $password);

//check connection
if ($conn->connect_error) {
  die("Connection failed=" . $conn->connect_error);
}


$data = json_decode(file_get_contents('php://input'), true);

/*$login = $data['login'];*/
$login = $_GET["login"];
$password = $_GET["password"];

$check = "SELECT * FROM users WHERE login=' $login ' OR password=' $password ' ";
mysqli_select_db($conn, 'horse_game');
$result = mysqli_query($conn, $check);
if(mysqli_num_rows($result) > 0){
    echo json_encode(mysqli_fetch_assoc($result));
 /*while ($row = mysqli_fetch_assoc($result)){
    echo "Name: " . $row["login"] . "<br>";
 }*/
}
    
?>