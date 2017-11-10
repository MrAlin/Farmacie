<?php
require("functions.php");
$db = dbcon();
	if(isset($_GET['id'])){
		$id = $_GET['id'];
		try{
			$stmt = $db->prepare("DELETE FROM carti WHERE ID_c=?");
			$stmt->execute(array($id));
			header('Location:ListAllBooks.php');
		}catch(PDOException $ex){
			echo $ex->getMessage();
		}
		}
	
?>