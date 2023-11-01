<?php

if (isset($_GET['email'])) {
    $emailToDelete = $_GET['email'];

    $users = json_decode(file_get_contents("users.json"), true);

    // Check if the user with the provided email exists
    if (isset($users[$emailToDelete])) {
        // Remove the user with the specified email
        unset($users[$emailToDelete]);

        // Save the updated user data back to the JSON file
        file_put_contents("users.json", json_encode($users, JSON_PRETTY_PRINT));

        // Redirect to the user list page
        header('Location: dashboard.php');
        exit;
    } else {
        echo "User with email $emailToDelete does not exist.";
    }
} else {
    echo "Email  is missing.";
}
?>
