<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Certificate Generator</title>
    <!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>-->
  
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.18/css/dataTables.bootstrap4.min.css">
    
</head>
<style>
.box
  {
   max-width:600px;
   width:100%;
   margin: 0 auto;;
  }
</style>
<body>
    

<!-- Modal -->
<div class="modal fade" id="studentaddmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="insertcode.php" method="POST">

            <div class="modal-body">
                <div class="form-group">
                    <label> Name </label>
                    <input type="text" name="fname" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label>Occupation</label>
                    <input type="text" name="occupation" class="form-control" placeholder="Enter Occupation">
                </div>
                <div class="form-group">
                    <label> Duration </label>
                    <input type="text" name="duration" class="form-control" placeholder="Enter Duration">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="insertdata" class="btn btn-primary">Save Data</button>
            </div>
        </form>

    </div>
  </div>
</div>
<div class="modal-footer">
    <button type="button" class="btn btn-dark" onclick="document.location.href='../cert_gen/db_Template1.php'" class="Redirect" >Generate!!</button>
    <button type="button" onclick="document.location.href='../Admin/login.php'" class="btn btn-outline-dark">Logout</button> 
</div>

<div class="container">
   
   <form id="upload_csv" method="post" enctype="multipart/form-data">
    <div class="col-md-3">
     <br />
     <label>Select CSV File</label>
    </div>  
                <div class="col-md-4">  
                    <input type="file" name="csv_file" id="csv_file" accept=".csv" style="margin-top:15px;" />
                </div>  
                <div class="col-md-5">  
                    <input type="submit" name="upload" id="upload" value="Upload" style="margin-top:10px;" class="btn btn-info" />
                </div>  
                <div style="clear:both"></div>
   </form>
   <br />
   <br />
   <div id="csv_file_data"></div>
   
  </div>
<br><br><br>

<!-- EDIT POP UP FORM (Bootstrap MODAL) -->

<div class="modal fade" id="editmodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add Student Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="updatecode.php" method="POST">
            <input type="hidden" name="update_id" id="update_id">

            <div class="modal-body">
                <div class="form-group">
                    <label> Name </label>
                    <input type="text" name="fname" id="fname" class="form-control" placeholder="Enter Name">
                </div>
                <div class="form-group">
                    <label>Occupation</label>
                    <input type="text" name="occupation" id="occupation" class="form-control" placeholder="Enter Occupation">
                </div>
                <div class="form-group">
                    <label> Duration </label>
                    <input type="text" name="duration" id="duration" class="form-control" placeholder="Enter Duration">
                </div>
                
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" name="updatedata" class="btn btn-primary">Save Data</button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- #################################################################################################### -->







<!-- DELETE POP UP FORM (Bootstrap MODAL) -->

<div class="modal fade" id="deletemodal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"> Delete Student Data </h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

        <form action="deletecode.php" method="POST">

            <div class="modal-body">

                <input type="hidden" name="delete_id" id="delete_id">

                <h4> Do you want to Delete this Data ??</h4>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">  NO </button>
                <button type="submit" name="deletedata" class="btn btn-primary"> Yes !! Delete it. </button>
            </div>
        </form>

    </div>
  </div>
</div>

<!-- #################################################################################################### -->



<div class="container">
    <div class="jumbotron">
        <div class="card">
            <h2>Enter Details To Get Certificates</h2>
        </div>    
        <div class="card">
            <div class="card-body">
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#studentaddmodal">ADD DATA</button>
            </div>
        </div>

        <div class="card">
            <div class="card-body">
  
            
            <?php
                $connection = mysqli_connect("localhost","root","");
                $db = mysqli_select_db($connection, 'adminpanel');

                $query = "SELECT * FROM student";
                $query_run = mysqli_query($connection, $query);
            ?>
                <table id="datatableid" class="table table-bordered table-dark">
                    <thead>
                        <tr>
                            <th scope="col"> ID </th>
                            <th scope="col"> Name </th>
                            <th scope="col"> Occupation </th>
                            <th scope="col"> Duration </th>
                            <th scope="col"> Edit </th>
                            <th scope="col"> Delete </th>
                        </tr>
                    </thead>
            <?php
                if($query_run)
                {
                    foreach($query_run as $row)
                    {
            ?>
                    <tbody>
                        <tr>
                            <td> <?php echo $row['id']; ?> </td> 
                            <td> <?php echo $row['fname']; ?> </td> 
                            <td> <?php echo $row['occupation']; ?> </td> 
                            <td> <?php echo $row['duration']; ?> </td> 

                            <td> 
                                <button type="button" class="btn btn-success editbtn">EDIT</button>
                            </td> 
                            <td> 
                                <button type="button" class="btn btn-danger deletebtn">DELETE</button>
                            </td>                                                   
                        </tr>
                    </tbody>
            <?php                          
                    }
                }
                else
                {
                    echo "No Record Found";
                }
            ?>
                </table>
                
            
            </div>
        </div>
    </div>
</div>



<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js" integrity="sha384-wHAiFfRlMFy6i5SRaxvfOCifBUQy1xHdJ/yoi7FRNXMRBu5WHdZYu1hA6ZOblgut" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js" integrity="sha384-B0UglyR+jN6CkvvICOB2joaf5I4l3gm9GU6Hc1og6Ls7i6U/mkkaduKaBhlAXv9k" crossorigin="anonymous"></script>

<script>

$(document).ready(function () {

    $('.deletebtn').on('click', function() {
        
        $('#deletemodal').modal('show');

            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#delete_id').val(data[0]);
      
    });
});

</script>



<script>

$(document).ready(function () {
    $('.editbtn').on('click', function() {
        
        $('#editmodal').modal('show');

        
            $tr = $(this).closest('tr');

            var data = $tr.children("td").map(function() {
                return $(this).text();
            }).get();

            console.log(data);

            $('#date').val(data[0]);
            $('#fname').val(data[1]);
            $('#occupation').val(data[2]);
            $('#duration').val(data[3]);

    });
});

</script>

<script>
    $(document).ready(function(){
 $('#upload_csv').on('submit', function(event){
  event.preventDefault();
  $.ajax({
   url:"fetch.php",
   method:"POST",
   data:new FormData(this),
   dataType:'json',
   contentType:false,
   cache:false,
   processData:false,
   success:function(data)
   {
    var html = '<table class="table table-striped table-bordered">';
    if(data.column)
    {
     html += '<tr>';
     for(var count = 0; count < data.column.length; count++)
     {
      html += '<th>'+data.column[count]+'</th>';
     }
     html += '</tr>';
    }

    if(data.row_data)
    {
     for(var count = 0; count < data.row_data.length; count++)
     {
      html += '<tr>';
      html += '<td class="fname" contenteditable>'+data.row_data[count].fname+'</td>';
      html += '<td class="occupation" contenteditable>'+data.row_data[count].occupation+'</td>'
      html += '<td class="duration" contenteditable>'+data.row_data[count].duration+'</td></tr>';
     }
    }
    html += '<table>';
    html += '<div align="center"><button type="button" id="import_data" class="btn btn-success">Import</button></div>';

    $('#csv_file_data').html(html);
    $('#upload_csv')[0].reset();
   }
  })
 });

 $(document).on('click', '#import_data', function(){
  var fname = [];
  var occupation = [];
  var duration = [];
  $('.fname').each(function(){
   fname.push($(this).text());
  });
  $('.occupation').each(function(){
   occupation.push($(this).text());
  });
  $('.duration').each(function(){
   duration.push($(this).text());
  });
  $.ajax({
   url:"import.php",
   method:"post",
   data:{fname:fname, occupation:occupation, duration:duration},
   success:function(data)
   {
    $('#csv_file_data').html('<div class="alert alert-success">Data Imported Successfully</div>');
   }
  })
 });
});

</script>

</body>
</html>

