<?php
session_start();

if (!isset($_SESSION['email']) || $_SESSION['role'] != "admin") {
    header('Location: login.php');
    exit;
}
// echo $_SESSION['role'];

$users = json_decode(file_get_contents("users.json"));

// $editEmail = $_GET['email'];

// echo $editEmail;
//     die();

if (isset($_GET['email'])) {
    $editEmail = $_GET['email'];
    

    if (isset($users->$editEmail)) {
        $user = $users->$editEmail;
        // var_dump($user);

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            
            $user->username = $_POST['username'];
            $user->password = $_POST['password'];
            $user->role = $_POST['role'];

            // $newEmail = $_POST['email'];


            // Update the JSON data
            // update user data in the session
            // $_SESSION['email'] = $editEmail;
            if ($editEmail == $_SESSION['email']) {
                $users = json_encode($users, JSON_PRETTY_PRINT);
                file_put_contents("users.json", $users);
                session_destroy();
                header('Location: login.php');
                exit;               
            }
            // $_SESSION['username'] = $_POST['username'];
            // $_SESSION['role'] = $_POST['role'];
            $users = json_encode($users, JSON_PRETTY_PRINT);
            file_put_contents("users.json", $users);

            header('Location: dashboard.php');
            exit;
           

        }
    } else {
        
        echo "User not found.";
        exit;
    }
} else {
   
    echo "Email not specified.";
    exit;
}
?>

<?php require_once("header.php"); ?>


    
<div class="row mt-5">

<div class="col-md-8 mx-auto card shadow-sm">
<?php require_once("nav.php"); ?>
        <div class="card shadow-sm mt-5">
        
            <div class="card-header d-flex justify-content-between">
                <h3>Edit User</h3>
            </div>
        </div>
        <div class="card-body">
            <form method="POST" class="form">

            <div class="mb-3">
              <label for="username" class="form-label">User Name</label>
              <input type="text" value="<?php echo $user->username; ?>" required name="username" class="form-control" id="username">
              
            </div>
            
            <!-- <div class="mb-3">
              <label for="email" class="form-label">Email address</label>
              <input type="email" value="<?php echo $editEmail; ?>" required name="email" class="form-control" id="email" aria-describedby="emailHelp">
              
            </div> -->
            <div class="mb-3">
              <label for="password" class="form-label">Password</label>
              <input type="password" value="<?php echo $user->password; ?>" required name="password" class="form-control" id="password">
            </div>

            <label for="role">Role:</label>
        <select name="role">
            <option value="admin" <?php echo ($user->role === "admin" ? "selected" : ""); ?>>Admin</option>
            <option value="user" <?php echo ($user->role === "user" ? "selected" : ""); ?>>User</option>
        </select>
            <button type="submit" class="btn btn-primary" name="update">Update</button>

            </form>
        </div>
 </div>


</div>

 <?php require_once("footer.php"); ?>