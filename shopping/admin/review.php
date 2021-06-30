<?php

include 'include/config.php';
$sql = mysqli_query($con, "SELECT * FROM productreviews");
$num = mysqli_fetch_array($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Change Password</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet">
	<link type="text/css" href="css/theme.css" rel="stylesheet">
	<link type="text/css" href="images/icons/css/font-awesome.css" rel="stylesheet">
	<link type="text/css" href='http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600' rel='stylesheet'>
	<script type="text/javascript"></script>
</head>
<body>
<?php include 'include/header.php';?>
	<div class="container">
	<div class="row">
	<div class="col-md-12 text-center">
	<h2>FAKE REVIEW DETECTOR </h2>
	</div>
	</div>
	<div class="row">

	<div class="col-md-12">
	<!-- START TABLE -->
	<table class="table table-striped table-bordered">
  <thead>
    <tr>
	<th scope="col">sr#</th>
      <th scope="col">id</th>
	  <th scope="col">unique id</th>
	  <th scope="col">server name</th>
	  <th scope="col">server addr</th>
	  <th scope="col">server software</th>
	  <th scope="col">user agent</th>
      <th scope="col">productId</th>
      <th scope="col">quality</th>
      <th scope="col">price</th>
	  <th scope="col">value</th>
	  <th scope="col">name</th>
	  <th scope="col">summary</th>
	  <th scope="col">review</th>
	  <th scope="col">reviewDate</th>
    </tr>
  </thead>
  <tbody>
  <?php

include 'include/config.php';
$cout=1;
$sql = mysqli_query($con, "SELECT * FROM productreviews");


while ($row = mysqli_fetch_array($sql)) {
	echo '<tr>
	<th scope="row">' . $count=$count+1 . '</th>
	<th scope="row">' . $row[0] . '</th>
	<th>' . $row[1] . '</th>
	<th>' . $row[2] . '</th>
	<th>' . $row[3] . '</th>
	<th>' . $row[4] . '</th>
	<th>' . $row[5] . '</th>
	<th>' . $row[6] . '</th>
	<th>' . $row[7] . '</th>
	<th>' . $row[8] . '</th>
	<th>' . $row[9] . '</th>
	<th>' . $row[10] . '</th>
	<th>' . $row[11] . '</th>
	<th>' . $row[12] . '</th>
	<th>' . $row[13] . '</th>

	
  </tr>';
}


?>


  </tbody>
</table>
	</div>
	<!-- END TABLE -->
	</div>
	</div>

</body>
</html>
<!-- http://localhost/fyp/shopping/admin/review.php -->
