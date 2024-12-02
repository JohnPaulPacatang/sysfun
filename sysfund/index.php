<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ENROLLMENT</title>
    <link rel="stylesheet" href="style.css">
    <script>
        function confirmDelete() {
            return confirm("Are you sure you want to delete this record?");
        }
    </script>
</head>

<body>
    <?php
    $host = "localhost";
    $username = "root";
    $password = "dikoalam";
    $dbname = "comprog2";

    // Create connection
    $con = new mysqli($host, $username, $password, $dbname);

    // Check connection
    if ($con->connect_error) {
        echo $con->connect_error;
    } else {
        echo "<div class='title'>• Connected<br/><br/></div> <div class='title-welcome'>Welcome to my first PHP page.<br/><br/></div>";
    }
   
    $sql = "SELECT id, FNAME, LNAME, MI FROM enrollment";
    $student = $con->query($sql) or die($con->error);

    echo "<div class='students'>";
    while ($row = $student->fetch_assoc()) {
        echo "<div class='student'>";
        echo $row['LNAME'] . " " . $row['FNAME'] . " " . $row['MI'];
        echo " <a class='edit-btn' href='update.php?id=" . $row['id'] . "'>Edit</a> ";
        echo " <a class='delete-btn' href='delete.php?id=" . $row['id'] . "' onclick='return confirmDelete();'>Delete</a>";
        echo "</div><br/>";
    }
    echo "</div>";
    ?>

    <a class="add-btn" href="add.php">Add New Student</a>

    <?php
    $con->close();
    ?>
</body>

</html>