<?php
require 'access.inc.php';
if (!loggedIn()) {//if user is not looged in
  header('Location:index.php');
}
?>