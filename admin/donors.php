<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';
if (isset($_GET['stat'])) {
if($_GET['stat'] =='add') {
  echo "<h3>Donor has been added successfully!</h3>";
}
else if($_GET['stat'] =='edit') {
  echo "<h3>Donor has been updated successfully!</h3>";
}
else if($_GET['stat'] =='delete') {
  echo "<h3>Donor has been deleted successfully!</h3>";
}
}
echo "<table width='100%'><tr>";
echo "<td width='33%'><h2 class='text-left'><a class='btn btn-primary' href='insertDonor.php' role='button'><span class='glyphicon glyphicon-plus'></span><b> Add</b></a></h2></td>";
echo "<td width='33%'><h2 class='text-center'><a class='btn btn-primary' href='searchDonorbyName.php' role='button'><span class='glyphicon glyphicon-search'></span><b> Search (Name)</b></a></h2></td>";
echo "<td><h2 class='text-right'><a class='btn btn-primary' href='searchDonorByPPS.php' role='button'><span class='glyphicon glyphicon-search'></span><b> Search (PPS)</b></a></h2></td></tr></table>";

$result =$donor->allDonors();
$count=count($result);
if ($count>0)
 {
  displayDonorsRecs($result);
  }
  else echo ("<br>There are no donors to view!");

require 'inc/footer.inc.php';
?>
</body>
</html>



























