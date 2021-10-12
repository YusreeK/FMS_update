<?php
$connection = mysqli_connect('localhost', 'root', 'wawasan','Football');
if($connection){
    echo"<br />";
    echo "";
    echo"<br />";
} else {
 die("Unable to Capture Data");
}
$query = "SELECT * FROM Player_positions WHERE 1";
$result = mysqli_query($connection, $query);
if(!$result){
  die('Failed' .  mysqli_error());
}


?>





<html>
<head>

<title>Player Position</title>
<h1>Welcome to the Player Position Page.</h1>
<br><br>
<p>Here you will be allowed to Enter a player Position Delete and or Edit the Player Position.</p>
<br><br>
<?php
echo "<td><a href='Football_Management_Soccer.php'>Home</a></td>";
?>
<br><br>
</head>
<body>


<?php
echo '<table border="1" width="50%">';
    echo "<tr>";
        echo "<th>Position</th>";
        echo "<th>Action</th>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
        echo "<td>" . $row['position_descr'] . "</td>";
        echo ' <td><a href="href.php?method=edit&id={theID}">Edit</a>  <a href="href.php?method=edit&id={theID}">Delete</a></td>';
        echo "</td>";
    echo "</tr>";
}
echo "</tbody>";                            
echo "</table>";
?>

<?php
if(isset($_POST['submit'])){
$position_descr = $_POST['position_descr'];
if($connection){
    echo "";
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Player_positions (position_descr) VALUE ('$position_descr')";
$result = mysqli_query($connection, $query);
header("location: player_position.php");
exit;
if(!$result){
   die('Failed' .  mysqli_error());
}
}
?>

<br><br>

<form method="post" action="player_position.php"> 
Add Position: <input type="text" name="position_descr">
  <br><br>
<input type="submit" name="submit" value="Submit"> 
</form>

</body>
</html>
