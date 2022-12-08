<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="style.css">
<ul>
  <li><a href="#home">Home</a></li>
  <li><a href="#news">News</a></li>
  <li><a href="#contact">Contact</a></li>
  <li><a href="#about">About</a></li>
</ul>
</head>
<body>



<div class="wrapper">
    <form class="form-signin" method = "POST">       
      <h2 class="form-signin-heading">sign up</h2>
          <input type="text" class="form-control" name="username" placeholder="Username" required autofocus />
          <input type="password" class="form-control" name="password" placeholder="Password" required />  
          <input type="text" class = "form-control" name="email" placeholder = "Email" required />
          <br>    
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">sign up</button>   
    </form>

    <form class="form-signin" method = "POST">       
      <h2 class="form-signin-heading">login</h2>
          <input type="text" class="form-control" name="username_login" placeholder="Username" required autofocus />
          <input type="password" class="form-control" name="password_login" placeholder="Password" required />  
          <br>    
      <label class="checkbox">
        <input type="checkbox" value="remember-me" id="rememberMe" name="rememberMe"> Remember me
      </label>
      <br>
      <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>   
    </form>
</div>

<?php
include '../db_connection.php';
$conn = OpenCon();

$name_signup = $_POST['username'];
$signup_password = $_POST["password"];
$signup_email = $_POST["email"];

$username_login = $_POST['username_login'];
$password_logn = $_POST['password_login'];

$sql_crea = "INSERT INTO users (username, passwd, email)
VALUES ( '$name_signup', '$signup_password', '$signup_email')";

$sql_selec = "SELECT username, passwd FROM users WHERE username = '$username_login'";
$result = $conn->query($sql_selec);

if ($result->num_rows > 0) {
  // output data of each row
  while($row = $result->fetch_assoc()) {
    echo "id: " . $row["username"]. " - Name: " . $row["passwd"] . "<br>";
  }
} else {
  echo "0 results";
}

if ($conn->query($sql_crea) === TRUE) {
  echo "New record created successfully";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}

echo "Connected Successfully";



CloseCon($conn);
?> 

</body>
</html>
