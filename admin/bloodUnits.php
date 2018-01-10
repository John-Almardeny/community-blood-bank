<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';
if (isset($_GET['stat'])) {
if($_GET['stat'] =='add') {
  echo "<h3>A Blood Unit has been added successfully!</h3>";
}
else if($_GET['stat'] =='edit') {
  echo "<h3>The Blood Unit record has been updated successfully!</h3>";
}
else if($_GET['stat'] =='delete') {
  echo "<h3>The Blood Unit record has been deleted successfully!</h3>";
}
}
echo "<table width='100%'><tr>";
echo "<td width='33%'><h2 class='text-left'><a class='btn btn-primary' href='insertBloodUnit.php' role='button'><span class='glyphicon glyphicon-plus'></span><b> Add</b></a></h2></td>";
echo "<td width='33%'><h2 class='text-center'><a class='btn btn-primary' href='searchBloodUnitByGroup.php' role='button'><span class='glyphicon glyphicon-search'></span><b> Search (Blood Group)</b></a></h2></td>";
echo "<td width='33%'><h2 class='text-right'><a class='btn btn-primary' href='searchBloodUnitById.php' role='button'><span class='glyphicon glyphicon-search'></span><b> Search (Id)</b></a></h2></td>";

$result =$BloodUnit->allBloodUnits();
$count=count($result);
if ($count>0)
 {
  displayBloodUnitsRecs($result);
  }
  else echo ("<br>There are no Blood Units to view!");

require 'inc/footer.inc.php';
?>
</body>
</html>



























