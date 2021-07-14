<?php
include 'conn.php';


$sql = "SELECT * FROM user";
if ($result = mysqli_query($conn, $sql)) {
    if (mysqli_num_rows($result) > 0) {
        echo "<table border=5>";
        echo "<tr>";
        echo "<th>id</th>";
        echo "<th>user_name</th>";
        echo "<th>name</th>";
        echo "<th>email</th>";
        echo "<th>pass</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($result)) {
            echo "<tr>";
            echo "<td>" . $row['ID'] . "</td>";
            echo "<td>" . $row['user_name'] . "</td>";
            echo "<td>" . $row['name'] . "</td>";
            echo "<td>" . $row['email'] . "</td>";
            echo "<td>" . $row['pass'] . "</td>";
?>
<td><a href="Deleted.php?id=<?php echo $row['ID']; ?>">Deleted</a></td>
<td><a href="Edite.php?id=<?php echo $row['ID']; ?>"><input type="submit" value="Edite"></a></td>
<?php
            echo "</tr>";
        }
        echo "</table>";
        // Free result set
        mysqli_free_result($result);
    } else {
        echo "No records matching your query were found.";
        header('Refresh:2; URL=Controller.php');
    }
} else {
    echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
}
