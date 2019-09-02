<?php
include('./db/dbconn.php');
connect();
$stud_idno = $_POST["idno"];
$stud_passw = $_POST["passw"];
// $row=getStudent($stud_idno, $stud_passw);
// echo $row;
// header('Content-Type: application/json');
// echo json_encode(array('student'=>$row));
// var_dump($row);
// Check whether username or password is set from android	
if(isset($_POST['idno']) )
// && isset($_POST['passw']))
{
 // Innitialize Variable
 $result='';
    //  $username = $_POST['username'];
    //  $password = $_POST['password'];
 
 // Query database for row exist or not
     $sql = 'SELECT * FROM student_tbl WHERE  stud_idno = :idno 
   --   AND stud_passw = :passw';
     $stmt = $conn->prepare($sql);
     $stmt->bindParam(':idno', $stud_idno, PDO::PARAM_STR);
   //   $stmt->bindParam(':passw', $stud_passw, PDO::PARAM_STR);
     $stmt->execute();
     if($stmt->rowCount())
     {
  $result="true";	
     }  
     elseif(!$stmt->rowCount())
     {
     $result="false";
     }
 
 // send result back to android
    echo $result;
}
?>