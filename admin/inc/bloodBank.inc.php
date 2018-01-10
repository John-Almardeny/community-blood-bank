<?php
function displayDonorsRecs($result) {
 echo '<div class="table-responsive">';
 //PPS, fName, lName, DOB, gender, email, contactNo, city, street, timesOfDonations
 echo '<table class="table table-striped table-hover table-bordered table-condensed" ><thead ><tr><th>PPS</th><th>First Name</th>
 <th>Last Name</th><th>DOB</th><th>Gender</th><th>Email</th><th>Contact Number</th><th>City</th><th>Street</th><th>Times of Donations</th></tr></thead><tbody>';
   foreach ($result as $row){
	echo "<tr>";
	$PPS=$row->PPS;
	echo "<td>".$row->PPS."</td>";
	echo "<td>".$row->fName."</td>";
	echo "<td>".$row->lName."</td>";
	echo "<td>".$row->DOB."</td>";
	echo "<td>".$row->gender."</td>";
	echo "<td>".$row->email."</td>";
	echo "<td>".$row->contactNo."</td>";
	echo "<td>".$row->city."</td>";
	echo "<td>".$row->street."</td>";
	echo "<td>".$row->timesOfDonations."</td>";
    echo "<td><div class='btn-group'>
	<a href='viewDonor.php?PPS=$PPS' class='btn btn-default'><span class='glyphicon glyphicon-open' aria-hidden='true'></span></a>
	<a href='editDonor.php?PPS=$PPS' class='btn btn-default'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a>
	<a href='deleteDonor.php?PPS=$PPS' class='btn btn-default'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
    echo"</tr>";
   }
  echo '</tbody></table>';
}


function displayHealthCheckRecords($result) {
 echo '<div class="table-responsive">';
 //hId, bloodPressure, weight, height, heartRate, temprature, alcoholicTest, dateOfCheck, donorId
 echo '<table class="table table-striped table-hover table-bordered table-condensed">
 <thead><tr><th>ID</th><th>Blood Pressure</th><th>Weight</th><th>Height</th><th>Heart Rate</th><th>Temprature</th>
 <th>Alcoholic Test</th><th>Date of Check</th><th>Donor ID</th></tr></thead><tbody>';
   foreach ($result as $row){
	echo "<tr>";
	$hId=$row->hId;
	echo "<td>".$row->hId."</td>";
	echo "<td>".$row->bloodPressure."</td>";
	echo "<td>".$row->weight."</td>";
	echo "<td>".$row->height."</td>";
	echo "<td>".$row->heartRate."</td>";
	echo "<td>".$row->temprature."</td>";
	echo "<td>".$row->alcoholicTest."</td>";
	echo "<td>".$row->dateOfCheck."</td>";
	echo "<td>".$row->donorId."</td>";
    echo "<td><div class='btn-group'>
			<a href='viewHealthCheck.php?hId=$hId' class='btn btn-default'><span class='glyphicon glyphicon-open' aria-hidden='true'></span></a>
		  <a href='editHealthcheck.php?hId=$hId' class='btn btn-default'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a>
		  <a href='deleteHealthCheck.php?hId=$hId' class='btn btn-default'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
    echo"</tr>";
   }
  echo '</tbody></table>';
}


function displayBloodUnitsRecs($result) {
 echo '<div class="table-responsive">';
 echo '<table class="table table-striped table-hover table-bordered table-condensed">
 <thead><tr><th>ID</th><th>Blood Group</th><th>Amount</th><th>Date of Donation</th><th>Expiry Date</th><th>Donor ID</th></tr></thead><tbody>';
   foreach ($result as $row){
	echo "<tr>";
	$bId=$row->bId;
	echo "<td>".$row->bId."</td>";
	echo "<td>".$row->bloodGroup."</td>";
	echo "<td>".$row->amount."</td>";
	echo "<td>".$row->dateOfDonation."</td>";
    echo "<td>".$row->expiryDate."</td>";
	echo "<td>".$row->donorId."</td>";
    echo "<td><div class='btn-group'>
		  <a href='viewBloodUnit.php?bId=$bId' class='btn btn-default'><span class='glyphicon glyphicon-open' aria-hidden='true'></span></a>
		  <a href='editBloodUnit.php?bId=$bId' class='btn btn-default'><span class='glyphicon glyphicon-edit' aria-hidden='true'></span></a>
		  <a href='deleteBloodUnit.php?bId=$bId' class='btn btn-default'><span class='glyphicon glyphicon-trash' aria-hidden='true'></span></a></td>";
    echo"</tr>";

   }
  echo '</tbody></table>';
}




function retrieveOneDonor($donor) {
    global $PPS, $fName, $lName, $DOB, $gender, $email, $contactNo, $city, $street, $timesOfDonations;
    $PPS = $donor->PPS;
    $fName = $donor->fName;
	$lName = $donor->lName;
	$DOB = $donor->DOB;
	$gender = $donor->gender;
	$email = $donor->email;
	$contactNo = $donor->contactNo;
	$city = $donor->city;
	$street = $donor->street;
	$timesOfDonations = $donor->timesOfDonations;
}

function retrieveOneHealthCheck($healthCheck) {
    global $hId, $bloodPressure, $weight, $height, $heartRate, $temprature, $alcoholicTest, $dateOfCheck, $donorId;
    $hId = $healthCheck->hId;
    $bloodPressure = $healthCheck->bloodPressure;
	$weight = $healthCheck->weight;
	$height = $healthCheck->height;
	$heartRate = $healthCheck->heartRate;
	$temprature = $healthCheck->temprature;
	$alcoholicTest = $healthCheck->alcoholicTest;
	$dateOfCheck = $healthCheck->dateOfCheck;
	$donorId = $healthCheck->donorId;
}

function retrieveOneBloodUnit($blood) {
 
    global $bId, $bloodGroup, $amount, $dateOfDonation, $expiryDate, $donorId;
    $bId = $blood->bId;
    $bloodGroup = $blood->bloodGroup;
    $amount = $blood->amount;
    $dateOfDonation = $blood->dateOfDonation;
    $expiryDate = $blood->expiryDate;
    $donorId = $blood->donorId;

}



?>