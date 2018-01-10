<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';

if (isset($_REQUEST['Submit'])) {
try {
  $fName= $_POST['fName'];
  $result = $donor->findDonorsByName($fName);
  $count=count($result);
  if ($count>0)
  {
    displayDonorsRecs($result);
  }
  else echo ("<br>There are no donors to view!");
}
catch(PDOException $e) {
 echo '<br>Problem with the Selecting from the Donor table - ';
 echo $e->getMessage();
 exit;
}
}
else {
?>
<form action="" method="post" id = "form" class = form-horizontal>
<div class="form-group">
 <label for="fName" class="col-sm-3 control-label">Donor: </label>
 <div class="col-sm-9">
 <input type="text" id = "fName" name="fName"  autofocus required
                     pattern="[A-Za-z ]+" autofocus title="Please enter the first name" class="form-control">
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



























