<?php
session_start();
include("database.php");

if (isset($_POST["username"]) && isset($_POST["password"]) && isset($_POST["log_in"])) {
    $username = $_POST["username"];
    $password = $_POST["password"];

    $sql = "SELECT * FROM users WHERE username='$username'";
    $result = mysqli_query($conn, $sql);

    if ($result && mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);

        // compares the password to the hashed password saved in the database
        if (password_verify($password, $row['password'])) {
            $_SESSION['username'] = $username;
            header("Location: homepage.php"); //go to home page
            exit;
        } else {
            echo "<script>alert('Invalid username or password');</script>";
        }
    } else {
        echo "<script>alert('No user found');</script>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Login - YhemiRoses Fabrics</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="auth-page">
      <div class="auth-container">
        <h2>Login</h2>
        <form id="login-form" action="login.php" method="post">
          <input
            type="text"
            id="login-username"
            placeholder="Username"
            required
            name="username"
          />
          <input
            type="password"
            id="login-password"
            placeholder="Password"
            required
            name="password"
          />
          <button type="submit" name="log_in">Login</button>
        </form>
        <p>Don't have an account? <a href="index.php">Sign Up</a></p>
      </div>
    </div>
  </body>
</html>
