<html>
<body background=ad.jpg>
Remove inspector
<form method="post">
Enter inspector ID<input type="text" name="id"><br>
<button type="submit" name="submit">Submit</button><br>
</form>
</body>
</html>
<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"rto");
if(isset($_POST["submit"]))
{
	$id=$_POST["id"];
	$sql="select name from inspector where insid='$id'";
	$res=$conn->query($sql);
	$r=mysqli_fetch_array($res);
	$name=$r[0];
	if ($res==TRUE)
	{

		echo "Inspector with name:";
		echo '<input required type="text" name = "result" value = "' .$name. '"/>';
		$sql1="delete from inspector where insid='$id'";
		$s=$conn->query($sql1);
		if($s==TRUE)
		{
			echo "has been deleted successfully";
		}
	}
	else
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('Such an inspector ID does not exist')
							window.location.href='addinsp.php'
							</SCRIPT>");
	}
}
