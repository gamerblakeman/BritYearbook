<?php
$section = $_GET["section"];
if($_GET["page"] != ""){
    $page=$_GET["page"];
}
#echo $page;
$name = array();
$qoute = array();
$imglc = array();





$nameA = array();
$pagesR = ($totalpages - ($page)) / 2;
$pagesL = ($page / 2) - 0.5;
$servername = "";
$username = "webaccsess";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  //die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM page";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
        $nameA[$row["selection"]] = $row["Fullname"];
  }
} else {
  echo "0 results";
}
$conn->close();








$pagesR = ($totalpages - ($page)) / 2;
$pagesL = ($page / 2) - 0.5;

$servername = "";
$username = "webaccsess";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
  //die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM yearbook";
$result = $conn->query($sql);
$i = 0;
if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    if($row['page'] == $page){
        if (strpos($row['cCode'], $section) !== false) {
            $name[$i] = $row['Fname']." ".$row['Lname'];
            $qoute[$i] = $row['quote'];
            $imglc[$i] = $row['imglocation'];
            $i = $i + 1;
        }
    }
        //var_dump($row);
  }
} else {
  echo "0 results";
}
$conn->close();


#var_dump($name);
if($name[0] == $name[1]){
    $name[1] = "";
    $qoute[1] = "";
    $imglc[1] = "";
}

//
//var_dump($imglc);
?>
<style>

    svg{
        height: 100%;
    }
    body{
        margin: 0.1;
        margin-left: 0.5VW;
        margin-right: 0.5VW;
        z-index: 10;
        font-family: "century-gothic", sans-serif;
    }
    .content{
        width: 100%;
        height: 100%;
        position: relative;
    }
    .rightc{
        width: 49%;
        height: 16%;
        position: absolute;
        right: 0;
        text-align: center;
        top: 3vw;
        margin-left: 1.5VW;
        margin-right: 1.5VW;
        padding: 0.5VW;
    }
    .leftc{
        width: 49%;
        height: 16%;
        position: absolute;
        left: 0;
        text-align: center;
        margin-left: 1VW;
        margin-right: 1VW;
        padding: 0.5VW;

    }
    .img{
        width:100%;
        height: 60%;

        display:block;
        margin:auto;
        
    }
    h3{
        font-size: 3vw;
        background: rgb(0,0,0);
        background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(255,255,255,1) 100%, rgba(255,255,255,1) 100%);
        color:floralwhite;
        width: auto;
        margin-top: 0px;
        margin-bottom: 0px;
        text-align: left;
    }
    .text{
        width:100%;
        height: 100%;
        position: absolute;
        left: 0%;
        top: 60%;
        border-color: black;
        border: black;
        border-width: 0px;
        border-style: solid;
        padding: 0.1VW;
    }
    .imge{
        display:block;
        margin:auto;
    }
    .name{
        font-weight: bold;
        font-size: 3vw;
        text-align: center;

    }
    .quote{
        font-size: 2vw;
        text-align: center;
    }
    .Blank{
        visibility: hidden; 
        position: absolute;
        transform: translate(-50%, -50%);
        left: 50%;
        top: 50%;
    }
</style>
<h1 id="Blank"class="Blank" style="">Blank</h1>
<div class="leftc">
    
    <h3><?php echo $nameA[$section];?></h3>
    <div class="1 content">
        
        <div class="img">
        <?php
            if($imglc[0] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[0])){
                echo'<img src="/src/img/'.$imglc[0].'" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[0];?></div>
            <div class="quote"><?php echo $qoute[0];?></div>
            <div class="messages"></div>
        </div>
    </div>
    <div class="2 content">
        <div class="img">
        <?php
            if($imglc[1] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[1])){
                echo'<img src="/src/img/'.$imglc[1].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[1];?></div>
            <div class="quote"><?php echo $qoute[1];?></div>
            <div class="messages"></div>
        </div>
        
    </div>
    <div class="3 content">
        <div class="img">
        <?php
            if($imglc[2] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[2])){
                echo'<img src="/src/img/'.$imglc[2].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[2];?></div>
            <div id="relay" class="quote"><script>document.getElementById("relay").innerText = '<?php print $qoute[2];?>'</script></div>
            <div class="messages"></div>
        </div>
    </div>

    <div class="1 content">
        
        <div class="img">
        <?php
            if($imglc[3] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[3])){
                echo'<img src="/src/img/'.$imglc[3].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[3];?></div>
            <div class="quote"><?php echo $qoute[3];?></div>
            <div class="messages"></div>
        </div>
    </div>


    <div class="2 content">
        <div class="img">
        <?php
            if($imglc[4] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[4])){
                echo'<img src="/src/img/'.$imglc[4].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[4];?></div>
            <div class="quote"><?php echo $qoute[4];?></div>
            <div class="messages"></div>
        </div>
        
    </div>
    <div class="3 content">
        <div class="img">
        <?php
            if($imglc[5] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[5])){
                echo'<img src="/src/img/'.$imglc[5].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[5];?></div>
            <div id="relaya" class="quote"><script>document.getElementById("relaya").innerText = '<?php print $qoute[5];?>'</script></div>
            <div class="messages"></div>
        </div>
    </div>
</div>






<div class="rightc">
    <div class="1 content">
        
        <div class="img">
        <?php
            if($imglc[6] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[6])){
                echo'<img src="/src/img/'.$imglc[6].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[6];?></div>
            <div class="quote"><?php echo $qoute[6];?></div>
            <div class="messages"></div>
        </div>
    </div>
    <div class="2 content">
        <div class="img">
        <?php
            if($imglc[7] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[7])){
                echo'<img src="/src/img/'.$imglc[7].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[7];?></div>
            <div class="quote"><?php echo $qoute[7];?></div>
            <div class="messages"></div>
        </div>
        
    </div>
    <div class="3 content">
        <div class="img">
        <?php
            if($imglc[8] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[8])){
                echo'<img src="/src/img/'.$imglc[8].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[8];?></div>
            <div class="quote"><?php echo $qoute[8];?></div>
            <div class="messages"></div>
        </div>
    </div>

    <div class="1 content">
        
        <div class="img">
        <?php
            if($imglc[9] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[9])){
                echo'<img src="/src/img/'.$imglc[9].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[9];?></div>
            <div class="quote"><?php echo $qoute[9];?></div>
            <div class="messages"></div>
        </div>
    </div>


    <div class="2 content">
        <div class="img">
        <?php
            if($imglc[10] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[10])){
                echo'<img src="/src/img/'.$imglc[10].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[10];?></div>
            <div class="quote"><?php echo $qoute[10];?></div>
            <div class="messages"></div>
        </div>
        
    </div>
    <div class="3 content">
        <div class="img">
        <?php
            if($imglc[11] == ""){
                echo "";
            }
            elseif (file_exists("../img/".$imglc[11])){
                echo'<img src="/src/img/'.$imglc[11].'" class="imge" width="auto" height="100%">';
            }
            else{
                echo '<svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 30 30">    <path d="M 15 3 C 11.686 3 9 5.686 9 9 L 9 10 C 9 13.314 11.686 16 15 16 C 18.314 16 21 13.314 21 10 L 21 9 C 21 5.686 18.314 3 15 3 z M 14.998047 19 C 10.992047 19 5.8520469 21.166844 4.3730469 23.089844 C 3.4590469 24.278844 4.329125 26 5.828125 26 L 24.169922 26 C 25.668922 26 26.539 24.278844 25.625 23.089844 C 24.146 21.167844 19.004047 19 14.998047 19 z"></path></svg>';
            }
        ?>
        </div>
        <div class="text">
            <div class="name"><?php echo $name[11];?></div>
            <div class="quote"><?php echo $qoute[11];?></div>
            <div class="messages"></div>
        </div>
    </div>
</div>
<script>
    if (/Android|webOS|iPhone|iPod|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
        if("<?php echo $_GET["section"];?>" == "BLN"){
            document.getElementById("Blank").style = "visibility: visible;";
        }
        
        console.log("Mobile phone")
    }
    //document.getElementById("Blank").style = "visibility: visible;";
</script>
