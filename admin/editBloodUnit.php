<?php
require 'inc/init.inc.php';
if (isset($_REQUEST['Submit'])) {
try
{   
	$bId =$_POST['bId'];
	$bloodGroup=$_POST['bloodGroup'];
	$amount=$_POST['amount'];
	$dateOfDonation=$_POST['dateOfDonation'];
	$donorId=$_POST['donorId'];
    $BloodUnit->updateBloodUnitRecord($bId, $bloodGroup, $amount, $dateOfDonation, $donorId);
    $stat ="edit";
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
	$result =$BloodUnit->allBloodUnits();

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
    <fieldset><legend>Update a Blood Unit Record for Id: <?php echo $bId;?></legend>

	    <input type="hidden" name="bId" id="bId" value = "<?php echo $bId;?>" >

	<div class ="form-group">
       <label for="bloodGroup" class="col-sm-2 control-label">Blood Group</label>
       <div class="col-sm-10">
        <input type="text" name="bloodGroup" id="bloodGroup"  maxlength="3" class="form-control" required pattern = "[A]+[B]+[+]||[A]+[B]+[-]||[A]+[+]||[A][-]||[B]+[+]||[B]+[-]||[O]+[+]||[O]+[-]" value = "<?php echo $bloodGroup;?>">
       </div>
     </div>
   
   <div class ="form-group">
       <label for="amount" class="col-sm-2 control-label">Amount</label>
       <div class="col-sm-10">
        <input type="text" name="amount" id="amount" maxlength="3" class="form-control" required pattern = "[5]+[0]+[0]||[7]+[5]+[0]"value = "<?php echo $amount;?>">
       </div>
     </div>
     <div class ="form-group">
       <label for="dateOfDonation" class="col-sm-2 control-label">Date Of Donation</label>
       <div class="col-sm-10">
        <input type="text" name="dateOfDonation" id="dateOfDonation"  class="form-control" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])" value = "<?php echo $dateOfDonation;?>">
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
