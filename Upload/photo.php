<!DOCTYPE html>
<html>
<script src="/src/js/jquery-3.5.1.min.js"></script>


<style>
    button{

        color: #fff;
        background-color: #1db340;
        border: 0;
        padding: 10px;
        cursor: pointer;
        height: 55.4px;
        font-size: 20px;
        border-radius: 25px;
    }
    .button{
        color: #fff;
        background-color: #1db340;
        border: 0;
        padding: 10px;
        cursor: pointer;
        height: 55.4px;
        font-size: 20px;
        border-radius: 25px;
    }
    .exit{
        background-color: red;
        length: 200px;
    }
    .fuckyou{
      <?php if($_GET["image"]){echo ("background-color: Yellow;");}?>
      width: 305px;
    }
    .inputfile {
	width: 0.1px;
	height: 0.1px;
	opacity: 0;
	overflow: hidden;
	position: absolute;
	z-index: -1;
}
.inputfile + label {
    font-size: 1.25em;
    font-weight: 700;
    color: white;
    background-color: #007bff;
    display: inline-block;
    
    padding: 16px;
    border-radius: 25px;
}

.inputfile:focus + label,
.inputfile + label:hover {
    background-color: red;
}
.inputfile + label {
	cursor: pointer; /* "hand" cursor */
}
.inputfile:focus + label {
	outline: 1px dotted #000;
	outline: -webkit-focus-ring-color auto 5px;
}
.help{
        position: absolute;
        left: 0;
        bottom: 0;
        z-index: 1000;
    }

  </style>
<body>

<form action="test.php" method="post" enctype="multipart/form-data">
    First name: <input type="text" name="Fname" value="<?php echo $_GET['Fname'];?>"></br>
    Last name: <input type="text" name="Lname" value="<?php echo $_GET['Lname'];?>"></br>
    Strand Code: <input type="text" name="cCode" value="<?php echo str_replace(' ', '', $_GET['cCode']);?>"></br>
    <input type="hidden" name="id" value="<?php echo $_GET['id'];?>">
    <input type="hidden" name="hasedit" value="<?php echo $_GET['hasedit'];?>">
    <input type="hidden" name="name" value="<?php echo $_GET['name'];?>">
    Select image to upload:
  
  <input type="file" name="inputfile" id="inputfile" class="inputfile" data-multiple-caption="{count} files selected"  />
  <label for="inputfile" id="output">Choose a image</label></br>
  <h2 class="fuckyou">Supported: JPEG, JPG, PNG</h2>
  If you have a heic Photo pleas convert it though: <a href="https://cloudconvert.com/heic-to-png">https://cloudconvert.com/heic-to-png</a></br>

  
  <input type="submit" class="button" value="Upload Image" name="submit">
</form>
<a href="/upload"><button class="change">Back</button></a>
<a href="/"><button class="exit">Exit</button></a>
<script>var inputs = document.querySelectorAll( '.inputfile' );
Array.prototype.forEach.call( inputs, function( input )
{
	var label	 = input.nextElementSibling,
		labelVal = label.innerHTML;

	input.addEventListener( 'change', function( e )
	{
		var fileName = '';
		fileName = e.target.value.substring(12);

		if( fileName ){
			//label.querySelector( 'span' ).innerHTML = fileName;
      document.getElementById("output").innerText = "File: " + fileName;
      console.log(fileName);
    }
		else{
			label.innerHTML = labelVal;
      console.log(fileName);}
	});
});</script>
<div class="help">Any issues email: <a href="mailto:support@brityearbook2020.tk">support@brityearbook2020.tk</a></div>
</body>

</html>