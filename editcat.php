<?php
require_once('functions.php');
$db = dbcon();

if(isset($_POST['btn_submit'])) {
	$id = $_POST['txt_id'];
	$denumire = $_POST['txt_denumire'];
	$producator = $_POST['txt_producator'];
	$substantaActiva = $_POST['txt_substantaActiva'];
	$formaFarmaceutica = $_POST['txt_formaFarmaceutica'];
	$cantitate = $_POST['txt_cantitate'];
	$pret = $_POST['txt_pret'];
	
	if(!empty($denumire)){
		try{
			$stmt = $db->prepare("UPDATE medsinsert set denumire = :denumire, producator = :producator, substantaActiva = :substantaActiva, formaFarmaceutica = :formaFarmaceutica
			, cantitate = :cantitate, pret = :pret WHERE id = :id");
			$stmt->execute(array(':denumire'=>$denumire, 'producator'=>$producator, ':substantaActiva' =>$substantaActiva , ':formaFarmaceutica'=>$formaFarmaceutica, ':cantitate'=>$cantitate, ':pret'=>$pret, ':id'=>$id));
			if($stmt){
			header("Location:ListCat.php");
		}
		}catch(PDOException $ex){
			echo $ex->getMessage();		
		}
	}else{
		echo "INPUT cat NAME";
	}
}
$id = 0;
$denumire = "";
$producator = "";
$substantaActiva = "";
$formaFarmaceutica = "";
$cantitate = 0;
$pret = 0;

if(isset($_GET['id'])){
	$id = $_GET['id'];
	$stmt = $db->prepare('SELECT *
                          FROM medsinsert
                          WHERE id = :id');
	$stmt->execute(array(':id'=>$id));
	$row = $stmt->fetch();
	$id =$row['id'];
	$denumire = $row['denumire'];
	$producator =$row['producator'];
	$substantaActiva = $row['substantaActiva'];
	$formaFarmaceutica = $row['formaFarmaceutica'];
	$cantitate = $row['cantitate'];
	$pret = $row['pret'];
}

require ("header.php");
?>
<div>
	<ul style="margin-bottom: 2%;">
		<li><p class="activea"  style="background:#4EA248">Farmacie</p></li>
		<li><a class="active" href="home.php">Home</a></li>
		<li style="float:left;"><a href="logout.php">Logout</a></li>
	</ul>
</div>
<div style="float:left;width: 17%;">
<button style="font-size:24px;width:100%;color:white;background:#4EA248;margin-bottom: 5%;"><a href="ListCat.php" style="color:white;">Adaugare Medicamente</a><br><i class="fa fa-cog" aria-hidden="true"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#4EA248;margin-bottom: 5%;"><a href="Addcat.php" style="color:white;">Manage Medicamente</a><br><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-cog" aria-hidden="true"></i></button>
</div>
<div style="float:right;width: 75%;margin-left: 5%;margin-right: 3%;">
<h2>Edit category</h2>
<form action="" method="post">
	<table cellpadding="5px">
		<tr>
			<td>Denumire</td>
			<td><input type="text" name="txt_denumire" value="<?=$denumire;?>"></td>
		</tr>
		
		<tr>
			<td>Producator</td>
			<td><input type="text" name="txt_producator" value="<?=$producator;?>"></td>
		</tr>
		<tr>
			<td>Substanta Activa</td>
			<td><input type="text" name="txt_substantaActiva" value="<?=$substantaActiva;?>"></td>
		</tr>
		<tr>
			<td>Forma Farmaceutica</td>
			<td><input type="text" name="txt_formaFarmaceutica" value="<?=$formaFarmaceutica;?>"></td>
		</tr>
		<tr>
			<td>Cantitate</td>
			<td><input type="text" name="txt_cantitate" value="<?=$cantitate;?>"></td>
		</tr>
		<tr>
			<td>Pret</td>
			<td><input type="text" name="txt_pret" value="<?=$pret;?>"></td>
		</tr>
		<tr>
			<td><input type="hidden" name="txt_id" value="<?=$id;?>"></td>
			<td><input type="submit" name="btn_submit"></td>
		</tr>

</form>
</div>

<?php 
require ("footer.php");
?>
