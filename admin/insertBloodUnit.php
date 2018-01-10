<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';

if (isset($_REQUEST['Submit'])) {
 $bloodGroup=$_POST['bloodGroup'];
 $amount=$_POST['amount'];
 $dateOfDonation=$_POST['dateOfDonation'];
 $_POST['expiryDate'];
 $donorId=$_POST['donorId'];
 try {
	$BloodUnit->addBloodUnit($bloodGroup, $amount, $dateOfDonation, $donorId );
	$stat ="add";
  header("Location:bloodUnits.php?stat=$stat");
 }
 catch (PDOException $e)
 {
  echo '<br>PDO Exception Caught.';
  echo 'Error with the database: <br>';
  echo 'Error: ' . $e->getMessage().'</p>';
 }

}
else{
$result =$BloodUnit->allBloodUnits();
$PPSresult = $BloodUnit->allPPS();
?>
	<form action=""  class="form-horizontal" method="POST">
	<fieldset>
    <legend>Please Complete the Details</legend>
     <div class ="form-group">
       <label for="bloodGroup" class="col-sm-2 control-label">Blood Group</label>
       <div class="col-sm-10">
        <input type="text" name="bloodGroup" id="bloodGroup"  maxlength="3" class="form-control" 
		required pattern = "[A]+[B]+[+]||[A]+[B]+[-]||[A]+[+]||[A][-]||[B]+[+]||[B]+[-]||[O]+[+]||[O]+[-]" autofocus title="Please enter correct Blood Group e.g. AB+">
       </div>
     </div>
     <div class ="form-group">
       <label for="amount" class="col-sm-2 control-label">Amount</label>
       <div class="col-sm-10">
        <input type="text" name="amount" id="amount"  maxlength="3" class="form-control" required pattern = "[5]+[0]+[0]||[7]+[5]+[0]" title="Please enter correct Blood Amount 500 or 750">
       </div>
     </div>
     <div class ="form-group">
       <label for="dateOfDonation" class="col-sm-2 control-label">Date Of Donation</label>
       <div class="col-sm-10">
        <input type="text" name="dateOfDonation" id="dateOfDonation"  class="form-control" required pattern="[0-9]{4}-(0[1-9]|1[012])-(0[1-9]|1[0-9]|2[0-9]|3[01])"  title="Please enter correct Date Of Donation YYYY-MM-DD">
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
       <input type="submit" class="btn btn-primary" value="Insert Blood Record" name = "Submit">
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