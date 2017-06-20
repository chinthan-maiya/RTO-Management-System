<html>
<body background=ad.jpg>
  <b>
Update the Database
<form method="post">
<button type="submit" name="update">Update database</button><br><br>
Access Information from Vehicle table<br>
Aadhar Number<input type="text" name="aadh"><br>
<button type="submit" name="veh">Get info</button><br><br>
Access Information from License table<br>
Aadhar Number<input type="text" name="aad"><br><br>
 Get Count of DL holders<br>
 1.Based on COV
 <select name="lcov">
  <option hidden="true"></option>
  <option value="LMV">LMV</option>
  <option value="HMV">HMV</option>
  <option value="MCWG">MCWG</option>
  <option value="FVG">FVG</option>
</select>
<button type="submit" name="dlcov">Get Count</button><br>
2.Based on year of issue
<select name="lyr">
  <option hidden="true"></option>
  <option value="2005">2005</option>
  <option value="2006">2006</option>
  <option value="2007">2007</option>
  <option value="2008">2008</option>
</select>
<button type="submit" name="dlyr">Get Count</button><br><br>

Get Count of registered vehicles <br>
1.Based on COV
 <select name="rcov">
  <option hidden="true"></option>
  <option value="LMV">LMV</option>
  <option value="HMV">HMV</option>
  <option value="MCWG">MCWG</option>
  <option value="FVG">FVG</option>
</select>
<button type="submit" name="regcov">Get Count</button><br>
2. Based on year of registration
<select name="ryr">
  <option hidden="true"></option>
  <option value="2005">2005</option>
  <option value="2006">2006</option>
  <option value="2007">2007</option>
  <option value="2008">2008</option>
</select>
<button type="submit" name="regyr">Get Count</button><br><br>
Get Expiry Details<br>
1.Vehicle registration
<button type="submit" name="vexp">Get Details</button><br>
2.License
<button type="submit" name="lexp">Get Details</button><br><br>
Inspector Database Modification<br>
<button type="submit" name="add">Add Inspector</button><br>
<button type="submit" name="remove">Remove Inspector</button><br><br>
Check Complaints
<button type="submit" name="comp">Complaints</button><br><br>

Today's LLR exam candidates<br>
<button type="submit" name="exam">Get details</button>
</form>
</b>
</body>
</html>






<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"rto");
if(isset($_POST["update"]))
{
	$u1="delete from dl where result IS NOT NULL";
	$r1=$conn->query($u1);
	$u2="delete from llr where TIMESTAMPDIFF(MONTH,doi,curdate())>6";
	$r2=$conn->query($u2);
  $u3="delete from reg where result IS NOT NULL";
  $r3=$conn->query($u3);
	if($r1&&$r2&&$r3==TRUE)
	{
		echo "Update successful";
	}
}
if(isset($_POST["dlcov"]))
{
	$cov=$_POST["lcov"];
	$sql="select count(cov) from license where cov='$cov'";
	$r=$conn->query($sql);
	$row=mysqli_fetch_array($r);
	echo '<input required type="text" name = "result" value = "' .$row[0]. '"/>';
}
if(isset($_POST["dlyr"]))
{
	$yr=$_POST["lyr"];
	$sql="select count(*) from license where year(issuedate)='$yr'";
	$r=$conn->query($sql);
	$row=mysqli_fetch_array($r);
	echo '<input required type="text" name = "result" value = "' .$row[0]. '"/>';
}
if(isset($_POST["regcov"]))
{
	$cov=$_POST["rcov"];
	$sql="select count(cov) from vehicle where cov='$cov'";
	$r=$conn->query($sql);
	$row=mysqli_fetch_array($r);
	echo '<input required type="text" name = "result" value = "' .$row[0]. '"/>';
}
if(isset($_POST["regyr"]))
{
	$yr=$_POST["ryr"];
	$sql="select count(*) from vehicle where year(issuedate)='$yr'";
	$r=$conn->query($sql);
	$row=mysqli_fetch_array($r);
	echo '<input required type="text" name = "result" value = "' .$row[0]. '"/>';
}
if(isset($_POST["add"]))
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>window.location.href='addinsp.php'</SCRIPT>");
}
if(isset($_POST["remove"]))
{
	echo ("<SCRIPT LANGUAGE='JavaScript'>window.location.href='reminsp.php'</SCRIPT>");
}
if(isset($_POST["lexp"]))
{
	$l="select aadhar,fname,lname,exp from license natural join geninfo where TIMESTAMPDIFF(MONTH,exp,curdate())<=1";
	$lr=$conn->query($l);
	if (mysqli_num_rows($lr) > 0)
	{
		while($lrow = mysqli_fetch_array($lr))
		{
			echo "Aadhar no.:";
			echo '<input required type="text" name = "result" value = "' .$lrow[0]. '"/><br>';
			echo "Name:";
			echo '<input required type="text" name = "result" value = "' .$lrow[1]. '"/><br>';
			echo "Expiry date:";
			echo '<input required type="text" name = "result" value = "' .$lrow[3]. '"/><br><br>';
		}
	}
}
if(isset($_POST["comp"]))
{
	$c="select aadhar,cdesc,fname from complaint natural join geninfo where TIMESTAMPDIFF(DAY,cdate,curdate())<=1";
	$cr=$conn->query($c);
	if (mysqli_num_rows($cr) > 0)
	{
		while($crow = mysqli_fetch_array($cr))
		{
			echo "Aadhar no.:";
			echo '<input required type="text" name = "result" value = "' .$crow[0]. '"/><br>';
			echo "Name:";
			echo '<input required type="text" name = "result" value = "' .$crow[2]. '"/><br>';
			echo "Complaint description:";
			echo '<input required type="text" name = "result" value = "' .$crow[1]. '"/><br><br>';
		}
	}
}
if(isset($_POST["exam"]))
{
  echo ("<SCRIPT LANGUAGE='JavaScript'>window.location.href='today.php'</SCRIPT>");
}
if(isset($_POST['veh']))
{
  $aadh=$_POST["aadh"];
  $sqlv="select regno,cov from vehicle where aadhar='$aadh'";
  $resv=$conn->query($sqlv);
  if($resv==TRUE)
  {
    echo "";
  }
  $rowv=mysqli_fetch_array($resv);
  echo "Reg. number: ".$rowv[0]."<br>";
  echo "COV: ".$rowv[1];
}
?>
