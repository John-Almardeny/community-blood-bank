<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';

if (isset($_REQUEST['Submit'])) {

	 $bloodPressure=$_POST['bloodPressure'];
	 $weight=$_POST['weight'];
	 $height=$_POST['height'];
	 $heartRate = $_POST['heartRate'];
	 $temprature = $_POST['temprature'];
	 $alcoholicTest = $_POST['alcoholicTest'];
	 $dateOfCheck = $_POST['dateOfCheck'];
	 $donorId=$_POST['donorId'];
 try {
	$healthCheck->addHealthCheck($bloodPressure, $weight, $height, $heartRate, $temprature, $alcoholicTest, $dateOfCheck, $donorId );
	$stat ="add";
  header("Location:healthChecks.php?stat=$stat");
 }
 catch (PDOException $e)
 {
  echo '<br>PDO Exception Caught.';
  echo 'Error with the database: <br>';
  echo 'Error: ' . $e->getMessage().'</p>';
 }

}
else{
$result =$healthCheck->allHealthChecks();
$PPSresult = $healthCheck->allPPS();
?>
	<form action=""  class="form-horizontal" method="POST">
	<fieldset>
    <legend>Please Complete the Details</legend>
     <div class ="form-group">	
       <label for="bloodPressure" class="col-sm-2 control-label">Blood Pressure</label>
       <div class="col-sm-10">
        <input type="text" name="bloodPressure" id="bloodPressure"  maxlength="9" class="form-control" required pattern = "[0-9]+[\/]+[0-9]{1,2}"autofocus  title="Please enter Blood Pressure">
       </div>
     </div>
     <div class ="form-group">
       <label for="weight" class="col-sm-2 control-label">Weight</label>
       <div class="col-sm-10">
        <input type="text" name="weight" id="weight"  maxlength="5" class="form-control" required required pattern = "[0-9]+([\.][0-9]+)?" title="Please enter the weight">
       </div>
     </div>
     <div class ="form-group">
       <label for="height" class="col-sm-2 control-label">Height</label>
       <div class="col-sm-10">
        <input type="text" name="height" id="height"   maxlength="5" class="form-control" required pattern = "[0-9]+([\.][0-9]+)?" title="Please enter the height">
       </div>
     </div>
	 <div class ="form-group">
       <label for="heartRate" class="col-sm-2 control-label">Heart Rate</label>
       <div class="col-sm-10">
        <input type="text" name="heartRate" id="heartRate"   maxlength="3" class="form-control" required pattern = "[0-9]{1,3}" title="Please enter the heart rate">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="temprature" class="col-sm-2 control-label">Temprature</label>
       <div class="col-sm-10">
        <input type="text" name="temprature" id="temprature"   maxlength="4" class="form-control" required pattern = "[0-9]+([\.][0-9]+)?" title="Please enter the temprature">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="alcoholicTest" class="col-sm-2 control-label">Alcoholic Test</label>
       <div class="col-sm-10">
        <input type="text" name="alcoholicTest" id="alcoholicTest"   maxlength="1" class="form-control" required pattern = "[PF]" title="Please enter Alcoholic Test P or F">
       </div>
     </div>
	 
	 <div class ="form-group">
       <label for="dateOfCheck" class="col-sm-2 control-label">Date Of Check</label>
       <div class="col-sm-10">
        <input type="text" name="dateOfCheck" id="dateOfCheck"   class="form-control" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" title="Please enter the Date Of Check">
       </div>
     </div>
	 
     <div class ="form-group">
       <label for="donorId" class="col-sm-2 control-label">Donor Id</label>
       <div class="col-sm-10">
        <select name="donorId" id = "donorId" class="form-control">
         <?php
            foreach ($PPSresult as $row){
				$donorId = $row->PPS;
				echo "<option value='$donorId'>$donorId</option>\n";
			}
         ?>
	    </select>
       </div>
     </div>
          
    <div class = "form-group">
    <div class="col-sm-10 col-sm-offset-2">
       <input type="submit" class="btn btn-primary" value="Insert Health Check Record" name = "Submit">
       <input type="reset" class="btn btn-primary" value="Clear the Info" >
	 </div>
	 </div>
    </fieldset>
    </form>
<?php
}
require 'inc/footer.inc.php';
?>
</section>
</div>
</div>

</body>
</html>