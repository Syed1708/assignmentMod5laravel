<?php
session_start();
// $users = json_decode(file_get_contents("users.json"), true);

// echo $_SESSION['email'];

// if( !$users[$_SESSION["email"]] ){
//     echo "Email Not found";
// }

if(isset($_POST['login'])){

    $errormessage = '';
    // data fron user
    $fr_email = $_POST["email"];
    $fr_password = $_POST["password"];
    $users = json_decode(file_get_contents("users.json", true));
    // print_r($users);
    // die();

    foreach ($users as $email => $user) {
        // print_r($user);
        // die();
        if ($email === $fr_email && $user->password === $fr_password) {
            // Login successful, store user information in a session
            
        // Set user data in the session
        $_SESSION['email'] = $fr_email;
        $_SESSION['username'] = $user->username;
        $_SESSION['role'] = $user->role;
        // then redirect to dashboard
        header("Location: dashboard.php");
            exit;
        }else{
          $errormessage = "Your username or password incorrect!!";
        }
    }
   


}


?>

<?php require_once("header.php"); ?>


    
<div class="row mt-5">

    <div class="col-md-8 mx-auto card shadow-sm">
    <?php require_once("nav.php"); ?>
        <div class="card shadow-sm mt-5">
            
            <div class="card-header d-flex justify-content-between">
                <h3>Login Page</h3>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" class="form">
            <h3>
            <?php 
            if( isset($errormessage)){
                    echo $errormessage;
                } 
            ?> 
            </h3>

            <input class="form-control mt-2" required type="email" name="email" placeholder="Type Your Email">
            <input class="form-control mt-2" type="password" name="password" placeholder="Type Your Password">
            <input class="btn btn-primary mt-2" type="submit" name="login" value="Login">

            </form>
        </div>
    </div>


</div>

 <?php require_once("footer.php"); ?>