<?php
include 'conn.php';

if (isset($_GET['id'])) {

    $id = $_GET['id'];

    echo "<h4>ID is $id </h4>";
    echo "<br>";

    $sql = "select * from user WHERE ID ='$id'";

    if ($result = mysqli_query($conn, $sql)) {
        if (mysqli_num_rows($result) > 0) {
            echo "<table border=3>";
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
                echo "</tr>";
?>

<form action="Edite.php" method="POST">

    <label>username</label>
    <input type="text" name="user">
    <br>
    <label>name</label>
    <input type="text" name="name">
    <br>
    <label>email</label>
    <input type="text" name="email">
    <br>
    <label>passowrd</label>
    <input type="text" name="pass">
    <br>
    <input type="hidden" name="id" value="<? echo $row['ID']; ?>">

    <button type="submit" name="submit">send</button>


</form>
<?

            }
            echo "</table>";
            // Free result set
            mysqli_free_result($result);
        } else {
            echo "No records matching your query were found.";
        }
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }

    ?>

<?
}

if (isset($_POST['submit'])) {

    $id =  $_POST['id'];
    $user = $_POST['user'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $pass = $_POST['pass'];



    $sql = "UPDATE user SET user_name='$user',name='$name',email='$email',pass='$pass' WHERE ID='$id'";
    if (mysqli_query($conn, $sql)) {
        echo "Records were updated successfully.";
        header('Refresh:2; URL=Controller.php');
    } else {
        echo "ERROR: Could not able to execute $sql. " . mysqli_error($conn);
    }
}