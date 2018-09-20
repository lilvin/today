<?php

//connecting to database
$servername="localhost";
$username="root";
$password="";
$dbname="bloodbank";

$con=new mysqli($servername,$username,$password,$dbname) or die("failed to connect to server");
if (mysqli_connect_error()){
die("connection failed:".mysqli_connect_error());
}

if (isset($_POST['all'])) {
  
 $query ="SELECT * FROM appointments WHERE appointmentType='DONOR'";

}
if (isset($_POST['download'])) {
  header("Content-Type: application/xls");    
  header("Content-Disposition: attachment; filename=Donors Appointments.xls"); 
  header("Pragma: no-cache"); 
  header("Expires: 0");
}

?>
<!DOCTYPE html>
<html>
<head>
    <title>All Donors</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
</head>
<body>
 <div class="container">
  <div class="row">
    <h2 style="color: #CC3366; ">ALL DONOR APPOINTMENTS</h2>
    <form class="form-inline my-2 my-lg-0" style="margin-left: 500px;" action="allDonors.php" method="post">
      <button class="btn btn-success my-2 my-sm-0" type="submit" name="download">Download Excel</button>
    </form>
 <table id="donorsTable" class="table table-striped table-condensed table-hover table-bordered">
  <thead>
    <tr>
      <th scope="col">NO<i class="fa fa-sort float-right" aria-hidden="true"></i></th>
      <th scope="col">ID Number</th>
      <th scope="col">Mobile No</th>
      <th scope="col">Location</th>
      <th scope="col">Hospital</th>
      <th scope="col">Blood Type</th>
      <th scope="col">Date</th>
      <th scope="col">Time</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $query_run= mysqli_query($con,"SELECT * FROM appointments WHERE appointmentType='DONOR'");
     $counter = 1;
     while($row= mysqli_fetch_assoc($query_run)) : ?>
    <tr class="table-active">
      <td><?php echo $counter++;?></td>
      <td><?php echo $row['idNumber'] ;?></td>
      <td><?php echo $row['mobileNumber'];?></td>
      <td><?php echo $row['location'];?></td>
      <td><?php echo $row['hospitaID'];?></td>
      <td><?php echo $row['bloodType'];?></td>
      <td><?php echo $row['date'];?></td>
      <td><?php echo $row['time'];?></td>
    </tr>
<?php endwhile ;?>
  </tbody>
</table>
</div>
</div> 
<script type="text/javascript">
  $(document).ready(function () {
  $('#donorsTable').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
</body>
</html>
