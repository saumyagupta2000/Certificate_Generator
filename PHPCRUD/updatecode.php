<?php
$connection = mysqli_connect("localhost","root","");
$db = mysqli_select_db($connection, 'adminpanel');

    if(isset($_POST['updatedata']))
    {   
        $id = $_POST['update_id'];

        $date = $_POST['date'];
        $fname = $_POST['fname'];
        $occupation = $_POST['occupation'];
        $duration = $_POST['duration'];

        $query = "UPDATE student SET date='$date',fname='$fname',occupation='$occupation',duration='$duration' WHERE id='$id'  ";
        $query_run = mysqli_query($connection, $query);

        if($query_run)
        {
            echo '<script> alert("Data Updated"); </script>';
            header("Location:index.php");
        }
        else
        {
            echo '<script> alert("Data Not Updated"); </script>';
        }
    }
?>