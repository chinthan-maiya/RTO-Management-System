<!DOCTYPE html>
<html>
<head>
<title>RTO Karnataka</title>
<!--css-->
<link href="css/bootstrap.css" rel="stylesheet" type="text/css" media="all" />
<link href="css/style.css" rel="stylesheet" type="text/css" media="all" />
<link rel="stylesheet" href="css/ken-burns.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/animate.min.css" type="text/css" media="all" />
<!--css-->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="RTO WEB TEMPLATE" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<!--js-->
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<!--js-->
<!--webfonts-->
<link href='//fonts.googleapis.com/css?family=Cagliostro' rel='stylesheet' type='text/css'>
<link href='//fonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700,700italic,800,800italic' rel='stylesheet' type='text/css'>
<!--webfonts-->
</head>
<body>
	<!--header-->
		<div class="header">
			<div class="container">
				<nav class="navbar navbar-default">
					<div class="container-fluid">
				<!---Brand and toggle get grouped for better mobile display--->
						<div class="navbar-header">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<div class="navbar-brand">
								<h1><a href="index.html">RTO <span>Karnataka</span></a></h1>
							</div>
						</div>

				<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
							<nav class="link-effect-2" id="link-effect-2">
								<ul class="nav navbar-nav">
									<li class="active"><a href="index.html"><span data-hover="Home">Home</span></a></li>
									<li><a href="applyforllr.php"><span data-hover="LLR">LLR</span></a></li>
									<li><a href="applyforreg.php"><span data-hover="Registration">Registration</span></a></li>
									<li><a href="applyfordl.php"><span data-hover="DL">DL</span></a></li>
									<li><a href="complaint.php"><span data-hover="Complaint">Complaint</span></a></li>
									<li><a href="contact.html"><span data-hover="Contact">Contact</span></a></li>
									<li><a href="gallery.html"><span data-hover="Gallery">Gallery</span></a></li>
								</ul>
							</nav>
						</div>
					</div>
				</nav>
			</div>
		</div>
	<!--header-->
	<div class="content">
    <!--banner-bottom-->

    <!--student-->
    <div class="student-w3ls">
      <div class="container">
        <h3 class="tittle">Driving License Registration</h3>
        <div class="student-grids">
          <div class="col-md-3 student-grid">
			<?php
				$conn = mysqli_connect("localhost","root","");
				mysqli_select_db($conn,"rto");
				$results1=0;
					$aad=$_GET["aad"];
				if(isset($_POST["submit2"]))
				{
					$q1=implode(',',$_POST['q1']);
					$sqll="update dl set cov='$q1' where aadhar='$aad'";
					$hj=$conn->query($sqll);

					$sqlm="select vtype from llr where aadhar='$aad'";
					$ris=$conn->query($sqlm);
					$rid=mysqli_fetch_array($ris);
					$str=$rid[0];
					if( strpos($str,$q1)=== false )
					{
							echo "<script>window.alert('Apply only for vehicles for which LLR has been given')</script>";
					}
					else {
						echo "<script>window.location.href='home.html'</script>";
					}

				}

					else{

					$sql = "SELECT fname,lname,address,dob FROM geninfo where aadhar='$aad'";

					$result = $conn->query($sql);
					$sql1="select doi,res,id from llr where aadhar=$aad";
					$result1=$conn->query($sql1);

					if (mysqli_num_rows($result) > 0)
					{

						while($row = mysqli_fetch_assoc($result))
						{
							echo "<p><br><br><br>";
							echo "<p>&emsp; &emsp; &emsp; Aadhar number: " . $aad . "<br>";
							echo "<p>&emsp; &emsp; &emsp; Name: " . $row["fname"] . $row["lname"] . "<br>";
							echo "<p>&emsp; &emsp; &emsp; Address: " . $row["address"] . "<br>";
							echo "<p>&emsp; &emsp; &emsp; Date of birth: " . $row["dob"] . "<br>";
							$dob=$row["dob"];
						}
					}
					else
					{
						echo "0 results";
					}
					if(mysqli_num_rows($result1)>0)
					{
						while($row=mysqli_fetch_assoc($result1))
						{
							$doi=$row["doi"];
							$res=$row["res"];
							$id=$row["id"];
						}
					}
					else
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Apply for LLR first')
							window.location.href='applyforllr.php'
							</SCRIPT>");
					}
					if($res==0)
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('You did not pass the LLR test. Apply for it again.')
							window.location.href='applyforllr.php'
							</SCRIPT>");
					}
					$age = floor((time() - strtotime($doi)) / 2592000);
					if($age<1)
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Not eligible')
							window.location.href='home.html'
							</SCRIPT>");
					}
					else if($age>6)
					{
						echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Your LLR has expired. Apply again.')
							window.location.href='applyforllr.php'
							</SCRIPT>");
					}
					else
					{
						$sql="select edate,eid,dlid,insid from dl order by dlid desc limit 1";
						$result=$conn->query($sql);
						$row=mysqli_fetch_array($result);
						$b=$row[3];
						$x=$row[2]+1;
						$d=$row[0];
						$sub=substr($row[1],1);
						$y=(int)$sub;
						$eid=0;
						$edate=$d;
						if(!strcmp('e10',$row[1]))
						{
							$date=date($d);
							$date_arr=explode('-',$date);
							$date2=Date("Y-m-d",mktime(0,0,0,$date_arr[1],$date_arr[2]+1,$date_arr[0]))."<br>";
							$eid='e01';
							$edate=$date2;
						}
						else
						{
							$y=$y+1;
							$z=0;
							if($y==10)
								$z=1;
							else
								$z=0;
							$l='e' . $z . $y%10;
							$eid=$l;
							$edate=$d;
						}
						//echo $eid.$edate;
						$sql3="insert into dl(edate,eid,aadhar,llrid) values('$edate','$eid','$aad','$id')";
						$jk=$conn->query($sql3);
						if($jk)
							echo "";
						else
							echo "";


						$sql8="select insid,lastduty from inspector order by lastduty limit 1";
						$zx=$conn->query($sql8);
						$ij=mysqli_fetch_array($zx);
						$b2=$ij[0];

						if($eid!='e01')
						{
							$sql5="update dl set insid='$b' where aadhar='$aad'";
							if ($conn->query($sql5) === TRUE)
							{
								echo "";
							}
							else
							{
								echo "Error updating record: " . $conn->error;
							}
						}
						else
						{
								$sql9="update inspector set lastduty=curdate() where insid='$b2'";
								$sj=$conn->query($sql9);
								$sql10="update dl set insid='$b2' where aadhar='$aad'";
								$sjk=$conn->query($sql10);
								if($sj&&$sjk==TRUE)
								{
									echo "great";
								}
						}
					}
			}
?>
</div>
<div class="col-md-3 student-grid">
	<form method="post">
		<br><br>
		<p>&emsp;&emsp;&emsp;Select category of vehicle
		<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="one" value="LMV">LMV</p>
		<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="two" value="HMV">HMV</p>
		<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="three" value="MCWG">MCWG</p>
		<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="four" value="FVG">FVG</p>
		<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="five" value="HPMV">HPMV</p>
		<p>&emsp;&emsp;&emsp;&emsp; &emsp; &emsp;<input name="q1[]" type="checkbox" id="six" value="HGMV">HGMV</p>
		<br>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;<button type="submit"  name="submit2" class="btn btn-primary">Submit</button>
	</b>
	</form>
</div>
<div class="col-md-6 student-grid">
	<img src="images/dl1.jpg" class="img-responsive">
</div>

<div class="clearfix"></div>
</div>
</div>
</div>
<!--student-->
</div>

<!--footer-->
	<div class="footer-w3">
		<div class="container">
			<div class="footer-grids">
				<div class="col-md-8 footer-grid">
					<h4>About Us</h4>
					<p>  Organisation of the Indian government responsible for maintaining a database of drivers and a database of vehicles for Karnataka.<span>
							It issues driving licences, organises collection of vehicle excise duty and sells personalised registrations.
							It also is responsible to inspect vehicle's insurance and clear the pollution test.</span></p>
				</div>
				<div class="col-md-4 footer-grid">
				<h4>Information</h4>
					<ul>
						<li><i class="glyphicon glyphicon-map-marker" aria-hidden="true"></i>Bengaluru</li>
						<li><i class="glyphicon glyphicon-earphone" aria-hidden="true"></i>080 2956789</li>
						<li><i class="glyphicon glyphicon-envelope" aria-hidden="true"></i><a href="mailto:karnataka@rto.com"> karnataka@rto.com</a></li>
						<li><i class="glyphicon glyphicon-time" aria-hidden="true"></i>Mon-Sat 10:00 hr to 17:00 hr</li>
					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
		</div>
	</div>
<!--footer-->
<!---copy--->
	<div class="copy-section">
		<div class="container">
			<div class="social-icons">
				<a href="#"><i class="icon1"></i></a>
				<a href="#"><i class="icon2"></i></a>
				<a href="#"><i class="icon3"></i></a>
				<a href="#"><i class="icon4"></i></a>
			</div>
		</div>
	</div>
	<!---copy--->
