<?php
$connection = mysqli_connect('localhost', 'root', 'wawasan','Football');
if($connection){
    echo"<br />";
    echo "";
    echo"<br />";
} else {
 die("Unable to Capture Data");
}
$query = "SELECT * FROM Competition";
$result = mysqli_query($connection, $query);
if(!$result){
  die('Failed' .  mysqli_error());
}


?>





<html>
<head>

<title>Competition</title>

<h1>Welcome to the Competitions Page</h1>
<br>
Here you can Add Edit and or Delete Competitions

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
        echo "<th>Competition</th>";
        echo "<th>Action</th>";
    echo "</tr>";
echo "</thead>";
echo "<tbody>";
while ($row = mysqli_fetch_array($result)) {
    echo "<tr>";
        echo "<td>" . $row['comp_name'] . "</td>";
        echo ' <td><a href="href.php?method=edit&id={theID}">Edit</a>  <a href="href.php?method=edit&id={theID}">Delete</a></td>';
        echo "</td>";
    echo "</tr>";
}
echo "</tbody>";                            
echo "</table>";
?>

<?php
if(isset($_POST['submit'])){
$comp_name = $_POST['comp_name'];
if($connection){
    echo "";
} else {
   die("Unable to Capture Data");
}
$query = "INSERT INTO Competition (comp_name) VALUE ('$comp_name')";
$result = mysqli_query($connection, $query);
header("location: competition.php");
exit();
if(!$result){
   die('Failed' .  mysqli_error());
}
}

?>

<br><br>

<form method="post" action="competition.php"> 
Add competition <input type="text" name="comp_name">
  <br><br>
<input type="submit" name="submit" value="Submit"> 
</form>

</body>
</html>