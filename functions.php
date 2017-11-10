<?php
function dbcon(){

	// ob_start();
	// session_start();

// define('DBHOST','localhost');
// define('DBUSER','root');
// define('DBPASS','');
// define('DBNAME','librarie');

// try {

// 	$db = new PDO("mysql:host=".DBHOST.";dbname=".DBNAME, DBUSER, DBPASS);
// 	$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

// } catch(PDOException $e) {
// 	//show error
//     echo '<p class="bg-danger">'.$e->getMessage().'</p>';
//     exit;
// }

 	$db = new PDO('mysql:host=localhost;dbname=pharmacydb', 'root', '');
    $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    return $db;
}

function editbook($id, $denumire, $ida, $id_cat, $pret, $editura, $an, $nr_pag){
	if(!empty($denumire)){
		try{
			global $db;
			$stmt = $db->prepare("UPDATE carti set Denumire = :denumire, ID_a = :ida, ID_cat = :idcat, Pret = :pret, Editura = :editura, An = :an, Nr_pagini = :nr_pag WHERE ID_c = :id");
			$stmt->execute(array(':denumire'=>$denumire,':ida'=>$ida, ':idcat'=>$id_cat, ':pret'=>$pret, ':editura'=>$editura, ':an'=>$an, ':nr_pag'=>$nr_pag, ':id'=>$id));
		}catch(PDOException $ex){
			echo $ex->getMessage();		
		}
	}else{
		echo "INPUT autor NAME";
	}
}


// public function login($username,$password){

// 	$row = $this->get_user_hash($username);

// 	if($this->password_verify($password,$row['password']) == 1){

// 		$_SESSION['loggedin'] = true;
// 		$_SESSION['username'] = $row['username'];
// 		$_SESSION['id'] = $row['id'];
// 		return true;
// 	}
// }

// function is_logged_in(){
// 		if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true){
// 			return true;
// 		}
// 	}


// function logout(){
// 	session_destroy();
// }

// public static function flash() {

// 	public static function flash($username, $string = '') {
// 		if(self::exists($name)) {
// 			$session = self::get($name);
// 			self::delete($name);
// 			return $session;
// 		} else {
// 			self::put($name, $string);
// 		}
// 	}
// }
?>