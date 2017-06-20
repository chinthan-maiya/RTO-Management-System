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
    <h1>LLR TEST</h1>
    <div class="container w3">
        <h2>Login Now</h2>
		<form action="#" method="post">
			<div class="username">
				<span class="username">Exam ID:</span>
				<input type="text" name="id" class="name" placeholder="" required="">
				<div class="clear"></div>
			</div>
			<div class="password-agileits">
				<span class="username">Password:</span>
				<input type="password" name="pwd" class="password" placeholder="" required="">
				<div class="clear"></div>
			</div>
			<button type="submit" name="subm">Submit</button>
			<div class="clear"></div>
		</form>
		<div align="left">
			<font color="white">
			<b>Instructions:-</b><br>
			-> The duration of the test is 15 minutes<br>
			-> The test consists of 15 questions<br>
			-> Each question is of multiple choice type with one correct option out of the three<br>
			-> Each question carries one point<br>
			-> The total score is shoown at the end of the submit<br>
			-> The test can be submitted on clicking the Submit button<br>
			-> Good Luck!
		</font>
	</div>
</body>
</html>
<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"rto");
if(isset($_POST['subm']))
{
	$id=$_POST['id'];
	$pwd=$_POST['pwd'];
	$sql="select edate,epwd,aadhar from llr where eid='$id'";
	$result=$conn->query($sql);
	$row=mysqli_fetch_assoc($result);
	$q=$row["aadhar"];
	if($pwd==$row["epwd"])
	{
		echo "done";
		header("location:test.php?id=$q");
	}
	else
	{
		echo "<script>window.alert('Invalid login credentials. Enter the correct exam ID and password assigned to you')</script>";
	}
}
?>
