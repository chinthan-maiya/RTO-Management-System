<!--
	Author: W3layouts
	Author URL: http://w3layouts.com
	License: Creative Commons Attribution 3.0 Unported
	License URL: http://creativecommons.org/licenses/by/3.0/
-->

<!DOCTYPE html>
<html>
<head>
	<title>Simple Login Form a Flat Responsive Widget Template :: w3layouts</title>
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
    <h1>SIMPLE LOGIN FORM</h1>
    <div class="container w3">
        <h2>Login Now</h2>
		<form action="#" method="post">
			<div class="username">
				<span class="username">User ID:</span>
				<input type="text" name="id" class="name" placeholder="" required="">
				<div class="clear"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="password" class="password" placeholder="" required="">
				<div class="clear"></div>
			</div>
			<button type="submit" name="subm">Submit</button>
			<div class="clear"></div>
		</form>
	</div>
</body>
</html>
<?php
	session_start();
	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"rto");
	if(isset($_POST['subm']))
	{
		$id=$_POST['id'];
		$pwd=$_POST['password'];
		$_SESSION['id']=$id;
		$sql="select pwd from inspector where insid='$id'";
		$res=$conn->query($sql);
		$row=mysqli_fetch_assoc($res);
		$p=$row["pwd"];
		if($p==$pwd)
		{
			echo '<script>window.location.href = "insp2.php";</script>';
		}
		else
		{
			echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Failure')
							window.location.href='home.html'
							</SCRIPT>");
		}
	}
?>
