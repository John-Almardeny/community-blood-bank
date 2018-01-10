<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';
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
    <fieldset><legend>View a Donor Record for PPS: <?php echo $PPS;?></legend>

	    <input type="hidden" name="PPS" id="PPS" value = "<?php echo $PPS;?>" >


     <div class ="form-group">
       <label for="fName" class="col-sm-2 control-label">First Name</label></td>
       <div class="col-sm-10">
         <input type="url" name="fName" id="fName"  class="form-control"  disabled value = "<?php echo $fName;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="lName" class="col-sm-2 control-label">Last Name</label></td>
       <div class="col-sm-10">
         <input type="url" name="lName" id="lName"  class="form-control" disabled value = "<?php echo $lName;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="DOB" class="col-sm-2 control-label">Date of Birth</label></td>
       <div class="col-sm-10">
         <input type="url" name="DOB" id="DOB"  class="form-control" disabled value = "<?php echo $DOB;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="gender" class="col-sm-2 control-label">Gender</label>
       <div class="col-sm-10">
        <input type="text" name="gender" id="gender"   class="form-control" disabled value = "<?php echo $gender;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="email" class="col-sm-2 control-label">Email Contact</label>
       <div class="col-sm-10">
        <input type="email" name="email" id="email"  class="form-control" disabled value = "<?php echo $email;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="contactNo" class="col-sm-2 control-label">Contact Number</label>
       <div class="col-sm-10">
        <input type="text" name="contactNo" id="contactNo"   class="form-control" disabled value = "<?php echo $contactNo;?>">
       </div>
     </div>
     <div class ="form-group">
       <label for="city" class="col-sm-2 control-label">City</label>
       <div class="col-sm-10">
        <input type="text" name="city" id="city"   class="form-control" disabled value = "<?php echo $city;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="street" class="col-sm-2 control-label">Street</label>
       <div class="col-sm-10">
        <input type="text" name="street" id="street"   class="form-control" disabled value = "<?php echo $street;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="timesOfDonations" class="col-sm-2 control-label">Times of Donation</label>
       <div class="col-sm-10">
        <input type="text" name="timesOfDonations" id="timesOfDonations"   class="form-control" disabled value = "<?php echo $timesOfDonations;?>">
       </div>
     </div>

    </fieldset>
    </form>

<?php

require 'inc/footer.inc.php';?>
</section>
</div>
</body>
</html>
