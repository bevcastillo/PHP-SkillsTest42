<?php
	include('dbconn.php');
	$row=getAllQuestions();
	header('Content-Type: application/json');
	echo json_encode(array('questions'=>$row));
?>