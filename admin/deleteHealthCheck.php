<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';
if (isset($_REQUEST['Submit'])) {
try
{   $hId=$_POST['hId'];
    $healthCheck->deleteHealthCheckRecord($hId);
    $stat ="delete";
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
    <fieldset><legend>Delete Health Check Record (Id: <?php echo $hId;?>)</legend>

	    <input type="hidden" name="hId" id="hId" value = "<?php echo $hId;?>" >


    <div class ="form-group">	
       <label for="bloodPressure" class="col-sm-2 control-label">Blood Pressure</label>
       <div class="col-sm-10">
        <input type="text" name="bloodPressure" id="bloodPressure"   class="form-control"  disabled value = "<?php echo $bloodPressure;?>">
       </div>
     </div>
     <div class ="form-group">
       <label for="weight" class="col-sm-2 control-label">Weight</label>
       <div class="col-sm-10">
        <input type="text" name="weight" id="weight"  class="form-control"  disabled value = "<?php echo $weight;?>">
       </div>
     </div>
     <div class ="form-group">
       <label for="height" class="col-sm-2 control-label">Height</label>
       <div class="col-sm-10">
        <input type="text" name="height" id="height"    class="form-control"  disabled value = "<?php echo $height;?>">
       </div>
     </div>
	 <div class ="form-group">
       <label for="heartRate" class="col-sm-2 control-label">Heart Rate</label>
       <div class="col-sm-10">
        <input type="text" name="heartRate" id="heartRate"    class="form-control"  disabled value = "<?php echo $heartRate;?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="temprature" class="col-sm-2 control-label">Temprature</label>
       <div class="col-sm-10">
        <input type="text" name="temprature" id="temprature"    class="form-control"   disabled value = "<?php echo $temprature;?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="alcoholicTest" class="col-sm-2 control-label">Alcoholic Test</label>
       <div class="col-sm-10">
        <input type="text" name="alcoholicTest" id="alcoholicTest"    class="form-control"   disabled value = "<?php echo $alcoholicTest;?>">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="dateOfCheck" class="col-sm-2 control-label">Date Of Check</label>
       <div class="col-sm-10">
        <input type="text" name="dateOfCheck" id="dateOfCheck"   class="form-control"  disabled value = "<?php echo $dateOfCheck;?>">
       </div>
     </div>
	 
     <div class ="form-group">
       <label for="donorId" class="col-sm-2 control-label">Donor Id</label>
       <div class="col-sm-10">
        <input type="text" name="donorId" id="donorId"   class="form-control"  disabled value = "<?php echo $donorId;?>">
       </div>
     </div>


<div class = "form-group">
 <div class="col-sm-10 col-sm-offset-2">
       <input type="submit" class="btn btn-primary" value="Delete Health Check Record" name = "Submit">
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
