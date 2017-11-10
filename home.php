<?php
require("functions.php");
$db = dbcon();
require('header.php');
?>
<div>
	<ul style="margin-bottom: 2%;">
	<li><p class="activea" style="background:#4EA248">Farmacie</p></li>
		<li><a class="active" href="home.php">Home</a></li>
		<li style="float:left;"><a href="Authentication/logout.php">Logout</a></li>
	</ul>
</div>
<div style="float:left;width: 17%;">
<button style="font-size:24px;width:100%;color:white;background:#4EA248;margin-bottom: 5%;"><a href="ListCat.php" style="color:white;">Adaugare Medicamente</a><br><i class="fa fa-cog" aria-hidden="true"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#4EA248;margin-bottom: 5%;"><a href="Addcat.php" style="color:white;">Manage Medicamente</a><br><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-cog" aria-hidden="true"></i></button>
<!--<button style="font-size:24px;width:100%;color:white;background:#338eb7;margin-bottom: 5%;"><a href="ListAutor.php" style="color:white;">Manage Authors</a><br><i class="fa fa-user-o" aria-hidden="true"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#338eb7;margin-bottom: 5%;"><a href="Addautor.php" style="color:white;">Add Author </a><br><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-user-o" aria-hidden="true"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#338eb7;margin-bottom: 5%;"><a href="ListAllBooks.php" style="color:white;">Manage Books</a><br><i class="fa fa-file-text-o"></i><i class="fa fa-book"></i></button>
<button style="font-size:24px;width:100%;color:white;background:#338eb7;"><a href="Addbook.php" style="color:white;">Add Book </a><br><i class="fa fa-plus" aria-hidden="true"></i><i class="fa fa-book"></i></button>-->
</div>
<div style="float:right;width: 75%;margin-left: 5%;margin-right: 3%;">
<!--<img src="home.jpg" style="width:100%;">-->
</div>

<?php 
require ("footer.php");
?>