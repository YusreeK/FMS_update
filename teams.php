<?php
$connection = mysqli_connect('localhost', 'root', 'wawasan','Football');
if($connection){
    echo"<br />";
    echo "";
    echo"<br />";
} else {
 die("Unable to Capture Data");
}
$query = "SELECT * FROM Teams WHERE 1";
$result = mysqli_query($connection, $query);
if(!$result){
  die('Failed' .  mysqli_error());
}
?>

<html>
<head>
<title>Teams</title>
<h1>Welcome to the Teams Page</h1>
<br>
Here you can Add Edit and or Delete Teams and the teams email address
<br><br>
<?php
echo "<td><a href='Football_Management_Soccer.php'>Home</a></td>";
?>
<br><br>
<br><br>
</head>
<body>
<?php
echo '<table border="1" width="50%">';
echo "<thead>";
    echo "<tr>";
        echo "<th>Team</th>";
        echo "<th>Team Email</th>";
        echo "<th>Action</th>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
        echo "<td>" . $row['team_name'] . "</td>";
        echo "<td>" . $row['Email'] . "</td>";
        echo ' <td><a href="href.php?method=edit&id={theID}">Edit</a>  <a href="href.php?method=edit&id={theID}">Delete</a></td>';
        echo "</td>";
    echo "</tr>";
}
echo "</tbody>";                            
echo "</table>";
?>

<?php
if(isset($_POST['submit'])){
$team_name = $_POST['team_name'];
$email = $_POST['email'];
if($connection){
    echo "";
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Teams (team_name, email) VALUE ('$team_name', '$email')";

$result = mysqli_query($connection, $query);
header("location:teams.php");
exit();
if(!$result){
   die('Failed' .  mysqli_error());
}
}
?>
<br><br>

<form method="post" action="teams.php"> 
Team : <input type="text" name="team_name">
  <br><br>
Email : <input type="text" name="email">
  <br><br>
<input type="submit" name="submit" value="Submit"> 
</form>

</body>
</html>