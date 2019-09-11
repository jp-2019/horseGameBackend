<?php
//  header('Access-Control-Allow-Origin: *');
//  header( 'Access-Control-Allow-Headers: X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization');
//  header( 'Access-Control-Allow-Methods: GET, POST, OPTIONS, PUT, DELETE' );
//  header('Content-Type: application/json');

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
$id = $_GET["id"];

$check = "SELECT * FROM horses JOIN breeds ON horses.breed_id = breeds.id JOIN colors ON horses.color_id = colors.id JOIN users ON horses.userId = users.id WHERE horses.id='$id'";
mysqli_select_db($conn, 'horse_game');
$result = mysqli_query($conn, $check);
if(mysqli_num_rows($result) > 0){
    $info = mysqli_fetch_assoc($result);
    echo json_encode($info);
}
?>