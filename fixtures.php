<?php
// Create connection
$optionData1 = '<option id = "0">Team</option>';
$optionData2 = '<option id = "0">Competition</option>';
$connection = mysqli_connect('localhost', 'root', 'wawasan','Football');
// Check connection
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
<title>Fixtures</title>
</head>
<h1> Welcome to the Fixtures Admin page.</h1>

Here you will be able to Add a Fixture Edit and Delete the Fixture.
<br><br>
<?php
echo "<td><a href='Football_Management_Soccer.php'>Home</a></td>";
?>
<br><br>
<body>
<?php
echo '<table border="1" width="70%">';
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
        echo "<td>" . $row['fixture_id'] . "</td>";
        echo "<td>" . $row['fixture_date'] . "</td>";
        echo "<td>" . $row['fixture_time'] . "</td>";
        echo "<td>" . $row['home_team_name'] . "</td>";
        echo "<td>" . $row['away_team_name'] . "</td>";
        echo "<td>" . $row['comp_name'] . "</td>";
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
    
 <form method="post" action="fixtures.php"> 
Date:   <input type="text" name="fixture_date"><br />
Time:   <input type="text" name="fixture_time"><br />
<?php
// selecting the form data
$query = "SELECT * FROM Teams";
$result = mysqli_query($connection, $query);
while ($row = $result->fetch_assoc()) {
  $optionData1 .= "<option value=".$row['team_name'].">".$row['team_name']."</option>";


}
if(!$result){
  die('Failed' .  mysqli_error());
}
?>
Select Home Team <select name="home_team_name" id="home_team_name">
<pre><?php echo $optionData1;?></pre>
</select>
<br><br>
Select Away Team <select name="away_team_name"  id="away_team_name">
<pre><?php echo $optionData1;?></pre>
</select>
<br><br>
<?php
$query = "SELECT * FROM Competition";
$result = mysqli_query($connection, $query);
while ($row = $result->fetch_assoc()) {
$optionData2 .= "<option value=".$row['comp_name'].">".$row['comp_name']."</option>";
}
if(!$result){
    die('Failed' .  mysqli_error());
    exit();
  }
?>
Select Competition <select name="comp_name"  id="comp_name">
<pre><?php echo $optionData2;?></pre>
</select>
<br><br>
<?php
//submitting your form data
if(isset($_POST['submit'])){
$fixture_date = $_POST['fixture_date'];
$fixture_time = $_POST['fixture_time'];
$home_team_name = $_POST['home_team_name'];
$away_team_name = $_POST['away_team_name'];
$comp_name = $_POST['comp_name'];

if($connection){
    echo "";
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Fixtures (fixture_date, fixture_time, home_team_name, away_team_name, comp_name) 
VALUES ('$fixture_date', '$fixture_time', '$home_team_name', '$away_team_name', '$comp_name')";
$result = mysqli_query($connection, $query);
header("location:fixtures.php");
if ($connection) {
}
}
?>
<input type="submit" name="submit" value="Submit"> 
</form>
</form>
</pre>
 </body>
</html>