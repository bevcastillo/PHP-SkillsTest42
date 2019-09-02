<?php 
include('./db/dbconn.php');
connect();

$stud_idno = $_POST["idno"];
$stud_passw = $_POST["passw"];

// Check whether username or password is set from android	
if(isset($_POST['idno']) && isset($_POST['passw']))
{
$ok='';
$okaymessage = "okay";
  //using placeholder to discourage sql injection
  $sql = 'UPDATE questionstbl SET stud_passw=? WHERE stud_idno = :idno';
  $stmt=$conn->prepare($sql);
  $ok=$stmt->execute(array($stud_idno,$stud_passw));
return $ok;
echo $ok;
echo $okaymessage;
}

?>