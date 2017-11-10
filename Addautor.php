<?php
require("functions.php");
$db = dbcon();
if(isset($_POST['btn_submit'])) {

	$nume = $_POST['txt_nume'];
	
	if(!empty($nume)){
		try{
			$stmt = $db->prepare("INSERT INTO autori( Nume) VALUES(:nume);
				
				");
			$stmt->execute(array(':nume'=>$nume));
			header("Location:ListAutor.php");
		}catch(PDOException $ex){
			echo $ex->getMessage();		
		}
	}else{
		echo "INPUT autor NAME";
	}
}

require ("header.php");
?>
<div>
	<ul style="margin-bottom: 2%;">
		<li><p class="activea">A RANDOM LIBRARY</p></li>
		<li><a class="active" href="home.php">Home</a></li>
		<li style="float:right;"><a href="Authentication/logout.php">Logout</a></li>
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
<h2>Add new author</h2>
<form action="" method="post">
	<table cellpadding="5px">
		<tr>
			<td>Autor</td>
			<td><input type="text" name="txt_nume"></td>
		</tr>
			<td></td>
			<td><input type="submit" name="btn_submit"></td>
		</tr>
</form>
</div>

<?php 
require ("footer.php");
?>
