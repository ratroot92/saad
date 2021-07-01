<?php

include 'include/config.php';
$sql = mysqli_query($con, "SELECT * FROM productreviews");
$num = mysqli_fetch_array($sql);
?>


<?php
if(isset($_POST['btn-delete'])){
	$reviewId=$_POST['review-id'];	
	$sql = mysqli_query($con, 'DELETE  FROM productreviews WHERE productreviews.id='.$reviewId.'');

}

?>


<?php
if(isset($_POST['btn-analyze'])){
$reviewId=$_POST['analyze-id'];	
$curl = curl_init();
curl_setopt_array($curl, array(
  CURLOPT_URL => 'http://54.151.174.78:3000/ajax',
  CURLOPT_RETURNTRANSFER => true,
  CURLOPT_ENCODING => '',
  CURLOPT_MAXREDIRS => 10,
  CURLOPT_TIMEOUT => 0,
  CURLOPT_FOLLOWLOCATION => true,
  CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
  CURLOPT_CUSTOMREQUEST => 'POST',
  CURLOPT_POSTFIELDS =>'{
    "MAC":"98-40-BB-3D-74-2F",
    "IP":"192.168.13.94",
    "reviewText":"BEST PRODUCT FOR ME :)",
    "sessionTime":"2017-02-26 20:43:57",
    "userAgent": "Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.70 Safari/537.36"
}',
  CURLOPT_HTTPHEADER => array(
    'Content-Type: application/json'
  ),
));

$response = curl_exec($curl);
$response=json_decode($response,true);

$result==$response["isFake"];
if($result)
{$result="spam";}
else
{$result="real";}
$sqlQuery='UPDATE productreviews SET productreviews.result="'.$result.'" WHERE id='.$reviewId;
$sql=mysqli_query($con,$sqlQuery);	
curl_close($curl);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Admin| Change Password</title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
	<!-- <link type="text/css" href="bootstrap/css/bootstrap.min.css" rel="stylesheet">
	<link type="text/css" href="bootstrap/css/bootstrap-responsive.min.css" rel="stylesheet"> -->
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
  <!-- id prdid username mac ip location reviewdate  review  -->
    <tr>
	<th scope="col">sr#</th>
      <th scope="col">Id</th> 
      <th scope="col">Product Id</th>
      <th scope="col">Username</th>
      <th scope="col">MAC ADDR</th>
	  <th scope="col">IP ADDR</th>
	  <th scope="col">Location</th>
	  <th scope="col">Session Time</th>
	  <th scope="col">Review</th>
	  <th scope="col">Action</th>
	  <th scope="col">Result</th>
    </tr>
  </thead>
  <tbody>
  <?php

include 'include/config.php';
$$count=1;
$sql = mysqli_query($con, "SELECT * FROM productreviews");
// var_dump($_SERVER);

while ($row = mysqli_fetch_array($sql)) {
	echo '<tr>
	<th scope="row">' . $count=$count+1 . '</th>
	<th scope="row">' . $row[0] . '</th>
	<th>' . $row[6] . '</th>
	<th>' . $row[10] . '</th>
	<th>' . $row[3] . '</th>
	<th>' . $row[2] . '</th>
	<th> n/a </th>
	<th>' . $row[13] . '</th>
	<th>' . $row[12] . '</th>
	<th class="d-flex flex-row justify-content-around align-items-center">
	<form method="post" >
	<input type="hidden" name="review-id"  value="'.$row[0].'" />
	<input type="submit" name="btn-delete" value="Delete" class="btn btn-sm btn-danger" />
	</form>
	<form method="post" >
	<input type="hidden" name="analyze-id"  value="'.$row[0].'" />
	<input type="submit" name="btn-analyze" value="Analyze" class="btn btn-sm btn-danger" />
	</form>
	</th>
	<th>' . $row[14] . '</th>

	
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
