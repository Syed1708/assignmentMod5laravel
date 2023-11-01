<?php
// Start the session
session_start();

// Check if the user is authenticated (adjust the condition as needed)


if (isset($_SESSION['email'])) {

    // $users = json_decode(file_get_contents("users.json", true));
    // User is authenticated, display user data
    $email = $_SESSION['email'];
    $username = $_SESSION['username'];
    $role = $_SESSION['role'];

?>


<?php require_once("header.php"); ?>


    
<div class="row mt-5">


    <div class="col-md-8 mx-auto card shadow-sm">
    <?php require_once("nav.php"); ?>
        <div class="card shadow-sm mt-5">
            <div class="card-header d-flex justify-content-between">
                <h3>Dashboard</h3>
            </div>
        </div>
        <div class="card-body">
            <h2>Welcome <?php echo $username; ?> !!</h2>
            <p>User Email Address: <?php echo $email; ?></p>
            <p>User Role : <?php echo $role; ?></p>
            <?php if ($role === "admin") : ?>
            <?php require_once("usersList.php") ?>
            <?php endif; ?>
        </div>
    </div>


</div>

 <?php require_once("footer.php"); ?>

 <?php } else{ 
        // User is not authenticated, redirect to the login page
        header('Location: login.php');
        exit;
 }?>


 

