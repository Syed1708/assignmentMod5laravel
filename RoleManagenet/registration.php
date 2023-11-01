<?php

// session_start();

    $errormessage = "";

    // Read existing users from a file or a database
    $usersFile = 'users.json';

    $users = file_exists($usersFile) ? json_decode(file_get_contents($usersFile), true) : [];


    function save_user($users, $file){
        file_put_contents($file, json_encode($users, JSON_PRETTY_PRINT));
    }

    
    if( isset ($_POST['register'] ) ) {

        //data from form
        $username = $_POST["username"];
        $email = $_POST["email"];
        $password = $_POST["password"];


        //validation
        if(empty($username) || empty($email)|| empty($password) ) {
            $errormessage = "Please fill all feilds";
        }else{
            //if emails exist
            if(isset($users[$email])) {
                $errormessage = "Email already exist";
            }else{

                // ortherwise add data in users.json  file
                // now add user
                $users[$email] = [
                    "username"=> $username,
                    "password"=> $password,
                    "role" => "user",
                ];

                // save user to users.json file
                save_user($users, $usersFile);
                // $_SESSION['email'] = $email;
                
                header("location: login.php");
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
                <h3>Registration</h3>
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

            <div class="mb-3">
              <label for="username" class="form-label">User Name</label>
              <input type="text" name="username" class="form-control" id="username">
              
            </div>
            
            <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" name="email" class="form-control" id="email" aria-describedby="emailHelp">
              <!-- <input type="hidden" name="role" value=""> -->
              
            </div>
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" name="password" class="form-control" id="password">
            </div>

            <button type="submit" class="btn btn-primary" name="register">Register</button>

            </form>
        </div>
 </div>


</div>

 <?php require_once("footer.php"); ?>