<?php 
	session_start();
    $con = mysqli_connect('localhost', 'root');
    if($con){
        echo "connection established";
    }
    else{
        echo "no connection";
    }
//How to Generate Bulk Certificate
$con=mysqli_connect('localhost','root','','phpcrud');//connecting to database
$query="select * from student";//To retrieve students into from database
$fire=mysqli_query($con,$query);
while($row=mysqli_fetch_array($fire))
{
header('content-type:image/png');
$font= realpath('developer.ttf');
$image=imagecreatefrompng("temp.png");
$color=imagecolorallocate($image, 51, 51, 102);
$date=date('d F, Y');//Current Date 
imagettftext($image, 18, 0, 880, 188, $color,$font, $date);
$fname=$row['fname'];
imagettftext($image, 45, 0, 210, 280, $color,$font, $fname);
$occupation=$row['occupation'];
imagettftext($image, 40, 0, 360, 340, $color,$font, $occupation);
$duration=$row['duration'];
imagettftext($image, 30, 0, 350, 400, $color,$font, $duration);
imagejpeg($image,"certificate/$fname.png");//Storing certificate here
imagedestroy($image);
}

?>
