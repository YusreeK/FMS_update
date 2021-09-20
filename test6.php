<?php 
session_start();
$optionData1 = '<option id = "0">Team</option>';
$optionData2 = '<option id = "0">Competition</option>';
$connection = mysqli_connect('localhost', 'root', 'wawasan','Soccer');

if($connection){
    echo "";
}
    $query = "SELECT * FROM Fixtures WHERE 1";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Failed' .  mysqli_error());
    }


?>

<html>
<head>

<title>Read</title>

</head>
<body>


<?php
echo '<table border="1" width="50%">';
    echo "<tr>";
        echo "<th>Fixture</th>";
        echo "<th>Date</th>";
        echo "<th>Time</th>";
        echo "<th>Home Team</th>";
        echo "<th>Away Team</th>";
        echo "<th>Competition</th>";
        echo "<th>Action</th>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_array($result)) {
        echo "<td>" . $row['fixtureid'] . "</td>";
        echo "<td>" . $row['fixturedate'] . "</td>";
        echo "<td>" . $row['fixturetime'] . "</td>";
        echo "<td>" . $row['hometeamid'] . "</td>";
        echo "<td>" . $row['awayteamid'] . "</td>";
        echo "<td>" . $row['CompID'] . "</td>";
        echo ' <td><a href="href.php?method=edit&id={theID}">Edit</a>  <a href="href.php?method=edit&id={theID}">Delete</a></td>';
        echo "</td>";
    echo "</tr>";
}
echo "</tbody>";                            
echo "</table>";
?>



<br><br>

<p>
Add Fixture:
</p>
<pre>
<form method="post" action="test6.php"> 
Date:   <input type="text" name="fixturedate"><br />
Time:   <input type="text" name="fixturetime"><br />


<?php
$query = "SELECT * FROM Teams";
$result = mysqli_query($connection, $query);
while ($row = $result->fetch_assoc()) {
  $optionData1 .= "<option value=".$row['teamid'].">".$row['teamid']."</option>";


}
if(!$result){
  die('Failed' .  mysqli_error());
}
?>
Select Home Team <select name="hometeam" id="hometeam">
<pre><?php echo $optionData1;?></pre>
</select>
<br><br>
Select Away Team <select name="awayteam"  id="awayteam">
<pre><?php echo $optionData1;?></pre>
</select>
<br><br>
<?php
$query = "SELECT * FROM Competition";
$result = mysqli_query($connection, $query);
while ($row = $result->fetch_assoc()) {
$optionData2 .= "<option value=".$row['CompID'].">".$row['CompID']."</option>";
}
if(!$result){
    die('Failed' .  mysqli_error());
    exit();
  }
?>
Select Competition <select name="CompID"  id="CompID">
<pre><?php echo $optionData2;?></pre>
</select>
<br><br>


<?php
if(isset($_POST['submit'])){
$fixturedate = $_POST['fixturedate'];
$fixturetime = $_POST['fixturetime'];
$hometeam = $_POST['hometeam'];
$awayteam = $_POST['awayteam'];
$CompID = $_POST['CompID'];

if($connection){
    echo "data sent";
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Fixtures (fixturedate, fixturetime, hometeamid, awayteamid, CompID) 
VALUES ('$fixturedate', '$fixturetime', '$hometeam', '$awayteam', '$CompID')";

$result = mysqli_query($connection, $query);
header("location: test6.php");
exit;
if(!$result){
   die('Failed' .  mysqli_error());
}
   
}

?>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>"> 
<input type="submit" name="submit" value="Submit"> 


</form>
</form>
</pre>

 </body>

</html>