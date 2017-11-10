<?php
	require("functions.php");
$db = dbcon();
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		try{
			$stmt = $db->prepare("DELETE FROM medsinsert WHERE id=?");
			$stmt->execute(array($id));
			header('Location:listcat.php');
		}catch(PDOException $ex){
			echo $ex->getMessage();
		}
		}
	
?>