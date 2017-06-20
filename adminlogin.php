<?php  //Start the Session
session_start();
 require('connect.php');
//3. If the form is submitted or not.
//3.1 If the form is submitted
if (isset($_POST['username']) and isset($_POST['password'])){
//3.1.1 Assigning posted values to variables.
$username = $_POST['username'];
$password = $_POST['password'];
//3.1.2 Checking the values are existing in the database or not
$query = "SELECT * FROM admin WHERE username='$username' and pswd='$password'";

$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
if ($count == 1){
$_SESSION['username'] = $username;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}
//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
$username = $_SESSION['username'];
echo "Hi " . $username . "
";
echo "<br>Click on continue";
echo "<br><a href='admin.php'>Continue</a>";
echo "<br><a href='adminlogout.php'>Logout</a>";

}else{
//3.2 When the user visits the page first time, simple login form will be displayed.
?>
<html>
<head>
	<title>Admin Login</title>


  	<link rel="stylesheet" href="css1/style.css">

  	<link href='//fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>

  	<!-- For-Mobile-Apps-and-Meta-Tags -->
  		<meta name="viewport" content="width=device-width, initial-scale=1" />
  		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  		<meta name="keywords" content="Simple Login Form Widget Responsive, Login Form Web Template, Flat Pricing Tables, Flat Drop-Downs, Sign-Up Web Templates, Flat Web Templates, Login Sign-up Responsive Web Template, Smartphone Compatible Web Template, Free Web Designs for Nokia, Samsung, LG, Sony Ericsson, Motorola Web Design" />
  		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
  	<!-- //For-Mobile-Apps-and-Meta-Tags -->

  </head>
<body>

<h1>ADMIN LOGIN</h1>
<div class="container w3">
    <h2>Login Now</h2>
<form action="#" method="post">
  <?php if(isset($fmsg)){ ?><div class="alert alert-danger" role="alert"> <?php echo $fmsg; ?> </div><?php } ?>
  <div class="username">
    <span class="username">Username:</span>
    <input type="text" name="username" class="name" placeholder="Username" required>
    <div class="clear"></div>
  </div>
  <div class="password-agileits">
    <span class="username">Password:</span>
    <input type="password" name="password" id="inputPassword" class="password" placeholder="Password" required>
    <div class="clear"></div>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit" name="subm">Login</button>
  <div class="clear"></div>
</form>
</div>
</body>
</html>
<?php } ?>
