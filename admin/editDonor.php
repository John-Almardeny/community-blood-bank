<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';
if (isset($_REQUEST['Submit'])) {
try
{   
	 $PPS=$_POST['PPS'];
	 $fName=$_POST['fName'];
	 $lName=$_POST['lName'];
	 $gender=$_POST['gender'];
	 $email=$_POST['email'];
	 $contactNo=$_POST['contactNo'];
	 $city=$_POST['city'];
	 $street=$_POST['street'];
	 $timesOfDonations=$_POST['timesOfDonations'];
    $donor->updateDonorRecord($PPS, $fName, $lName, $DOB, $gender, $email, $contactNo, $city, $street, $timesOfDonations);
    $stat ="edit";
    header("Location:donors.php?stat=$stat");
}
catch (PDOException $e)
{
   echo '<br>PDO Exception Caught.';
   echo 'Error with the database: <br>';
   echo 'Error: ' . $e->getMessage().'</p>';
}
}
 else {
	 $PPS = $_GET['PPS'];
	try
	{
	   $donorRec = $donor->oneDonor($PPS);
	   retrieveOneDonor($donorRec);
	}
	catch (PDOException $e)
	{
	   echo '<br>PDO Exception Caught.';
	   echo 'Error with the database: <br>';
	   echo 'SQL Query: ', $sql;
	   echo 'Error: ' . $e->getMessage().'</p>';
	}

	?>
</p>
<form action = "" method = "post" class="form-horizontal">
    <fieldset><legend>Update a Donor Record</legend>

	    <input type="hidden" name="PPS" id="PPS" value = "<?php echo $PPS;?>" >
	 
	 <div class ="form-group">
       <label for="fName" class="col-sm-2 control-label">First Name</label></td>
       <div class="col-sm-10">
         <input type="text" name="fName" id="fName"  class="form-control"  title="Please enter First Name" value = "<?php echo $fName;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="lName" class="col-sm-2 control-label">Last Name</label></td>
       <div class="col-sm-10">
         <input type="text" name="lName" id="lName"  class="form-control"  title="Please enter Last Name" value = "<?php echo $lName;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="DOB" class="col-sm-2 control-label">Date of Birth</label></td>
       <div class="col-sm-10">
         <input type="text" name="DOB" id="DOB"  class="form-control"  required pattern = "[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Please enter correct Date of Birth YYYY-MM-DD" value = "<?php echo $DOB;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="gender" class="col-sm-2 control-label">Gender</label>
       <div class="col-sm-10">
        <input type="text" name="gender" id="gender"   class="form-control"  required pattern = "[MF]{1}" title="Please enter correct Gender M or F" value = "<?php echo $gender;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="email" class="col-sm-2 control-label">Email Contact</label>
       <div class="col-sm-10">
        <input type="email" name="email" id="email"  class="form-control" required pattern = "[a-zA-Z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$" title="Please enter a valid Email Contact Address" value = "<?php echo $email;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="contactNo" class="col-sm-2 control-label">Contact Number</label>
       <div class="col-sm-10">
        <input type="text" name="contactNo" id="contactNo"   class="form-control" required pattern="[0-9 ]+" title="Please enter a valid Contact Number" value = "<?php echo $contactNo;?>">
       </div>
     </div>
     <div class ="form-group">
       <label for="city" class="col-sm-2 control-label">City</label>
       <div class="col-sm-10">
        <input type="text" name="city" id="city"   class="form-control"  title="Please enter the City" value = "<?php echo $city;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="street" class="col-sm-2 control-label">Street</label>
       <div class="col-sm-10">
        <input type="text" name="street" id="street"   class="form-control"  title="Please enter the Street" value = "<?php echo $street;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="timesOfDonations" class="col-sm-2 control-label">Times of Donation</label>
       <div class="col-sm-10">
        <input type="text" name="timesOfDonations" id="timesOfDonations"   class="form-control" required pattern="[0-9 ]" title="Please enter the Times of Donation" value = "<?php echo $timesOfDonations;?>">
       </div>
     </div>
	 
     
	<div class = "form-group">
	<div class="col-sm-10 col-sm-offset-2">
       <input type="submit" class="btn btn-primary" value="Update Donor Record" name = "Submit">
       <input type="reset" class="btn btn-primary" value="Clear the Info" >
	 </div>
	 </div>
    </fieldset>
    </form>

<?php
}
require 'inc/footer.inc.php';?>
</section>
</div>
</body>
</html>
