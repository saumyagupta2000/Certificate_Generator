<?php 
	session_start();
?>
<!DOCTYPE html>
<html>
<head>
  <title>Cerificate Generator</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>

  <style type="text/css">
		.box {
			
		box-shadow: 0 4px 8px 0 rgba(0, 0, 0, 0.651), 0 6px 20px 0 rgba(0, 0, 0, 0.19);
		background-color: rgb(186, 195, 235);
			
		}

		p,h3,h2,h4,h5,h1{
		  font-family: 'Bitter', serif;
		  
		}
		p{
		  font-size: 18px;
		  color: #7a7e84;
		}

		i{ font-style: bold !important;
		  color:rgb(80, 44, 44);
		  font-size: 25px !important;
		}
		h5{
		color:#2C3E50;
		}


		a{
		  color: inherit;
		  text-decoration: none;
		}

		.btn{
		  border-radius: 8px;
		}

		a{
		  color: inherit;
		  text-decoration: none;
		}
		a:hover{
		  color: white;
		  text-decoration: none;
		}

		.blue{
		background-color: #0097e6;
		color: white;
		border-radius: 20px;
		}

		input{
		  border: 1px solid #2C3E50;
		  padding: 10px;
		  width:50%;
		  border-radius: 20px;
		  text-decoration: none;
		  color: inherit;
		   outline: none;
		}
		button{
		  border: 1px solid black;
		  padding: 10px;
		  width:50%;
		  border-radius: 20px;
		  background-color: #a96cf0;
		  color: white;
		  outline: none;
		}
		body{
			background: linear-gradient(to bottom, #33ccff 0%, #ff99cc 100%);
		}
		@media only screen and (max-width: 768px) {
			/* For mobile phones: */
			input,button {
				width: 100%;
			}
			
		}
   </style>
</head>
<body>

	<div class="modal-footer">
	<button type="button" onclick="document.location.href='../Admin/login.php'" class="btn btn-outline-dark btn-xs">Logout</button> 
	</div>


	<div style="padding:1%;text-align: center;"><br><br>
		<u><h2 style="color:rgba(0, 0, 0, 0.753);font-size: 50px">ONLINE CERTIFICATE MAKER</h2></ul>
		<h3>Please Select Template</h3>
	</div>
	<br>
	<br>
	<br>
	<br>
	

	<div class="container" align="center">                                         
		<input style="width:20%" type="button" onclick="document.location.href='Template1.php'" class="Redirect" value="Choose this template"/>
		<img src="temp.png" style="width:25%;">
	</div>
	<br>
	<div class="container" align="center">
		<input style="width:20%" type="button" onclick="document.location.href='Template2.php'" class="Redirect" value="Choose this template"/>
		<img src="temp2.png" style="width:25%;">
	</div>
	<br>
	<div class="container" align="center">
		<input style="width:20%" type="button" onclick="document.location.href='Template3.php'" class="Redirect" value="Choose this template"/>
		<img src="temp3.png" style="width:25%;"><br><br><br>
	</div>
</body>
</html>