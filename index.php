<?php
include "database.php";

if (!empty($_POST["username"]) && !empty($_POST["password"])) {
    $username = mysqli_real_escape_string($conn, $_POST["username"]);
    $password = $_POST["password"];
    $hash = password_hash($password, PASSWORD_BCRYPT);


    $checkUser = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $checkUser);

    if (mysqli_num_rows($result) > 0) {
        echo "<script>alert('Username already exists'); window.location.href='signup.php';</script>";
    } else {
        $sql = "INSERT INTO users (`username`, `password`) VALUES ('$username', '$hash')";
        if (mysqli_query($conn, $sql)) {
            echo "<script>alert('Signup successful! Please log in.'); window.location.href='login.php';</script>";
        } else {
            echo "Error: " . mysqli_error($conn);
        }
    }
}
?>
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Sign Up - YhemiRoses Fabrics</title>
    <link rel="stylesheet" href="style.css" />
  </head>
  <body>
    <div class="auth-page">
      <div class="auth-container">
        <h2>Sign Up</h2>
        <form id="signup-form" action="signup.php" method="post">
          <input
            type="text"
            id="signup-username"
            placeholder="Enter username"
            name="username"
            required
          />
          <input
            type="password"
            id="signup-password"
            placeholder="Enter password"
            name="password"
            required
          />
          <button type="submit" name="signup">Sign Up</button>
        </form>
        <p>Already have an account? <a href="login.php">Login</a></p>
      </div>
    </div>
  </body>
</html>
