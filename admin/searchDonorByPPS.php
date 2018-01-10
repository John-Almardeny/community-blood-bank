<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';

if (isset($_REQUEST['Submit'])) {

try {
  $PPS= $_POST['PPS'];
  $result = $donor->findDonorByPPS($PPS);

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
<form action="" method="post" id = "form" class="form-horizontal">
<div class="form-group">
 <label for="PPS" class="col-sm-3 control-label">PPS: </label>
  <div class="col-sm-9">
  <input type="text" id = "PPS" name="PPS"   autofocus title="Please enter the PPS " class="form-control">
  </div>
</div>

<div class="form-group">
 <div class="col-sm-offset-3 col-sm-9">
 <input type="submit" name = "Submit" class="btn btn-primary">
 </div>
</div>
</form>
<?php
}
require 'inc/footer.inc.php';
?>
</body>
</html>



























