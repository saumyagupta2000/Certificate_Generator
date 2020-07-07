<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title>Certificate Generator</title>
  </head>
  <body>
  <div class="modal-footer">
   <button type="button" onclick="document.location.href='../Admin/login.php'" class="btn btn-outline-dark">Logout</button> 
 </div>
    <center>
      <br><br><br>
      <h3>CERTIFICATE GENERATOR</h3>
      <br><br><br><br>
      <form method="post" action="">
      <div class="form-group col-sm-6">
        <input type="text" name="name" class="form-control" id="name" placeholder="Enter Name">
      </div>
      <div class="form-group col-sm-6">
        <input type="text" name="occupation" class="form-control" id="organization" placeholder="Enter Organization Name">
      </div>
	  <div class="form-group col-sm-6">
        <input type="text" name="date" class="form-control" id="duration" placeholder="Enter Duration">
      </div>
	  <div class="form-group col-sm-6">
        <input type="text" name="email" class="form-control" id="email" placeholder="Enter Email">
      </div>
      <button type="submit" name="generate" class="btn btn-primary">Generate</button>
      <br>
	  <br>
	  <div class="container" align="center">                                         
		<input type="button" class="btn btn-success" onclick="document.location.href='../PHPCRUD/index.php'" class="Redirect" value="Generate certificates in Bulk!!"/>
	  </div>
	</form>
    <br>
    <?php 
      if (isset($_POST['generate'])) {
        $name = strtoupper($_POST['name']);
        $name_len = strlen($_POST['name']);
		$date = strtoupper($_POST['date']);
        $occupation = strtoupper($_POST['occupation']);
        if ($occupation) {
          $font_size_occupation = 25;
        }
		
		
		if ($date) {
          $font_size_date = 20;
        }

        if ($name == "" || $occupation == "" || $date == "") {
          echo 
          "
          <div class='alert alert-danger col-sm-6' role='alert'>
              Ensure you fill all the fields!
          </div>
          ";
        }else{
          echo 
          "
          <div class='alert alert-success col-sm-6' role='alert'>
              Congratulations! $name on your excellent success.
          </div>
          ";

          //designed certificate picture
          $image = "temp2.png";

          $createimage = imagecreatefrompng($image);

          //this is going to be created once the generate button is clicked
          $output = "all certis/$name.png";

          //then we make use of the imagecolorallocate inbuilt php function which i used to set color to the text we are displaying on the image in RGB format
          $white = imagecolorallocate($createimage, 205, 245, 255);
          $black = imagecolorallocate($createimage, 0, 0, 0);

          //Then we make use of the angle since we will also make use of it when calling the imagettftext function below
          $rotation = 0;

          //we then set the x and y axis to fix the position of our text name
          $origin_x = 250;
          $origin_y=280;

          //we then set the x and y axis to fix the position of our text occupation
          $origin1_x = 360;
          $origin1_y=340;
		  
		  $origin2_x = 380;
          $origin2_y=400;

          //we then set the differnet size range based on the lenght of the text which we have declared when we called values from the form
          if($name_len<=7){
            $font_size = 25;
            $origin_x = 190;
          }
          elseif($name_len<=12){
            $font_size = 30;
          }
          elseif($name_len<=15){
            $font_size = 26;
          }
          elseif($name_len<=20){
             $font_size = 18;
          }
          elseif($name_len<=22){
            $font_size = 15;
          }
          elseif($name_len<=33){
            $font_size=11;
          }
          else {
            $font_size =10;
          }

          $certificate_text = $name;

          //font directory for name
          $drFont = dirname(__FILE__)."/Lato-Bold.ttf";

          // font directory for occupation name
          //$drFont1 = dirname(__FILE__)."/Gotham-black.otf";

          //function to display name on certificate picture
          $text1 = imagettftext($createimage, $font_size, $rotation, $origin_x, $origin_y, $black,$drFont, $certificate_text);

          //function to display occupation name on certificate picture
          $text2 = imagettftext($createimage, $font_size_occupation, $rotation, $origin1_x+2, $origin1_y, $black, $drFont, $occupation);

          $text1 = imagettftext($createimage, $font_size_date, $rotation, $origin2_x+4, $origin2_y, $black,$drFont, $date);
		  
		  $conn = mysqli_connect("localhost", "root", "", "adminpanel");
		  
		  function checkKeys($conn, $randstr)		  
		  {
			  global $output ; 
			  $sql = "insert into codetab (v_key, url) values ('$randstr', '$output')";
			  $result = mysqli_query($conn, $sql);
			  
			  while ($row = mysqli_fetch_assoc($result)) 
			  {
				if($row['v_key'] == $randstr) {
					$keyExists = true;
					break;
				}
				else {
					$keyExists = false;
				}
					
			  }
			  
			  return $keyExists;
		  }
		  
		  function generateKey($conn)
		  {
			  $keyLength = 5;
			  $str = "1234567890abcdefghijklmnopqrstuvwxyzABCEFGHIJKLMNOPQRSTUVWXYZ!@#$";
			  //$randstr = substr(str_shuffle($str), 0, $keyLength);
			  $charactersLength = strlen($str);
			  global $randstr ;
			  for ($i = 0; $i < $keyLength; $i++) 
			  {
				$randstr .= $str[rand(0, $charactersLength - 1)];
			  }
			  $checkKey = checkKeys($conn, $randstr);
			  while ($checkKey == true) {
				  //echo"<a href='TTProject.php?key={$randstr}'>Link</a>";
				  $randstr = substr(str_shuffle($str), 0, $keyLength);
				  $checkKey = checkKeys($conn, $randstr);
			  }
		
			  return $randstr;
			}
		  echo generateKey($conn);
		  
		  $footer="Verify at exp_cert/verify.php?id=$randstr ";
		  imagettftext($createimage, 10, 0, 220, 575, $black, $drFont, $footer);
		  
		  imagepng($createimage,$output,3);

 ?>
        <!-- this displays the image below -->
        <img src="<?php echo $output; ?>">
        <br> 
        <br>

        <!-- this provides a download button -->
        <a href="<?php echo $output; ?>" class="btn btn-success">Download My Internship Certificate</a>
        <br><br>
<?php 
	$file=time();
	$file_path="temp2".$file.".png";
	$file_path_pdf="temp2".$file.".pdf";
	imagepng($createimage,$file_path);
	imagedestroy($createimage);

	require ('fpdf.php');
	$pdf=new FPDF();
	$pdf->AddPage();
	$pdf->Image($file_path,0,0,210,150);
	$pdf->Output($file_path_pdf,"F");

	include('smtp/PHPMailerAutoload.php');
	$mail=new PHPMailer();
	$mail->isSMTP();
	$mail->Host='smtp.gmail.com';
	$mail->Port=587;
	$mail->SMTPSecure="tls";
	$mail->SMTPAuth=true;
	$mail->Username="saiyam3006@gmail.com";
	$mail->Password="jain30@06";
	$mail->setFrom("saiyam3006@gmail.com");
	$mail->addAddress($_POST['email']);
	$mail->isHTML(true);
	$mail->Subjet="Certificate Generated";
	$mail->Body="Certificate Generated";
	$mail->addAttachment($file_path_pdf);
	$mail->SMTPOptions=array("ssl"=>array(
		"verify_peer"=>false,
		"verify_peer_name"=>false,
		"allow_self_signed"=>false,
	));
	if($mail->send()){
		echo "Sent";
	}else{
		echo $mail->ErrorInfo;
	}
        }
      }

     ?>

    </center>

     

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
  </body>
</html>