<link rel="icon" href="/src/img/icon.png">


<?php 
echo "Upload closed";
die();
$disableedit = 0;
echo "Editing Page";

if($disableedit == 1){
    echo '<H1>Editing Closed</h1>If you there is an issue pleas email me at: <a href="mailto:support@brityearbook2020.tk">support@brityearbook2020.tk</a> with: First name, Last name and problem and I will get back to you ASP.';
}
if($_GET["no"]){ $no = $_GET["no"];}//Multi person checker

$Fnamesh = $_GET["Fnamesh"]; //Get First name form GET
$Fnamesh  = str_replace(" ","", $Fnamesh);

$Lnamesh = $_GET["Lnamesh"]; //Get Last name form GET
$Lnamesh  = str_replace(" ","", $Lnamesh);

if($_GET['search'] == 'search'){//Check if search is requested 
    $found = 0; //setting fount to 0
    //setting arrays for search
    $Fname = array(); 
    $Lname = array(); 
    $id = array();
    $cCode = array();
    $imagelc = array();



    $servername = ""; //Server name for SQL
    $username = "webaccsess"; //Username For SQL
    $password = ""; //Password For SQL yep Fuck security
    $dbname = ""; //DB name for SQL
    
    $conn = new mysqli($servername, $username, $password, $dbname); //Begin SQL connection 

    // Check connection
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }
    
    $sql = "SELECT * from yearbook"; //Request the hole DB
    $result = $conn->query($sql); //Run command
    $i = 0;//set i to 0
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {

            $inone = 0;//stop multiple triggers

            if (stripos($row['Fname'], $Fnamesh) !== false and stripos($row['Lname'], $Lnamesh) !== false) { //Check First name and Last name case insensitive
                $found = $found + 1; //Fund counter
                //updating arrays with data
                $id[$i] = $row['id'];
                $Fname[$i] = $row['Fname'];
                $Lname[$i] = $row['Lname'];
                $cCode[$i] = $row['cCode'];
                $imagelc[$i] = $row['imglocation'];
                $i = $i + 1;//increment counter
                $inone = 1;//stop multiple triggers
            }
            elseif(strcasecmp($row['Fname'], $Fnamesh)== false and strcasecmp($row['Lname'], $Lnamesh) == false){//Check First name and Last name (string in string)
                if($inone == 1){ //stop multiple triggers

                }else{
                    #echo "yeet".$row['Fname'];
                    $found = $found + 1;//Fund counter
                    //updating arrays with data
                    $id[$i] = $row['id'];
                    $Fname[$i] = $row['Fname'];
                    $Lname[$i] = $row['Lname'];
                    $imagelc[$i] = $row['imglocation'];
                    $cCode[$i] = $row['cCode'];
                    $i = $i + 1;//increment counter
                }
            }
        }
    }

    if($found > 1){
        //multi ppl checker
        if(isset($Lnamesh) and !isset($no)){ //Checks that no is not set and Last name is set
            echo '<form action="" method="get">Pleas select from:<select id="no" name="no">'; // starts drop down and form
            for ($i = 0; $i < count($Lname); $i++) { //do this for every person in array
                echo '<option value="'.$i.'">'.$Fname[$i].' '.$Lname[$i].', '.$cCode[$i].'</option>'; //populate the dropdown
            }
            echo '</select><input type="submit">';// add submit button
            echo '<input type="hidden" name="Fnamesh" value="'.$_GET["Fnamesh"].'"><input type="hidden" name="Lnamesh" value="'.$_GET["Lnamesh"].'"><input type="hidden" name="search" value="search">';//add hidden veriables
            echo '</form>';//shut the form

            die();//die like me in side 
            //var_dump($no); 
        }
        elseif(isset($no)){//result of /\
            //set the stuff
            $id = $id[$no];
            $Fname = $Fname[$no];
            $Lname = $Lname[$no];
            $imagelc = $imagelc[$no];
            $cCode = $cCode[$no];
        
        }
        else{
            //error nobody gets to see
            echo "enter second name";
        }
    }
    elseif($found == 0 and isset($_GET["Fnamesh"])){
        //cant find in the DB 
        //don't ask questions it needed an error this is what I chose 
        echo "<div class='erro'>We could not find you in our database check the name and try again.<div></br>";//ha ha lol he so funny 
        echo $_GET["Fnamesh"];
        echo $_GET["Lnamesh"];
        echo "</br>";


        echo "<a href='/upload/'><button>Back</button></a>"; //add back button
        echo '<div class="help">Any issues email: <a href="mailto:support@brityearbook2020.tk">support@brityearbook2020.tk</a></div>';//add email cos ya know shit happen
        $killme = 1; //please
        
        if($killme == 1){
            die($killme);//kill the page (it kept breaking)
        }
        //die();
    }
    else{
        //set if there is only one person with the name 
        $no = 0;
        $id = $id[$no];
        $Fname = $Fname[$no];
        $Lname = $Lname[$no];
        $cCode = $cCode[$no];
        $imagelc = $imagelc[$no];
    }
    
    //$conn = new mysqli($servername, $username, $password, $dbname); //start SQL again wait 
    
     
    //$sql = "SELECT * from yearbook"; //Get all data from DB wait again
    $result = $conn->query($sql);//ok this is new ish i mean send request
    $i = 0; //set i to 0
    if ($result->num_rows > 0) {
    // output data of each row
        while($row = $result->fetch_assoc()) {
            
            if($id == $row['id']){//check id against the row
                if($cCode == $row['cCode']){ //check class code against the row wait i could have done this in sql fuck well done now
                    if($row['hasedit'] > 0){//check is has edit is bigger than 0
                        echo "Edited: ".$row['hasedit']." times."; //if it is print howmany times it has been edited
                        $hasedit = $row['hasedit'];// set has edit
                    }
                    $quote = $row['quote']; //get the qoute
                }
            }
        }
    }
}

//cool that wasnt to dificult next 
if($_GET['update'] == 'Update'){ //if you update the qoute 
    $cCode = $_GET["cCode"]; //get class code
    $id = $_GET["id"]; //get id
    $quote = $_GET["quote"]; // get updated qoute
    $hasedit = $_GET["hasedit"]; //get has edit
    //fix the stuff that breaks the DB
    $str = str_replace('\u','u',$quote); 
    $quote = preg_replace('/u([\da-fA-F]{4})/', '&#x\1;', $str);
    $quote  = str_replace(chr(194),"", $quote);
    $quote  = str_replace("'","`", $quote);


    $servername = "";//ya know this allready
    $username = "webaccsess";//ya know this allready
    $password = "";//ya know this allready
    $dbname = "";//ya know this allready
    
    $conn = new mysqli($servername, $username, $password, $dbname);//ya know this allready
    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
      }
    
    $sql = "UPDATE yearbook SET hasedit = ".$hasedit.", quote = '".$quote."'  WHERE id = ".$id." AND cCode='".$cCode."';";//set the sql
    var_dump($sql);
    $result = $conn->query($sql);//request
    //$i = 0;//set i to 0 common not that difficult //or this
    if ($result->num_rows > 0) {var_dump($result);}

    

    $date = date ("Y-m-d H:i:s");//set the current date
    echo $date;//echo it
    $sql = "INSERT INTO  roleback (quote, id, cCode, date) VALUES ('$quote', ' $id', '$cCode', '$date');";//set the SQL
    
    $result = $conn->query($sql); //sed the sql 
    //$i = 0;//rly i dont evne need this
    if ($result->num_rows > 0) {var_dump($result);}

    echo "<script> alert('Your quote has been updated!'); location.replace('/'); </script>";//alert not even a check to make sure it worked just hope

}
//boring HTML
?>
<form method="get" action="/upload/">
    First Name: <input type="text" name="Fnamesh" value="<?php echo $Fname;?>"<?php if($cCode){echo "";}?> required>
    Last Name:<input type="text" name="Lnamesh" value="<?php echo $Lname;?>"<?php if($cCode){echo "";}?> required>
    </br>
    <?php
    if($Fname != ""){ //if Fname is set
        echo 'Strand code: <input type="text" name="cCode" value="'.$cCode.'"><input type="hidden" name="id" value="'.$id.'"><input type="hidden" name="hasedit" value="'.($hasedit+1).'"></br><textarea style="text-align: center;" name="quote" rows="4" cols="70">'.$quote.'</textarea></br><input value="Update" name="update" class="button" type="submit"></form><a href="photo.php?hasedit='.($hasedit+1).'&Fname='.$Fname.'&Lname='.$Lname.'&cCode='.$cCode.'&id='.$id.'&name='.$imagelc.'"><button class="upload">Photo Upload</button></a>Warning this will not save changes';//fuck me that did allot
        /* What did that just do
            it did:
                show a box called strand code with out the ability to edit
                set hidden veriables for:
                    id
                    has edit 
                shows the box to edit the qoute
                adds update button
                added a button with all the data to take you to the photo upload page
        */
    }
    else{
        echo '<input class="button" value="search" name="search" type="submit">';//ha this one if fucking pathetic
        //add's surch button
    }
    //boring HTMl till the end BUY
    ?>
</form>
</br><a href="/"><button class="exit">Exit</button></a>Warning this will not save changes
<style>
    button{

        color: #fff;
        background-color: #1db340;
        border: 0;
        padding: 10px;
        cursor: pointer;
        height: 55.4px;
        font-size: 20px;
    }
    .button{
        color: #fff;
        background-color: #1db340;
        border: 0;
        padding: 10px;
        cursor: pointer;
        height: 55.4px;
        font-size: 20px;
    }
    .exit{
        background-color: red;
    }
    .help{
        position: absolute;
        left: 0;
        bottom: 0;
        z-index: 1000;
    }
    .upload{
        background-color: #007bff;
    }
    </style>
    <div class="help">Any issues email: <a href="mailto:support@brityearbook2020.tk">support@brityearbook2020.tk</a></div>
