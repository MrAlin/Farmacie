<?php
require("functions.php");
$db = dbcon();
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		try{
			$stmt = $db->prepare("DELETE FROM autori WHERE ID_a=?");
			$stmt->execute(array($id));
			header('Location:ListAutor.php');
		}catch(PDOException $ex){
			echo $ex->getMessage();
		}
		}
	
?>