<?php
$conn = mysqli_connect("localhost","root","");
mysqli_select_db($conn,"rto");
$sql="select aadhar,eid,epwd from llr where edate=curdate()";
$res=$conn->query($sql);
while($row = mysqli_fetch_array($res))
{
  echo "&emsp; &emsp; &emsp; Aadhar: " . $row[0] ;
  echo "&emsp; &emsp; &emsp; Exam ID: " . $row[1] ;
  echo "&emsp; &emsp; &emsp; Password: " . $row[2] . "<br><br>";
}
?>
