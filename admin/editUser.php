<?php require 'inc/secure.inc.php';
require 'inc/init.inc.php';
if (isset($_REQUEST['Submit'])) {
try
{
    $sql="select * from users where pass = SHA1(:pass)";
    $stmt = $dbh->prepare($sql);
    $stmt->bindParam(':pass', $_POST['pass'],PDO::PARAM_STR);
	$stmt->execute();
	$count= $stmt->rowCount();
	if ($count==0) {
       echo("Error ..updating record"); }
    else {
    $sql2 = "UPDATE Users SET pass = SHA1(:pass) WHERE username= :user";
    $stmt = $dbh->prepare($sql2);
    $stmt->bindParam(':pass', $_POST['newpass'],PDO::PARAM_STR);
    $stmt->bindParam(':user', $_POST['username'],PDO::PARAM_STR);
	$stmt->execute();
    echo("User account successfully updated");
    }
}
catch (PDOException $e)
{
   echo '<p id="PDOError">PDO Exception Caught.';
   echo 'Error with the database: <br>';
   echo 'SQL Query: ', $sql;
   echo 'Error: ' . $e->getMessage().'</p>';

}
}


else {

$sql = "SELECT * FROM Users";
$stmt = $dbh->prepare($sql);
$stmt->execute();

$count= $stmt->rowCount();
if ($count==0) {
		exit("There are no users!");
}
$row = $stmt->fetch(PDO::FETCH_ASSOC);
$uname = $row['username'];

?>
<h2>Update User Password</h2>
</p>
<form action = "" method = "post" id = "edituser" class="form-horizontal">
    <fieldset>
    <div class ="form-group">
      <label for="username" class="col-sm-2 control-label">Username</label>
       <div class="col-sm-10">
       <input type="text" name="username" id = "username" readonly value = "<?php echo $uname; ?>">
      </div></div>
     <div class ="form-group">
      <label for="pass" class="col-sm-2 control-label">Password</label>
       <div class="col-sm-10">
       <input type="password" name="pass" id = "pass" required autofocus pattern ="\S{4,}">
      </div></div>
     <div class ="form-group">
		   <label for="newpass" class="col-sm-2 control-label">New Password</label>
       <div class="col-sm-10">
		    <input type="password" id="newpass" name="newpass" required pattern ="\S{4,}">
		</div></div>
     <div class ="form-group">
		   <label for="confirmpass" class="col-sm-2 control-label">Confirm Password</label>
       <div class="col-sm-10">
		    <input type="password" id="confirmpass" name="confirmpass" required pattern ="\S{4,}" >
		</div></div>

         <div class ="fieldarea">
        </div>
	<div class="buttonarea">
       <input type="submit" class="btn btn-primary"value="Update User Record" name = "Submit">
       <input type="reset" class="btn btn-primary"value="Clear the Info" >
	</div>
    </fieldset>
</form>
<?php

}

require 'inc/footer.inc.php';
?>
</section>
</div>

</body>
<script>


$(document).ready(function(){

$('#confirmpass').change(function() {
 var password = $('#newpass').val();
 var passwordConfirm = $('#confirmpass').val();
 if (password && passwordConfirm)
 {
   if ( password === passwordConfirm ) {
     if ($('#fail').length) {
       $('#fail').remove();
     }
     $("#confirmpass").css('background-color','white');
   }
   else {
     if (!$('#fail').length) {
       $('#confirmpass').after("<p id='fail'>The two passwords do not match</p>");
     }
     $("#confirmpass").css('background-color','#799');
     $("#confirmpass").focus();
   }
 }
});
});
</script>


</html>