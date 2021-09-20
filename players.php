<?php

// Create connection
$optionData1 = '<option id = "0">Select Team</option>';
$connection = mysqli_connect('localhost', 'root', 'wawasan','Football');
// Check connection
if($connection){
    echo "";
}
    $query = "SELECT * FROM Players WHERE 1";
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die('Failed' .  mysqli_error());
    }
?>
<html>
<head>
<title>Player Information</title>
</head>
<h1> Welcome to the Player Information Admin page.</h1>

Here you will be able to Add a Player and Assign the player to a team 
and select the player position and Edit and Delete the Information.
<br><br>
<?php
echo "<td><a href='Football_Management_Soccer.php'>Home</a></td>";
?>
<br><br>
<body>
<?php
echo '<table border="1" width="70%">';
    echo "<tr>";
        echo "<th>Team</th>";
        echo "<th>Player</th>";
        echo "<th>Shirt Number</th>";
        echo "<th>Position</th>";
        echo "<th>Action</th>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_array($result)) {
        echo "<td>" . $row['team_name'] . "</td>";
        echo "<td>" . $row['fullname'] . "</td>";
        echo "<td>" . $row['shirt_number'] . "</td>";
        echo "<td>" . $row['position_descr'] . "</td>";
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
    
 <form method="post" action="players.php"> 
Name Surname:   <input type="text" name="fullname"><br />
<br><br>
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
Select Team <select name="team_name" id="team_name">
<pre><?php echo $optionData1;?></pre>
</select>
<br><br>

Shirt Number:   <input type="text" name="shirt_number"><br />
<br>
Position:
<br>
<table border =1>
<tr rowspan="2">
<td><input type="radio" name="position_descr" id="position_descr" value="GK" />GK</td>
<td><input type="radio" name="position_descr" id="position_descr" value="CB" />CB</td>
<tr rowspan="2">
<td><input type="radio" name="position_descr" id="position_descr" value="LB" />LB</td>
<td><input type="radio" name="position_descr" id="position_descr" value="FB" />FB</td>
<tr rowspan="2">
<td><input type="radio" name="position_descr" id="position_descr" value="LWB" />LWB</td>
<td><input type="radio" name="position_descr" id="position_descr" value="RWB" />RWB</td>
<tr rowspan="2">
<td><input type="radio" name="position_descr" id="position_descr" value="SW" />SW</td>
<td><input type="radio" name="position_descr" id="position_descr" value="DM" />DM</td>
<tr rowspan="2">
<td><input type="radio" name="position_descr" id="position_descr" value="CM" />CM</td>
<td><input type="radio" name="position_descr" id="position_descr" value="AM" />AM</td>
<tr rowspan="2">
<td><input type="radio" name="position_descr" id="position_descr" value="LW" />LW</td>
<td><input type="radio" name="position_descr" id="position_descr" value="RW" />RW</td>
<tr rowspan="2">
<td><input type="radio" name="position_descr" id="position_descr" value="CF" />CF</td>
<td><input type="radio" name="position_descr" id="position_descr" value="WF" />WF</td>

</tr>
</table>
<?php
//submitting your form data
if(isset($_POST['submit'])){
$team_name = $_POST['team_name'];
$fullname = $_POST['fullname'];
$shirt_number = $_POST['shirt_number'];
$position_descr = $_POST['position_descr'];
if($connection){
    echo "";
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Players (team_name, fullname, shirt_number, position_descr) 
VALUES ('$team_name', '$fullname', '$shirt_number', '$position_descr')";
$result = mysqli_query($connection, $query);
header("location:players.php");
if (!$result) {
    echo "Success " . $query;
}
}
?>
<input type="submit" name="submit" value="Submit"> 
</form>

</pre>
 </body>
</html>