<?php
session_start();

if(isset($_SESSION['username'])) {
header('location: landing.php'); 
}
?>

<!DOCTYPE html>
<html lang="en" >

<head>
  <meta charset="UTF-8">
  <title>Proyek Todolist-Deby</title>
  
  
  <link rel='stylesheet prefetch' href='https://daneden.github.io/animate.css/animate.min.css'>

  <link rel="stylesheet" href="css/style.css">

</head>

<body>

<div class="login">
	<h1>Sign In</h1>
    <form method="post" action="proses_login.php">
      <!-- <div class="alert alert-danger" role="alert">
        <span class="glyphicon glyphicon-exclamation-sign" aria-hidden="true"></span>
        <span class="sr-only">Error:</span>
        Enter a valid email address
      </div> -->
    	<input name="username" type="text" id="username" placeholder="Enter Username" required/>
        <input name="password" type="password" id="password" placeholder="Enter Password" required/>
        <button type="submit" id="LoginBtn" name="LoginBtn" class="btn btn-block btn-large">Sign In</button>
    </form>
</div>
  <script src='https://code.jquery.com/jquery-2.1.1.min.js'></script>
</body>

</html>
