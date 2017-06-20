<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
<title>Transport template</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="newstyle.css" type="text/css" charset="utf-8" />
<link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>
<body>
<div id="outer">
  <div id="wrapper">
    <div id="body-bot">
      <div id="body-top">
        <div id="logo">
          <h1>RTO</h1>
          <p>We care about your cargo</p>
        </div>
        <div id="nav">
          <ul>
            <li><a href="home.html">MAIN PAGE</a></li>
            <li><a href="applyforllr.php">APPLY FOR LLR</a></li>
            <li><a href="applyfordl.php">APPLY FOR DL</a></li>
            <li><a href="http://all-free-download.com/free-website-templates/">COMPLAINT</a></li>
            <li><a href="applyforreg.php">REGISTRATION</a></li>
            <li><a href="http://all-free-download.com/free-website-templates/">CONTACT US</a></li>
          </ul>
          <div class="clear"> </div>
        </div>
        <div>
				<?php
					$conn = mysqli_connect("localhost","root","");
					mysqli_select_db($conn,"rto"); 
					if(isset($_POST['submit']))
					{
						$q1=$_POST['r1'];
						$com=$_POST['com'];
						$mod=$_POST['mod'];
						$sql="INSERT INTO reg(aadhar,company,model,vtype) VALUES('$aad','$com','$mod','$q1')";
				
						$results2=mysqli_query($conn,$sql);
					if($results2)
					{
						echo "<script>alert('Application received successfully')</script>";
					}
					}
				?>
			
			
			
      </div>
    </div>
  </div>
</div>

</html>

