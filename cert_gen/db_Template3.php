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
$image=imagecreatefrompng("temp3.png");
$color=imagecolorallocate($image, 51, 51, 102);
$date=date('d F, Y');//Current Date 
imagettftext($image, 18, 0, 880, 188, $color,$font, $date);
$name=$row['name'];
imagettftext($image, 45, 0, 270, 290, $color,$font, $name);
imagejpeg($image,"certificate3/$name.png");//Storing certificate here
imagedestroy($image);
}

?>
