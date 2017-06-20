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

	<div>


	</div>
	<form method="post">
	<input type="radio" name="s" id="1" value="1"/>Pass
	<input type="radio" name="s" id="0" value="-1"/>Fail
	<button type="submit"  name="subm">Next</button>
	</form>
</body>
</html>

<?php
	session_start();
	$username=$_SESSION['username'];

	$conn = mysqli_connect("localhost","root","");
	mysqli_select_db($conn,"rto");
	$sql="select aadhar,llrid,dlid from dl where insid='$username' and result is NULL order by edate,eid limit 1";

	$result=$conn->query($sql);
	if (mysqli_num_rows($result) > 0)
	{
    	$row = mysqli_fetch_assoc($result);
		$aad=$row["aadhar"];
		$llr=$row["llrid"];
		$dl=$row["dlid"];
		echo "LLR ID:".$llr;
		$sql1="select vtype from llr where id='$llr'";
		$result1=$conn->query($sql1);
		$row1=mysqli_fetch_assoc($result1);
		
		$v=explode(',', $row1["vtype"]);
		$len=sizeof($v);
		$l=$len;
	}


	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('No DL aspirant')
							window.location.href='login.php#'
							</SCRIPT>");
	}
	if(isset($_POST['subm']))
	{
		$res=$_POST['s'];
		$sql2="update dl set result='$res' where aadhar='$aad'";
		if ($conn->query($sql2) === TRUE)
		{
			echo "";
		}
		else
		{
			echo "Error updating record: " . $conn->error;
		}
		if($res==1)
		{
		while($l--)
		{
			$diff=$len-$l;
			$sql3="insert into license(dlno,cov,aadhar) values('$dl','$v[$diff]','$aad')";
			if ($conn->query($sql3) === TRUE)
			{
				echo "";
			}
			else
			{
				echo "Error updating record: " . $conn->error;
			}
		}
		}
		header('Location: '.$_SERVER['PHP_SELF']);
		die;
	}

?>
