<?php
require 'inc/init.inc.php';
if (isset($_REQUEST['Submit'])) {
try
{   
	$hId =$_POST['hId'];
	$bloodPressure=$_POST['bloodPressure'];
	$weight=$_POST['weight'];
	$height=$_POST['height'];
	$heartRate = $_POST['heartRate'];
	$temprature = $_POST['temprature'];
	$alcoholicTest = $_POST['alcoholicTest'];
	$dateOfCheck = $_POST['dateOfCheck'];
	$donorId=$_POST['donorId'];
    $healthCheck->updateHealthCheckRecord($hId, $bloodPressure, $weight, $height, $heartRate, $temprature, $alcoholicTest, $dateOfCheck, $donorId );
    $stat ="edit";
    header("Location:healthChecks.php?stat=$stat");
}
catch (PDOException $e)
{
   echo '<br>PDO Exception Caught.';
   echo 'Error with the database: <br>';
   echo 'Error: ' . $e->getMessage().'</p>';
}
}
 else {
	$hId = $_GET['hId'];
	$result =$healthCheck->allHealthChecks();

try
{
   $healthCheckRec = $healthCheck->oneHealthCheck($hId);
   retrieveOneHealthCheck($healthCheckRec);
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
    <fieldset><legend>Update a Health Check Record for Id: <?php echo $hId;?></legend>

	    <input type="hidden" name="bId" id="bId" value = "<?php echo $hId;?>" >

	
   <div class ="form-group">	
       <label for="bloodPressure" class="col-sm-2 control-label">Blood Pressure</label>
       <div class="col-sm-10">
        <input type="text" name="bloodPressure" id="bloodPressure"  maxlength="9" class="form-control" required pattern = "[0-9]+[\/]+[0-9]{1,2}"autofocus  title="Please enter Blood Pressure" value = "<?php echo $bloodPressure;?>">
       </div>
     </div>
     <div class ="form-group">
       <label for="weight" class="col-sm-2 control-label">Weight</label>
       <div class="col-sm-10">
        <input type="text" name="weight" id="weight"  maxlength="5" class="form-control" required required pattern = "[0-9]+([\.][0-9]+)?" title="Please enter the weight" value = "<?php echo $weight;?>">
       </div>
     </div>
     <div class ="form-group">
       <label for="height" class="col-sm-2 control-label">Height</label>
       <div class="col-sm-10">
        <input type="text" name="height" id="height"   maxlength="5" class="form-control" required pattern = "[0-9]+([\.][0-9]+)?" title="Please enter the height" value = "<?php echo $height;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="heartRate" class="col-sm-2 control-label">Heart Rate</label>
       <div class="col-sm-10">
        <input type="text" name="heartRate" id="heartRate"   maxlength="3" class="form-control" required pattern = "[0-9]{1,3}" title="Please enter the heart rate" value = "<?php echo $heartRate;?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="temprature" class="col-sm-2 control-label">Temprature</label>
       <div class="col-sm-10">
        <input type="text" name="temprature" id="temprature"   maxlength="4" class="form-control" required pattern = "[0-9]+([\.][0-9]+)?" title="Please enter the temprature" value = "<?php echo $temprature;?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="alcoholicTest" class="col-sm-2 control-label">Alcoholic Test</label>
       <div class="col-sm-10">
        <input type="text" name="alcoholicTest" id="alcoholicTest"    maxlength="1" class="form-control" required pattern = "[PF]" title="Please enter Alcoholic Test P or F" value = "<?php echo $alcoholicTest;?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="dateOfCheck" class="col-sm-2 control-label">Date Of Check</label>
       <div class="col-sm-10">
        <input type="text" name="dateOfCheck" id="dateOfCheck"   class="form-control" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Please enter the Date Of Check" value = "<?php echo $dateOfCheck;?>">
       </div>
     </div>
	 
     <div class ="form-group">
       <label for="donorId" class="col-sm-2 control-label">Donor Id</label>
       <div class="col-sm-10">
        <input type="text" name="donorId" id="donorId"  maxlength="9" class="form-control" value = "<?php echo $donorId;?>">
       </div>
     </div>

     
	<div class = "form-group">
	<div class="col-sm-10 col-sm-offset-2">
       <input type="submit" class="btn btn-primary" value="Update Blood Unit Record" name = "Submit">
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
