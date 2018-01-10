<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';

if (isset($_REQUEST['Submit'])) {
try {
  $bId= $_POST['bId'];
  $result = $BloodUnit->findBloodUnitById($bId);
  $count=count($result);
  if ($count>0)
  {
    displayBloodUnitsRecs($result);
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
 <label for="bId" class="col-sm-3 control-label">Blood Unit Id: </label>
 <div class="col-sm-9">
 <input type="text" id = "bId" name="bId"  autofocus required
                      autofocus  title="Please enter the blood unit id " class="form-control">
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



























