<?php
require("functions.php");
$db = dbcon();
if(isset($_POST['btn_submit'])) {
	$id = $_POST['txt_id'];
	$nume = $_POST['txt_nume'];
	
	if(!empty($nume)){
		try{
			$stmt = $db->prepare("UPDATE autori set Nume = :nume WHERE ID_a = :id");
			$stmt->execute(array(':nume'=>$nume, ':id'=>$id));
			if($stmt){
			header("Location:ListAutor.php");
		}
		}catch(PDOException $ex){
			echo $ex->getMessage();		
		}
	}else{
		echo "INPUT cat NAME";
	}
}
$ID_a = 0;
$nume = "";
if(isset($_GET['id'])){
	$id = $_GET['id'];
	$stmt = $db->prepare('SELECT *
                          FROM autori
                          WHERE ID_a = :id');
	$stmt->execute(array(':id'=>$id));
	$row = $stmt->fetch();
	$ID_a = $row['ID_a'];
	$nume = $row['Nume'];
}

require ("header.php");
?>
<div>
	<ul style="margin-bottom: 2%;">
		<li><p class="activea">A RANDOM LIBRARY</p></li>
		<li><a class="active" href="home.php">Home</a></li>
		<li style="float:right;"><a href="logout.php">Logout</a></li>
	</ul>
</div>
<div style="float:left;width: 17%;">
<button style="font-size:24px;width:100%;color:white;background:#338eb7;margin-bottom: 5%;"><a href="ListCat.php" style="color:white;">Manage Category</a><br><i class="fa fa-cog" aria-hidden="true"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#338eb7;margin-bottom: 5%;"><a href="Addcat.php" style="color:white;">Add Category</a><br><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-cog" aria-hidden="true"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#338eb7;margin-bottom: 5%;"><a href="ListAutor.php" style="color:white;">Manage Authors</a><br><i class="fa fa-user-o" aria-hidden="true"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#338eb7;margin-bottom: 5%;"><a href="Addautor.php" style="color:white;">Add Author </a><br><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-user-o" aria-hidden="true"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#338eb7;margin-bottom: 5%;"><a href="ListAllBooks.php" style="color:white;">Manage Books</a><br><i class="fa fa-file-text-o"></i><i class="fa fa-book"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#338eb7;"><a href="Addbook.php" style="color:white;">Add Book </a><br><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-book"></i></button>
</div>
<div style="float:right;width: 75%;margin-left: 5%;margin-right: 3%;">
<h2>Edit author</h2>
<form action="" method="post">
	<table cellpadding="5px">
		<tr>
			<td>Autor</td>
			<td><input type="text" name="txt_nume" value="<?=$nume;?>"></td>
		</tr>
			<td><input type="hidden" name="txt_id" value="<?=$ID_a;?>"></td>
			<td><input type="submit" name="btn_submit"></td>
		</tr>
</form>
</div>

<?php 
require ("footer.php");
?>
