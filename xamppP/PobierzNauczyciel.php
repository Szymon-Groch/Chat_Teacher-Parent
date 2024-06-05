<?php
$servername = "localhost";
$username = "userABC";
$password = "abc";
$dbname = "czat";


$ID_n=$_GET["dane1"];


$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT idnauczyciel,imie,nazwisko,IDkonta FROM `nauczyciele` WHERE IDkonta=".$ID_n.";";

$result = $conn->query($sql);
$dbdata = array();
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
	$dbdata[]=$row;
  }
  //$myJSON = json_encode($select);
  echo json_encode($dbdata);
} else {
  echo "0 results";
}

$conn->close();
?>