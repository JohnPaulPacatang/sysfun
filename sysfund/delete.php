<?php
$host = "localhost";
$username = "root";
$password = "dikoalam";
$dbname = "comprog2";

$con = new mysqli($host, $username, $password, $dbname);

if ($con->connect_error) {
    die("Connection failed: " . $con->connect_error);
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM enrollment WHERE id = $id";

    if ($con->query($sql) === TRUE) {
        echo "Record deleted successfully";
        header("Location: index.php"); 
    } else {
        echo "Error deleting record: " . $con->error;
    }
}

$con->close();
?>
