<?php 
$dsableedit = 1;
$lockdown = 1;
if($_GET["page"] != ""){
    $page=$_GET["page"];
}
else{
    $page = 0;
}

?>

<style>
    body{
        margin: 0;
        background-image: url("/src/img/background.png");
        background-repeat: no-repeat;
        background-attachment: fixed; 
        background-size: 100% 100%;
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
        z-index: 4;
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
        z-index: 1;
        background-image: url("/src/img/Backgroundbook.png");
        background-color: #cccccc;
        background-position: center;
        background-repeat: no-repeat;
        background-size: cover;
        position: relative;
}
    }
    .left{
        height: 100%;
        width: 50%;
        position: absolute;
        left: 0;
        top: 0;
        overflow: hidden;
        z-index: 99;
    }
    .right{
        height: 100%;
        width: 49%;
        position: absolute;
        right: 0;
        top: 0;
        overflow: hidden;
        z-index: 99;
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
        background: linear-gradient(90deg, rgba(0,0,0,1) 0%, rgba(255,255,255,1) 4%, rgba(255,255,255,1) 100%);
    }
    .rightspine{
        background: rgb(255,255,255);
        background: linear-gradient(90deg, rgba(255,255,255,1) 0%, rgba(255,255,255,1) 96%, rgba(0,0,0,1) 100%);
    }
        
        
    .button{
        width: 10%;
        height: 100%;
        background-color: black;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translate(-0%, -50%);
        opacity: 0.1;
        z-index: 100;
    }
    .buttonback{
        width: 10%;
        height: 100%;
        background-color: black;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translate(-0%, -50%);
        opacity: 0.1;
        z-index: 100;
    }
    .backarr{
        width:10%;
        position: absolute;
        left: 0;
        top: 50%;
        transform: translate(-0%, -50%);
        opacity: 1;
        z-index: 100;
    }
    .nextarr{
        width:10%;
        position: absolute;
        right: 0;
        top: 50%;
        transform: translate(-0%, -50%);
        opacity: 1;
        z-index: 100;
    }
    .background{
        z-index: 1;
        position: absolute;
        width: 100%;
        height: 0%;
    }
    .bottomstuff{
        width: 100%;
        position: absolute;
        height: 7VW;
        left: 50%;
        bottom: 0%;
        z-index: 999;
        transform: translate(-50%, -0%);
        opacity: 1.5;
        background: rgb(0,0,0, 0.1);
        
    }
    .hometool{
        visibility: hidden;
        position: absolute;
        right: 10%;
        top: -20%;
        background-color: black;
        opacity: 1;
        color: white;
    }
    .home{
        position: absolute;
        right: 10%;
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
        right: 10%;
        top: -20%;
        background-color: black;
        opacity: 1;
        color: white;
    }
    .home{
        position: absolute;
        right: 10%;
        bottom: 0%;
        transform: translate(-50%, -0%);
        opacity: 1;
        height: 100%;
    }
    .contencetool{
        visibility: hidden;
        position: absolute;
        left: 10%;
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
        left: 10%;
        bottom: 5%;
        transform: translate(-50%, -0%);
        opacity: 1;
        height: 85%;
    }
    
    .bottomstuff{
        width: 100%;
        position: absolute;
        height: 7VW;
        left: 50%;
        bottom: 0%;
        z-index: 999;
        transform: translate(-50%, -0%);
        opacity: 1.5;
        background: rgb(0,0,0, 0.1);
        
    }

    .contence{
        position: absolute;
        left: 10%;
        bottom: 5%;
        transform: translate(-50%, -0%);
        opacity: 1;
        height: 85%;
    }

</style>
    <body>
    <?php

    #echo $page;
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

    
    $fpage = 15;
    $lastpage = $fpage + 49;

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
            echo "<meta http-equiv='refresh' content='0; URL=https://brityearbook2020.tk/mobile.php?page=13' />";
        }
        else{
            $show = 2;
        }
    }else{
        if($lockdown == 1){
            if($page == 13){
                $show = 3;
            }
            elseif($page == 14){
                $show = 3;
            }
            else{
                echo "<meta http-equiv='refresh' content='0; URL=https://brityearbook2020.tk/mobile.php?page=13' />";
            }
        }
        else{
            $show = 3;
        }
        
    }




    
    if($show == 1){
        echo '<div id="Half" class="half"> <img src="/src/img/Backgroundbook.png" class="background"><iframe scrolling="no"  frameBorder="0" width="100%" height="100%"src="/src/html/left.php?page='.$pageA.'&section='.$section.'"></iframe></div>';
    }
    if($show == 2){
        echo '<div id="Half" class="half"><iframe src="/src/html/mobile/'.$page.'.html" width="100%" height="100%" scrolling="no"  frameBorder="0" height="100%"></iframe></div>';
    }
    if($show == 3){
        echo '<div id="Half" class="half"><div class="full"><iframe src="/src/html/mobile/'.$page.'.html" width="100%" scrolling="no"  frameBorder="0" height="100%"></iframe></div></div>';
    }
















    if($page >= 1){
        //echo '<a href="/mobile.php?page='.($page-1).'"><button>Back</button></a>';
        echo '<a href="/mobile.php?page='.($page-1).'"><img src="/src/img/arrowl.png" class="backarr"><div class="buttonback"></div></a>';
    }
    if($page != 100){
        //echo '<a href="/mobile.php?page='.($page+1).'"><button>Next</button></a>';
        echo '<a href="/mobile.php?page='.($page+1).'"><img src="/src/img/arrow.png" class="nextarr"><div class="button"></div></a>';
    }





    ?>
    <script>
        setInterval(function(){
            //document.getElementById("Half").style.width 
            test = document.getElementById("Half").scrollHeight / 1.41
            if(test >= document.body.scrollWidth){
                //alert("error");
                help = test - document.body.scrollWidth;
                test = test - help
                //console.log(help);
                help = help * 1.41;
                //console.log(help);
                document.getElementById("Half").style.height = document.getElementById("Half").scrollHeight - help
            }
            document.getElementById("Half").style.width = test
            
        },10);
        function show(id){
        document.getElementById(id).style = "visibility: visible;";
    }
    function hide(id){
        document.getElementById(id).style = "visibility: hidden;";
    }
    </script>
    <div class="bottomstuff">
        <?php if($dsableedit == 0){
            echo '<a href="/upload"><img class="change" src="/src/img/edit.png" onmouseover="'."show('changetool')".'" onmouseout="'."hide('changetool')".'"></a><div id="changetool" class="changetool">Edit Your Self</div>';
        }
        ?>
        <a href="/?page=1"><img class="contence" src="/src/img/return.png" onmouseover="show('contencetool')" onmouseout="hide('contencetool')"></a><div id="contencetool" class="contencetool">Contents Page</div>
        <a href="/?page=0"><img class="home" src="/src/img/home.png" onmouseover="show('hometool')" onmouseout="hide('hometool')"></a><div id="hometool" class="hometool">Front Cover</div>
    
    </div>

</body>
