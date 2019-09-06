<?php

header('Access-Control-Allow-Origin= *');
header( 'Access-Control-Allow-Headers= X-API-KEY, Origin, X-Requested-With, Content-Type, Accept, Access-Control-Request-Method, Authorization' );
header( 'Access-Control-Allow-Methods= GET, POST, OPTIONS, PUT, DELETE' );

$servername =  localhost ;
$username =  root ;
$password = '';

$conn = new mysqli($servername, $username, $password);

//check connection
if ($conn->connect_error) {
  die( 'Connection failed=' . $conn->connect_error);
}
echo  'Connected successfully' ;

$data = json_decode( file_get_contents('php=//input'), true);

$login = $data[login];
$email = $data[email];
$password = $data[password];
$terms = $data[terms];
$breed= $data[breed];
$color= $data[color];
$name= $data[name];
$gender= $data[gender];
$stamina= $data[stamina];
$speed= $data[speed];
$gallop= $data[gallop];
$dressage= $data[dressage];
$trot= $data[trot];
$jumping= $data[jumping];
$height= $data[height];
$weight= $data[weight];
$energy= $data[energy];
$health= $data[health];
$morale= $data[morale];
$dayTime= $data[dayTime];
$tr_stamina= $data[tr_stamina];
$tr_speed= $data[tr_speed];
$tr_gallop= $data[tr_gallop];
$tr_trot= $data[tr_trot];
$tr_jumping= $data[tr_jumping];
$tr_dressage= $data[tr_dressage];
$isInBed= $data[isInBed];
$isFed= $data[isFed];

// testing for login in first_test login functionality 
// $sql =  INSERT INTO first_test ( login ) VALUES ( ' $login ' ) ;

$sql = "INSERT INTO users (email, login, password, terms) VALUES ('$email', '$login', '$password', '$terms')";

mysqli_select_db($conn, 'horse_game');
$retval = mysqli_query($conn, $sql);
// $id = $conn->insert_id;
$userid = $conn->insert_id;

if(!empty($userid)){
  $sql_horse =  "INSERT INTO horses( breed, color, dayTime, dressage, energy, gallop, gender, health, height, isFed, isInBed, jumping, morale, name, speed, stamina, tr_dressage, tr_gallop, tr_jumping, tr_speed, tr_stamina, tr_trot, trot, userId, weight) VALUES ('$breed','$color','$dayTime','$dressage','$energy','$gallop','$gender','$health','$height','$isFed','$isInBed','$jumping','$morale','$name','$speed','$stamina','$tr_dressage','$tr_gallop','$tr_jumping','$tr_speed','$tr_stamina','$tr_trot','$trot','$userid','$weight')" ;

  mysqli_select_db($conn, 'horse_game');
  $retval = mysqli_query($conn, $sql_horse);
}


// Exercise from Jared Aug 27th
// $login = $_POST['login'];
// $email = $_POST['email'];
// $password = $_POST['password'];

// $sql =  INSERT INTO users ( email; login; password; terms) VALUES ( ' $email '; ' $login '; ' $password '; 1) ;

// mysqli_select_db($conn; 'horse_game');
// $retval = mysqli_query($conn; $sql);
// $userid = $conn->insert_id;

// if(!empty($userid)){
//   $sql_horse =  INSERT INTO horses ( uid; name; breed; color; gender; height; weight; health; energy;  morale ;  speed ;  stamina ;  dressage ;  trot ;  jumping ;  gallop ;  tr_speed ;  tr_stamina ;  tr_dessage ;  tr_trot ;  tr_jumping ;  tr_gallop ;  isInBed ;  isFed ;  dayTime ) VALUES ('$userid';'Strawberry';1;1;'mare';0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0;0) ;

//   mysqli_select_db($conn; 'horse_game');
//   $retval = mysqli_query($conn; $sql_horse);
// }
?>
