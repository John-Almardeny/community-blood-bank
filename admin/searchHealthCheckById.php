<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';

if (isset($_REQUEST['Submit'])) {
try {
  $hId= $_POST['hId'];
  $result = $healthCheck->findHealthCheckById($hId);
  $count=count($result);
  if ($count>0)
  {
    displayHealthCheckRecords($result);
  }
  else echo ("<br>There are no Health Checks to view!");
}
catch(PDOException $e) {
 echo '<br>Problem with the Selecting from the Health Check table - ';
 echo $e->getMessage();
 exit;
}
}
else {
?>
<form action="" method="post" id = "form" class = form-horizontal>
<div class="form-group">
 <label for="bId" class="col-sm-3 control-label">Health Check Id: </label>
 <div class="col-sm-9">
 <input type="text" id = "hId" name="hId"  autofocus required
                      autofocus  title="Please enter the Health Check id " class="form-control">
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



























