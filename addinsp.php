<html>
<body background=ad.jpg>
Add inspector
<form method="post">
Enter inspector name<input type="text" name="name"><br>
Enter inspector ID<input type="text" name="id"><br>
Enter inspector password<input type="password" name="pwd1"><br>
Reenter inspector password<input type="password" name="pwd2"><br>
<button type="submit" name="submit">Submit</button><br>
</form>
</body>
</html>
<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"rto");
if(isset($_POST["submit"]))
{
	$name=$_POST["name"];
	$id=$_POST["id"];
	$pwd1=$_POST["pwd1"];
	$pwd2=$_POST["pwd2"];
	if($pwd1!=$pwd2)
	{
		echo ("<SCRIPT LANGUAGE='JavaScript'>
							window.alert('The passwords do not match. Enter the details again')
							window.location.href='addinsp.php'
							</SCRIPT>");
	}
	else
	{
		$sql="insert into inspector values ('$id','$pwd1','$name',curdate())";
		if ($conn->query($sql) === TRUE)
		{
			echo "Added successfully";
		}
		else
		{
			echo "Error updating record: " . $conn->error;
		}
	}
}
