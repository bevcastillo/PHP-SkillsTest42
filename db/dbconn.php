<?php
	///// database config
	$hostname = '127.0.0.1';
	$username = 'root';
	$password = 'password';
	$database = 'skillstest42';
	$conn;
	///
	function connect(){
		global $hostname,$username,$password,$database,$conn;
		try{
			$conn=new PDO("mysql:host=$hostname;dbname=$database",$username,$password);
		}catch(PDOException $e){ echo $e->getMessage();}
  }
  

	/// create CRUD
	// function addStudent($idno,$lastname,$firstname,$course,$level){
	// 	global $conn;
	// 	$ok;
	// 	try{
	// 		connect();
	// 		//using placeholder to discourage sql injection
	// 		$sql="INSERT INTO tblstudent(idno,lastname,firstname,course,level) VALUES(?,?,?,?,?)";
	// 		$stmt=$conn->prepare($sql);
	// 		$ok=$stmt->execute(array($idno,$lastname,$firstname,$course,$level));
	// 	}catch(PDOException $e){ echo $e->getMessage();}
	// 	return $ok;
	// }
	///
	function getAllQuestions(){
		global $conn;
		$row;
		try{
			connect();
			$sql="SELECT * FROM questionstbl";
			$stmt=$conn->prepare($sql);
			$stmt->execute();
			$row=$stmt->fetchAll(PDO::FETCH_ASSOC);
		}catch(PDOException $e){ echo $e->getMessage();}
		return $row;
	}
	///
	function getStudent($idno, $passw){
		global $conn;
		$row;
		try{
			connect();
			$sql="SELECT * FROM student_tbl WHERE stud_idno=? and stud_passw=?";
			$stmt=$conn->prepare($sql);
      $stmt->execute(array($idno, $passw));
			// $row=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount()){
				$result = "true";
			} else{
				$result = "false";
			}

			echo $result;
		}catch(PDOException $e){ echo $e->getMessage();}
		// return $row;
	}
	///
	// function deleteStudent($idno){
	// 	global $conn;
	// 	$ok;
	// 	try{
	// 		connect();
	// 		$sql="DELETE FROM tblstudent WHERE idno=?";
	// 		$stmt=$conn->prepare($sql);
	// 		$ok=$stmt->execute(array($idno));			
	// 	}catch(PDOException $e){ echo $e->getMessage();}
	// 	return $ok;
	// }
	///
	// function updateStudent($idno,$lastname,$firstname,$course,$level){
	// 	global $conn;
	// 	$ok;
	// 	try{
	// 		connect();
	// 		//using placeholder to discourage sql injection
	// 		$sql="UPDATE tblstudent SET lastname=?,firstname=?,course=?,level=? WHERE idno=?";
	// 		$stmt=$conn->prepare($sql);
	// 		$ok=$stmt->execute(array($lastname,$firstname,$course,$level,$idno));
	// 	}catch(PDOException $e){ echo $e->getMessage();}
	// 	return $ok;
	// }
	
?>

