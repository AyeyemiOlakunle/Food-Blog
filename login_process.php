<?php
session_start();
include("connection.php");

if(empty($_POST["email"]) || empty($_POST["password"])) {
    echo "Both fields are required.";
} else {
    $email = $_POST['email'];
    $password = $_POST['password'];

    // Hash the input password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    $sql = "SELECT id, username, password FROM chef WHERE email=?";
    $stmt = $db->prepare($sql);
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if($result->num_rows == 1) {
        $row = $result->fetch_assoc();
        if(password_verify($password, $row['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $row['username'];
            $_SESSION['userId'] = $row['id'];
            header("location: chef.php");
            exit;
        } else {
            echo "Incorrect username or password";
        }
    } else {
        echo "Incorrect username or password";
    }
}
?>
