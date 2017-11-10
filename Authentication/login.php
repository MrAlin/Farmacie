<?php
require("../functions.php");
$db = dbcon();
require ('../header.php');

    if (isset($_POST['submit'])){
        $username = $_POST['username'];
        $password = md5($_POST['password']);

     $query = $db->prepare("SELECT COUNT('id') FROM user WHERE username = '$username' AND password = '$password' ");
        $query->execute();

        $count = $query->fetchColumn();

        if( $count == "1") {
            $_SESSION['username'] = $username;

            header('location: ../home.php');
        } else {
            $error[] = 'Wrong username or password!';
        }
     }
?>

<div class="container">

    <div class="row">

        <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
            <form role="form" method="post" action="" autocomplete="off">
                <h2>Please Login</h2>
                <p><a href='register.php'>Back to register page.</a></p>
                <hr>

                <?php
                if(isset($error)){
                    foreach($error as $error){
                        echo '<p class="bg-danger">'.$error.'</p>';
                    }
                }           
                ?>

                <div class="form-group">
                    <input type="text" name="username" id="username" class="form-control input-lg" placeholder="User Name" value="<?php if(isset($error)){ echo $_POST['username']; } ?>" tabindex="1">
                </div>

                <div class="form-group">
                    <input type="password" name="password" id="password" class="form-control input-lg" placeholder="Password" tabindex="3">
                </div>
                <hr>
                <div class="row">
                    <div class="col-xs-6 col-md-6"><input type="submit" name="submit" value="Login" class="btn btn-primary btn-block btn-lg" tabindex="5"  style="background:#4EA248"></div>
                </div>
            </form>
        </div>
    </div>
</div>

<?php 
require('../footer.php'); 
?>