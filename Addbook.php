<?php
require("functions.php");
$db = dbcon();

if(isset($_POST['btn_submit'])) {
	$ida = $_POST['txt_ida'];
	$denumire = $_POST['txt_denumire'];
	$id_cat = $_POST['txt_idcat'];
	$pret = $_POST['txt_pret'];
	$editura = $_POST['txt_editura'];
	$an = $_POST['txt_an'];
	$nr_pag = $_POST['txt_nrpag'];

	if(!empty($denumire)){
		try{
			$stmt = $db->prepare("INSERT INTO carti( Denumire, ID_a, ID_cat, Pret, Editura, An, Nr_pagini) VALUES(:denumire, :ida, :idcat, :pret,
				:editura, :an, :nr_pag)");
			$stmt->execute(array(':denumire'=>$denumire,':ida'=>$ida, ':idcat'=>$id_cat, ':pret'=>$pret, ':editura'=>$editura, ':an'=>$an, ':nr_pag'=>$nr_pag));
			header("Location:ListAllBooks.php");
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

<h2>Add new book</h2>
<form action="" method="post">
	<table cellpadding="5px">
		<tr>
			<td>Denumire</td>
			<td><input type="text" name="txt_denumire"></td>
		</tr>
			<tr>
			<td>Autor</td>
			<td>
			<select name="txt_ida">
			<?php
    $smtm = $db->prepare('SELECT DISTINCT Nume, ID_a 	
						FROM autori ');
    $smtm->execute();
    $result = $smtm->fetchAll();
    foreach($result as $row){
  			?> 	 
  <option value="<?=$row['ID_a']?>"><?=$row['Nume']?></option>
  <?php
    }
  ?>
  </select>
  </td>
  </tr>
	<tr>
		<td>Categorie</td>
		<td>
		<select name="txt_idcat">
		<?php
    $smtm = $db->prepare('SELECT DISTINCT Categorie, ID_cat
						FROM categorii ');
    $smtm->execute();
    $result = $smtm->fetchAll();
    foreach($result as $row){
  		?> 	 
  <option value="<?=$row['ID_cat']?>"><?=$row['Categorie']?></option>
  <?php
    }
  ?>
  </select>
			</td>
		</tr>
			<tr>
			<td>Pret</td>
			<td><input type="number" name="txt_pret"></td>
		</tr>
			<tr>
			<td>Editura</td>
			<td><input type="text" name="txt_editura"></td>
		</tr>
			<tr>
			<td>An</td>
			<td><input type="number" name="txt_an"></td>
		</tr>
			<tr>
			<td>nr pagini</td>
			<td><input type="number" name="txt_nrpag"></td>
		</tr>

		
			<td></td>
			<td><input type="submit" name="btn_submit"></td>
		</tr>
</form>
</div>

<?php 
require ("footer.php");
?>
