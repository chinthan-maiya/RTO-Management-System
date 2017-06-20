<html>
<head>
	<?php
// Upon starting the section
session_start();
$_SESSION['TIMER'] = time() + 10; // Give the user Ten minutes
?>
<script type="text/javascript">
var TimeLimit = new Date('<?php echo date('r', $_SESSION['TIMER']) ?>');
</script>
<script type="text/javascript">
function countdownto()
{
	var date = Math.round((TimeLimit-new Date())/1000);
	var hours = Math.floor(date/3600);
	date = date - (hours*3600);
	var mins = Math.floor(date/60);
	date = date - (mins*60);
	var secs = date;
	if (hours<10) hours = '0'+hours;
	if (mins<10) mins = '0'+mins;
	if (secs<10) secs = '0'+secs;
	document.getElementById('txt').innerHTML = hours+':'+mins+':'+secs;
	setTimeout("countdownto()",1000);

}
countdownto();
</script>
</head>

<body onload="countdownto()">
<div id="txt"></div>
<form method="post" name="f" id="f">
Q1.Identify the symbol<br>
<img src="nb.png" height="150" width="150"><br>
<input type="radio" name="q1" value="a" />a. Narrow bridge<br />
<input type="radio" name="q1" value="b" />b. Narrow road<br />
<input type="radio" name="q1" value="c" />c. Hump ahead<br>
<input type="radio" name="q1" value="0" checked="checked" />
<br>

Q2. Identify the symbol<br>
<img src="nut.jpg" height="150" width="150"><br>
<input type="radio" name="q2" value="a" />a. No parking<br />
<input type="radio" name="q2" value="b" />b. No U-Turn<br />
<input type="radio" name="q2" value="c" />c. No left turn<br>
<input type="radio" name="q2" value="0" checked="checked" /><br>

<br>
Q3. Identify the symbol<br>
<img src="nr.jpg" height="150" width="150"><br>
<input type="radio" name="q3" value="a" />a. Narrow bridge<br />
<input type="radio" name="q3" value="b" />b. Narrow road<br />
<input type="radio" name="q3" value="c" />c. Hump ahead<br>
<input type="radio" name="q3" value="0" checked="checked" /><br>
<br>

Q4. Near a pedestrian crossing, when the  pedestrians are waiting to cross the road,  you should?<br>
<input type="radio" name="q4" value="a" />a. Sound horn and proceed<br />
<input type="radio" name="q4" value="b" />b. Slow down, sound horn and pass<br />
<input type="radio" name="q4" value="c" />c. Stop the vehicle and wait till the pedestrians cross the road and then proceed<br>
<input type="radio" name="q4" value="0" checked="checked" /><br>
<br>

Q5. You can overtake a vehicle in front<br>
<input type="radio" name="q5" value="a" />a. Through the right side of that vehicle<br />
<input type="radio" name="q5" value="b" />b. Through the left side<br />
<input type="radio" name="q5" value="c" />c. Through the left side, if the road is wide<br>
<input type="radio" name="q5" value="0" checked="checked" /><br>
<br>

Q6. Validity of learners licence<br>
<input type="radio" name="q6" value="a" />a. Till the driving licence is obtained<br />
<input type="radio" name="q6" value="b" />b. 6 months<br />
<input type="radio" name="q6" value="c" />c. 30 days<br>
<input type="radio" name="q6" value="0" checked="checked" /><br>
<br>

Q7. In a road without footpath, the pedestrians<br>
<input type="radio" name="q7" value="a" />a. Should walk on the left side of the road<br />
<input type="radio" name="q7" value="b" />b. Should walk on the right side of the road<br />
<input type="radio" name="q7" value="c" />c. Can walk on any side of the road<br>
<input type="radio" name="q7" value="0" checked="checked" /><br>
<br>


<br>
<input type="submit" value="Submit" id="button1" name="submit" id="submit"/>
</form>
</body>
</html>
<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"rto");
if(isset($_POST['submit']))
{
	$score=0;
	if ($_POST['q1'] == 'a')
	{
		$score++;
	}
	if ($_POST['q2'] == 'b')
	{
		$score++;
	}
	if ($_POST['q3'] == 'b')
	{
		$score++;
	}
	if($_POST['q4']=='c')
	{
		$score++;
	}
	if($_POST['q5']=='a')
	{
		$score++;
	}
	if($_POST['q6']=='b')
	{
		$score++;
	}
	if($_POST['q7']=='b')
	{
		$score++;
	}
	echo "<script>window.alert(";echo $score; echo ")</script>";
	if($score>=4)
		$res=1;
	else
		$res=0;
	$aad=$_GET['id'];
	echo $aad;
	$sql1="update llr set res='$res' where aadhar='$aad'";
	$xyz=$conn->query($sql1);
	if($xyz==TRUE)
	{
		echo "ok";
	}
	if($res==1)
	{
		$sql2="update llr set doi=edate where aadhar='$aad'";
		$xy=$conn->query($sql2);
		if($xy==TRUE)
		{
			echo "ok";
		}
	}
	echo "<script>location.href('llrtest.php')</script>";
}
?>
