<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';
if (isset($_REQUEST['Submit'])) {
try
{   $bId=$_POST['bId'];
    $BloodUnit->deleteBloodUnitRecord($bId);
    $stat ="delete";
    header("Location:bloodUnits.php?stat=$stat");
}
catch (PDOException $e)
{
   echo '<br>PDO Exception Caught.';
   echo 'Error with the database: <br>';
   echo 'Error: ' . $e->getMessage().'</p>';
}
}
 else {
	$bId = $_GET['bId'];
try
{
   $bloodUnitRec = $BloodUnit->oneBloodUnit($bId);
   retrieveOneBloodUnit($bloodUnitRec);
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
    <fieldset><legend>Delete Blood Unit Record (Id: <?php echo $bId;?>)</legend>

	    <input type="hidden" name="bId" id="bId" value = "<?php echo $bId;?>" >


    <div class ="form-group">
       <label for="bloodGroup" class="col-sm-2 control-label">Blood Group</label>
       <div class="col-sm-10">
        <input type="text" name="bloodGroup" id="bloodGroup"   class="form-control" disabled value = "<?php echo $bloodGroup;?>">
       </div>
     </div>
   
   <div class ="form-group">
       <label for="amount" class="col-sm-2 control-label">Amount</label>
       <div class="col-sm-10">
        <input type="text" name="amount" id="amount" class="form-control" disabled value = "<?php echo $amount;?>">
       </div>
     </div>
     <div class ="form-group">
       <label for="dateOfDonation" class="col-sm-2 control-label">Date Of Donation</label>
       <div class="col-sm-10">
        <input type="text" name="dateOfDonation" id="dateOfDonation"  class="form-control" disabled value = "<?php echo $dateOfDonation;?>">
       </div>
     </div>
     <div class ="form-group">
       <label for="donorId" class="col-sm-2 control-label">Donor Id</label>
       <div class="col-sm-10">
        <input type="text" name="donorId" id="donorId"  class="form-control" disabled value = "<?php echo $donorId;?>">
       </div>
     </div>

<div class = "form-group">
 <div class="col-sm-10 col-sm-offset-2">
       <input type="submit" class="btn btn-primary" value="Delete Blood Unit Record" name = "Submit">
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
