<?php

$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'adminpanel');

if(isset($_POST['insertdata']))
{
    $fname = $_POST['fname'];
    $occupation = $_POST['occupation'];
    $duration = $_POST['duration'];


    $query = "INSERT INTO student (`fname`,`occupation`,`duration`) VALUES ('$fname','$occupation','$duration')";
    $query_run = mysqli_query($connection, $query);

    if($query_run)
    {
        echo '<script> alert("Data Saved"); </script>';
        header('Location: index.php');
    }
    else
    {
        echo '<script> alert("Data Not Saved"); </script>';
    }
}

?>