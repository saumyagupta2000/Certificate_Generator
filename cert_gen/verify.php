<?php
 if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on')   
         $url = "https://";   
    else  
         $url = "http://";   
    // Append the host(domain name, ip) to the URL.   
    $url.= $_SERVER['HTTP_HOST'];   
    
    // Append the requested resource location to the URL   
    $url.= $_SERVER['REQUEST_URI'];    
      
    
	parse_str(parse_url($url)['query'], $params);
	
	$id = $params['id'];
	$conn=mysqli_connect( "localhost", "root", "", "adminpanel" ) or die("Connection Not Established: " .mysqli_error($conn) );
	$getImage=mysqli_query($conn, "SELECT url FROM codetab WHERE v_key = '$id' ") or die("No Record Found: " .mysqli_error($conn));
	$path=mysqli_fetch_assoc($getImage) or die("No Certificate Found: " .mysqli_error($conn));
?>

<!DOCTYPE html>
<html>
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<style>
.container {
  position: relative;
  text-align: center;
  color: black;
}
</style>
</head>
<body>
	<div align="center">
		<img src="https://accomox.s3.ap-south-1.amazonaws.com/qgy3nf_1588144877341_a75c4097699c6ed25b958173eb2f44d98fd8e30c_ttslogo.png" height="70" width="70">
	</div>
	<h1 align="center">
		TECHTABLE
	</h1>
	<p class="smaller" align="center">
        An EdTech Startup
	</p>
	<div align= "center">
	<img src="<?php echo $path['url'];?>" />
	</div>
</body>
</html>
