<?php
$cCode = $_POST["cCode"];
$id = $_POST["id"];
$hasedit = $_POST["hasedit"];

#var_dump($hasedit);
$target_dir = "../src/img/";
//$targertname = $_POST["cCode"]. "/". $_POST["Fname"]." ".$_POST["Lname"]." ".$_POST["cCode"]." ".$_POST["hasedit"].".png";

$targertname = preg_replace('/[0-9]+/',"",substr($_POST["name"], 0, (strlen($_POST["name"]) - 4))).$_POST["hasedit"].".png"; 
#echo $targertname;


$target_file = $target_dir . basename($_FILES["inputfile"]["name"]);
$uploadOk = 1;



$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

$target_file = $target_dir . $targertname ;//basename($_FILES["inputfile"]["name"]);

#var_dump($_FILES["inputfile"]);
// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  echo $imageFileType;


  // Check if file already exists
  if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    echo $target_file;
    $uploadOk = 0;
  }

  // Check file size
  if ($_FILES["inputfile"]["size"] > 5000000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
  }

  // Allow certain file formats
  if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg" ) {
    echo "Sorry, only JPG, JPEG, PNG files are allowed.";
    #echo "$imageFileType";
    echo '<script> window.location.replace("http://brityearbook2020.tk/upload/photo.php?hasedit='.$_POST["hasedit"].'&Fname='.$_POST["Fname"].'&Lname='.$_POST["Lname"].'&cCode='.$_POST["cCode"].'&id='.$_POST["id"].'&name='.$_POST["name"].'&image=wrong");</script>';
    //http://brityearbook2020.tk/upload/photo.php?hasedit='..'&Fname='..'&Lname='..'&cCode='.$.'&id='.$.'&name='.$.'&image=wrong';
    $uploadOk = 0;
  }

  // Check if $uploadOk is set to 0 by an error
  if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
  // if everything is ok, try to upload file
  } else {
    if (move_uploaded_file($_FILES["inputfile"]["tmp_name"], $target_file)) {
      echo "The file ". basename( $_FILES["inputfile"]["name"]). " has been uploaded."; 
      $sucsess = 1;
    } else {
      echo "Sorry, there was an error uploading your file. why";
      die();
      $sucsess = 0;
    }
  }
}
if($sucsess == 1){

    

    $servername = ""; //Server name for SQL
    $username = "webaccsess"; //Username For SQL
    $password = ""; //Password For SQL yep Fuck security
    $dbname = ""; //DB name for SQL
    
    $conn = new mysqli($servername, $username, $password, $dbname); //Begin SQL connection 

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    $sql = "UPDATE yearbook SET hasedit = ".$hasedit.", imglocation = '".$targertname."'  WHERE id = ".$id." AND cCode='".$cCode."';";
    #var_dump($sql);
    
    $result = $conn->query($sql); //Run command
    var_dump($result);
    if ($result) {
      echo "<script> alert('Your Photo has been updated!'); window.location.replace('/'); </script>";
    }
}
  
?>
