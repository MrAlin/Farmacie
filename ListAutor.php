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
<table border="1px" cellpadding="5px" cellspacing="0">
  <tr>
    <th>ID_a</th>
    <th>Autori</th>
    <th>Action</th>
  </tr>
  <?php
    $smtm = $db->prepare('SELECT ID_a, Nume
                          FROM autori ');
    $smtm->execute();
    $result = $smtm->fetchAll();
    foreach($result as $row){
  ?>

  <tr>
    <td><?=$row['ID_a'];?></td>
    <td><?=$row['Nume'];?></td>
    <td>
      <a href="editautor.php?id=<?=$row['ID_a'];?>">Edit</a>
      <a href="delautor.php?id=<?=$row['ID_a'];?>">Delete</a>
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