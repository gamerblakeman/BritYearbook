<?php
$Cc = $_GET["Cc"];
$json = file_get_contents('../csv/'.$Cc.'.json');
$str     = str_replace('\u','u',$json);
$json = preg_replace('/u([\da-fA-F]{4})/', '&#x\1;', $str);
$newjson = json_decode($json, true);


$ip = $_SERVER['HTTP_CLIENT_IP'] ? $_SERVER['HTTP_CLIENT_IP'] : ($_SERVER['HTTP_X_FORWARDED_FOR'] ? $_SERVER['HTTP_X_FORWARDED_FOR'] : $_SERVER['REMOTE_ADDR']);
if($ip == ""){
    echo "yeet";
    die();
}
else{
    echo "hope";
    die();
}
//echo $ip;

$servername = "";
    $username = "webaccsess";
    $password = "";
    $dbname = "";

    $conn = new mysqli($servername, $username, $password, $dbname);
    // Check connection
    if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


$len = count($newjson);
foreach (range(0, $len -1) as $i) {
    $Fname = $newjson[$i][1];
    $Lname = $newjson[$i][0];
    $cCode = $newjson[$i][2];
    $text = $newjson[$i][3];
    $page = intval($newjson[$i][4]);
    $imgs = $cCode."/".$newjson[$i][5];
    $id = intval($newjson[$i][6]);
    $text = $newjson[$i][3];
    $quote  = str_replace(chr(194),"", $text);
    $quote  = str_replace("'","`", $quote);
    $Lname  = str_replace("'","`", $Lname);
    $Fname  = str_replace("'","`", $Fname);
    $imgs  = str_replace("'","`", $imgs);
    //echo $quote;
    $str     = str_replace('\u','u',$Fname);
    $Fname = preg_replace('/u([\da-fA-F]{4})/', '&#x\1;', $str);

    $sql = "INSERT INTO  yearbook (Fname, Lname, cCode, quote, imglocation, page, id, hasedit) VALUES ('$Fname', '$Lname', '$cCode', '$quote', '$imgs', $page, $id, 0);";

    
    

    //$sql = "SELECT * FROM yearbook";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
            var_dump($row);
    }
    } else {
    echo "0 results";
    }

    

}
$conn->close();

