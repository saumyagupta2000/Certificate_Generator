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
$con=mysqli_connect('localhost','root','','student');//connecting to database
$query="select * from stuinfo";//To retrieve students into from database
$fire=mysqli_query($con,$query);
while($row=mysqli_fetch_array($fire))
{
header('content-type:image/png');
$font= realpath('developer.ttf');
$image=imagecreatefrompng("temp2.png");
$color=imagecolorallocate($image, 51, 51, 102);
$date=date('d F, Y');//Current Date 
imagettftext($image, 18, 0, 880, 188, $color,$font, $date);
$name=$row['name'];
imagettftext($image, 45, 0, 210, 290, $color,$font, $name);
$occupation=$row['occupation'];
imagettftext($image, 40, 0, 360, 340, $color,$font, $occupation);
$duration=$row['duration'];
imagettftext($image, 30, 0, 350, 400, $color,$font, $duration);
imagejpeg($image,"certificate2/$name.png");//Storing certificate here
imagedestroy($image);
}

?>
