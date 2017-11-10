<?php
require("functions.php");
$db = dbcon();
	require ("header.php");	

	if (isset($_SESSION['message'])) {
		echo "<div id='error_msg'>".$_SESSION['message']."</div>";
		unset($_SESSION['message']);
	}
?>

<div>
	<ul style="margin-bottom: 2%;">
		<li><p class="activea"  style="background:#4EA248">Farmacie</p></li>
		<li><a class="active" href="home.php">Home</a></li>
		<li style="float:left;"><a href="Authentication/logout.php">Logout</a></li>
	</ul>
</div>
<div style="float:left;width: 17%;">
<button style="font-size:24px;width:100%;color:white;background:#4EA248;margin-bottom: 5%;"><a href="ListCat.php" style="color:white;">Adaugare Medicamente</a><br><i class="fa fa-cog" aria-hidden="true"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#4EA248;margin-bottom: 5%;"><a href="Addcat.php" style="color:white;">Manage Medicamente</a><br><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-cog" aria-hidden="true"></i></button>
</div>
<div style="float:right;width: 75%;margin-left: 5%;margin-right: 3%;">
<table border="1px" cellpadding="5px" cellspacing="0">
  <tr>
    <th>ID</th>
    <th>Denumire</th>
    <th>Producator</th>
    <th>Substanta Activa</th>
    <th>Forma Farmaceutica</th>
    <th>Cantitate</th>
    <th>Pret</th>
  </tr>
  <?php
    $smtm = $db->prepare('SELECT * FROM `medsinsert` ');
    $smtm->execute();
    $result = $smtm->fetchAll();
    foreach($result as $row){
  ?>

  <tr>
    <td><?=$row['id'];?></td>
    <td><?=$row['denumire'];?></td>
    <td><?=$row['producator'];?></td>
    <td><?=$row['substantaActiva'];?></td>
    <td><?=$row['formaFarmaceutica'];?></td>
    <td><?=$row['cantitate'];?></td>
    <td><?=$row['pret'];?></td>
    <td>
      <a href="editcat.php?id=<?=$row['id'];?>">Edit</a>
      <a href="delcat.php?id=<?=$row['id'];?>">Delete</a>
    </td>
  </tr>

  <?php
    }
  ?>
</table>
</div>

<?php
require ("footer.php");
?>