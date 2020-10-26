<head>
<?php 
$lockdown = 1;
$dsableedit = 1;
echo "123";
$totalpages = 71;
if($_GET["page"] != ""){
    $page=$_GET["page"];
}
else{
    $page = 0;
}
$name = array();
$pagesR = ($totalpages - ($page)) / 2;
$pagesL = ($page / 2) - 0.5;
$servername = "";
$username = "webaccsess";
$password = "";
$dbname = "";

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
    echo "oh no";
  //die("Connection failed: " . $conn->connect_error);
  
}

$sql = "SELECT * FROM page";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
        $code[$row["no"]] = $row["selection"];
        $first[$row["no"]] = $row["first"];
        $name[$row["no"]] = $row["Fullname"];
  }
} else {
  echo "0 results";
}
$conn->close();

?>
<link rel="icon" href="/src/img/icon.png">
<title>Brit Year book 2020</title>
<style>
    body{
        margin: 0;
        background-image: url("/src/img/background.png");
        background-repeat: no-repeat;
        background-attachment: fixed; 
        background-size: 100% 100%;
        overflow: hidden;
    }
    .Main{
        position: absolute;
        vertical-align: middle;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 606;
        height: 95%;
        border: 3px solid black;
        background-color: ghostwhite;
        z-index: 3;
    }
    .centerstuff{
        position: absolute;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        height: 100%;
        width: 20%;
        background: rgb(248,248,255);
        background: linear-gradient(90deg, rgba(248,248,255,1) 42%, rgba(0,0,0,1) 50%, rgba(248,248,255,1) 62%);
        z-index: 40;
        opacity: 1;
    }
    .half{
        position: absolute;
        vertical-align: middle;
        left: 50%;
        top: 50%;
        transform: translate(-50%, -50%);
        width: 50%;
        height: 95%;
        border: 3px solid black;
        background-color: ghostwhite;
        
    }
    .left{
        height: 100%;
        width: 50%;
        position: absolute;
        left: 0;
        top: 0;
        overflow: hidden;
        z-index: 50;
        
    }
    .right{
        height: 100%;
        width: 50%;
        position: absolute;
        right: 0;
        top: 0;
        overflow: hidden;
        z-index: 50;
        
    }
    .full{
        height: 100%;
        width: 100%;
        position: absolute;
        right: 0;
        top: 0;
        overflow: hidden;
        z-index: 99;
    }
    iframe{
        overflow: hidden;
        position:relative;
        z-index: 999;
        
    }
    h2{
        background: rgb(0,0,0);
        background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(255,255,255,1) 100%, rgba(255,255,255,1) 100%);
        color:floralwhite;
        width: 100px;
    }
    .leftspine{
        background: rgb(0,0,0);
        background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(255,255,255,1) 100%, rgba(255,255,255,1) 100%);
        width: 3%;
        height: 100%;
        position: absolute;
        left: 0;
        z-index: 50;
    }
    .rightspine{
        background: rgb(255,255,255);
        background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 0%, rgba(0,0,0,1) 100%);
        width: 3%;
        height: 100%;
        position: absolute;
        right: 0;
        z-index: 50;
    }
    .button{
        width: 5%;
        height: 100%;
        background-color: black;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translate(-0%, -50%);
        opacity: 0.1;

        z-index: 999;
    }
    .buttonback{
        width: 5%;
        height: 100%;
        background-color: black;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translate(-0%, -50%);
        opacity: 0.1;

        z-index: 999;
    }
    .backarr{
        width:5%;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translate(-0%, -50%);
        opacity: 1;

        z-index: 999;
    }
    .nextarr{
        width:5%;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translate(-0%, -50%);
        opacity: 1;

        z-index: 999;
    }
    .changetool{
        visibility: hidden;
        position: absolute;
        left: 50%;
        top: -20%;
        background-color: black;
        opacity: 1;
        color: white;
    }
    .hometool{
        visibility: hidden;
        position: absolute;
        right: 39%;
        top: -20%;
        background-color: black;
        opacity: 1;
        color: white;
    }
    .home{
        position: absolute;
        right: 40%;
        bottom: 0%;
        transform: translate(-50%, -0%);
        opacity: 1;
        height: 100%;
    }
    .contencetool{
        visibility: hidden;
        position: absolute;
        left: 44%;
        top: -20%;
        background-color: black;
        opacity: 1;
        color: white;
    }
    .change{
        position: absolute;
        left: 50%;
        bottom: 0%;
        transform: translate(-50%, -0%);
        opacity: 1;
        height: 100%;
    }

    .contence{
        position: absolute;
        left: 44%;
        bottom: 5%;
        transform: translate(-50%, -0%);
        opacity: 1;
        height: 85%;
    }
    
    .bottomstuff{
        width: 100%;
        position: absolute;
        height: 2VW;
        left: 50%;
        bottom: 0%;
        z-index: 999;
        transform: translate(-50%, -0%);
        opacity: 1.5;
        background: rgb(0,0,0, 0.1);
        
    }
    .background{
        z-index: 10;
        position: absolute;
        width: 100%;
        height: 100%;
        
    }
    .linesR{
        position: absolute;
        height: 100%;
        right: -<?php echo ((4.559666666666667 * $pagesR)+3);?>;
        bottom: -3;
        <?php if($page == 0){echo "visibility: hidden;";}?>
        border: 3px solid black;
        border-left: 0px solid black;

    }
    .linesL{
        position: absolute;
        height: 100%;
        left: -<?php echo ((4.560*$pagesL)+3);?>;
        bottom: -3;
        <?php if($page == $totalpages){echo "visibility: hidden;";}?>
        border-top: 3px solid black;
        border-bottom: 3px solid black;

        
    }
    .linesmain{
        height: 100%;
        width:4.560;
    }
    .help{
        position: absolute;
        left: 0;
        bottom: 0;
        z-index: 1000;
    }
</style>
</head>
    <body>
    <?php
    //1235.46
    #echo $page;
    $fpage = 15;
    $lastpage = $fpage + 51;

    if(($page >= $fpage)&&($page <= $lastpage)){
        $show = 1;
        $section = $code[$page - $fpage+1];
        $selection = $name[$page - $fpage+1];
        $pageA = $page - ($first[$page - $fpage+1]+ $fpage) + 2;
        $pageb = $page + 1;
        $sectionA = $code[$pageb - $fpage+1];
        $pageAA = $pageb - ($first[$pageb - $fpage+1]+ $fpage) + 2;
        echo "<script>console.log('".$pageA."');</script>";
        echo "<script>console.log('".$pageAA."');</script>";
    }

    elseif($page == 0 or $page == $totalpages){
        if($lockdown == 1){
            echo "<meta http-equiv='refresh' content='0; URL=https://brityearbook2020.tk/?page=13' />";
        }
        else{
            $show = 2;
        }
    }else{
        if($lockdown == 1 and $page != 13){
            echo "<meta http-equiv='refresh' content='0; URL=https://brityearbook2020.tk/?page=13' />";
        }
        else{
            $show = 3;
        }
        
    }







    if($show == 1){
        echo '<div id="Main" class="Main"> <div class="left"><div class="rightspine"></div><img src="/src/img/Backgroundbook.png" class="background"> <iframe scrolling="no"  frameBorder="0" width="100%" height="100%"src="/src/html/left.php?page='.$pageA.'&section='.$section.'"></iframe></div><div class="right"><div class="leftspine"></div><img src="/src/img/Backgroundbook.png" class="background"> <iframe scrolling="no" frameBorder="0" width="100%" height="100%"src="/src/html/left.php?page='.$pageAA.'&section='.$sectionA.'"></iframe></div>';
    }
    if($show == 2){
        echo '<div id="Half" class="half"><iframe src="/src/html/'.$page.'.html" width="100%" height="100%" scrolling="no"  frameBorder="0" height="100%"></iframe>';
    }
    if($show == 3){
        echo '<div id="Main" class="Main"><div class="centerstuff"></div> <div class="full"><iframe src="/src/html/'.$page.'.html" width="100%" scrolling="no"  frameBorder="0" height="100%"></iframe></div>';
    }






//<div class="left"><h2>'.$section.'</h2> <h2>'.$section.'</h2>




    
    $x = $pagesL;
    $i = 0;
    echo "<div class='linesL'>";
    for ($i = 1; $i <= $x; $i++) {
        echo "<img src='/src/img/line.png' class='linesmain ".$i."'>";
        sleep(0.1);
    }
    echo "</div>";
    
    $x = $pagesR;
    //echo $x;
    $i = 0;
    echo "<div class='linesR'>";
    for ($i = 1; $i <= $x; $i++) {
        echo "<img src='/src/img/line.png' class='linesmain ".$i."'>";
        sleep(0.1);
    }
    echo "</div>";


    echo "</div>";
    if($page == 1){
        #echo '<a href="/?page='.($page-1).'"><button>Back</button></a>';
        echo '<a href="/?page='.($page-1).'" class="arrow"><img src="/src/img/arrowl.png" class="backarr"><div class="buttonback"></div></a>';
        echo '<script>left = "/?page='.($page-1).'"</script>';

    }elseif($page >= 3){
        #echo '<a href="/?page='.($page-2).'"><button>Back</button></a>';
        echo '<a href="/?page='.($page-2).'"class="arrow"><img src="/src/img/arrowl.png" class="backarr"><div class="buttonback"></div></a>';
        echo '<script>left = "/?page='.($page-2).'"</script>';
    }else{
        echo '<script>left = "/?page='.$page.'"</script>';
    }

    if($page == 0){
        #echo '<a href="/?page='.($page+1).'"><button>Next</button></a>';
        echo '<a href="/?page='.($page+1).'"class="arrow"><img src="/src/img/arrow.png" class="nextarr"><div class="button"></div></a>';
        echo '<script>right = "/?page='.($page+1).'"</script>';
    }
    elseif($page == $totalpages){
        echo '<script>right = "/?page='.$page.'"</script>';
    }
    else{
        #echo '<a href="/?page='.($page+2).'"><button>Next</button></a>';
        echo '<a href="/?page='.($page+2).'"class="arrow"><img src="/src/img/arrow.png" class="nextarr"><div class="button"></div></a>';
        echo '<script>right = "/?page='.($page+2).'"</script>';
    }
    
        
    /*
    if($page >= 3){
        echo '<a href="/?page='.($page-2).'"><button>Back</button></a>';
    }
    if($page == 1){
        echo '<a href="/?page='.($page-1).'"><button>Back</button></a>';
    }

    if($page == 0){
        echo '<a href="/?page='.($page+1).'"><button>Next</button></a>';
    }
    else{
        if($page != 50){
            echo '<a href="/?page='.($page+2).'"><button>Next</button></a>';
        }
    }

    */


    
    ?>
    <script>
        setInterval(function(){document.getElementById("Main").style.width = document.getElementById("Main").scrollHeight / 1.41 * 2;},10);
    </script>
    <script>
        setInterval(function(){document.getElementById("Half").style.width = document.getElementById("Half").scrollHeight / 1.41; },100000);
    </script>
    <script>
        document.onkeydown = function(e) {
            switch (e.keyCode) {
                case 37:
                    document.location.href = left;
                    break;
                case 38:
                    break;
                case 39:
                    document.location.href = right;
                    break;
                case 40:

                    break;
            }
        };
    </script>
    <div class="bottomstuff">
        <?php if($dsableedit == 0){
            echo '<a href="/upload"><img class="change" src="/src/img/edit.png" onmouseover="'."show('changetool')".'" onmouseout="'."hide('changetool')".'"></a><div id="changetool" class="changetool">Edit Your Self</div>';
        }
        ?>
        <!--<a href="/upload"><img class="change" src="/src/img/edit.png" onmouseover="show('changetool')" onmouseout="hide('changetool')"></a><div id="changetool" class="changetool">Edit Your Self</div>-->
        <a href="/?page=1"><img class="contence" src="/src/img/return.png" onmouseover="show('contencetool')" onmouseout="hide('contencetool')"></a><div id="contencetool" class="contencetool">Contents Page</div>
        <a href="/?page=0"><img class="home" src="/src/img/home.png" onmouseover="show('hometool')" onmouseout="hide('hometool')"></a><div id="hometool" class="hometool">Front Cover</div>
    
    </div>
    <script>
    if (/Android|webOS|iPhone|iPod|iPad|BlackBerry|BB|PlayBook|IEMobile|Windows Phone|Kindle|Silk|Opera Mini/i.test(navigator.userAgent)) {
        location.replace('/mobile.php?page=<?php echo $page;?>');
        console.log("Mobile phone")
    }
    function show(id){
        document.getElementById(id).style = "visibility: visible;";
    }
    function hide(id){
        document.getElementById(id).style = "visibility: hidden;";
    }
        //if(document.body.scrollHeight < 2000){location.replace('/mobile.php?page=<?php echo $page;?>');}
        //if(document.body.scrollWidth <= 2000){location.replace('/mobile.php?page=<?php echo $page;?>');}
        //1048 
    </script>
    <div class="help">Any issues email: <a href="mailto:support@brityearbook2020.tk">support@brityearbook2020.tk</a></div>
</body>
