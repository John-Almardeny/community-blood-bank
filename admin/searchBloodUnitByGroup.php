<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';

if (isset($_REQUEST['Submit'])) {
try {
  $bloodGroup= $_POST['bloodGroup'];
  $bloodG='bloodGroup';
  $result = $BloodUnit->findBloodUnitByGroup($bloodGroup);
  $count=count($result);
  if ($count>0)
  {
    displayBloodUnitsrecs($result);
  }
  else echo ("<br>There are no Blood Units to view!");
}
catch(PDOException $e) {
 echo '<br>Problem with the Selecting from the Blood Unit table - ';
 echo $e->getMessage();
 exit;
}
}
else {
?>
<form action="" method="post" id = "form" class = form-horizontal>
<div class="form-group">
 <label for="bloodGroup" class="col-sm-3 control-label">Blood Unit Group: </label>
 <div class="col-sm-9">
 <input type="text" id = "bloodGroup" name="bloodGroup"  autofocus required
                      autofocus  title="Please enter the blood group " class="form-control">
 </div>
 </div>

  <div class="form-group">
    <div class="col-sm-offset-3 col-sm-9">
 <input type="submit" name = "Submit" class="btn btn-primary">
 </div></div>
</form>
<?php
}
require 'inc/footer.inc.php';
?>
</body>
</html>



























