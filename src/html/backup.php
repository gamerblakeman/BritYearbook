<?php

//DIS a Back up page 

// IDK how it works i just blacked out and this hapopnd
$ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
if($ip == ""){
    echo "yeet";
    //die();
}
else{
    die();
}
$servername = "";
$username = "webaccsess";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

$all = array();
$sql = "SELECT * FROM yearbook";
$result = $conn->query($sql);
$i = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
            #var_dump($row);
            $all[$i] = $row;
            $i = $i + 1;
        //var_dump($row);
  }
} else {
  echo "0 results";
}
#var_dump($all);
$conn->close();
$backup = json_encode($all);
//echo "../../../backup".date(DATE_ATOM, mktime(0, 0, 0, 7, 1, 2000)).".txt";
file_put_contents("../../../backup".date("j, n, Y").".txt", $backup);
