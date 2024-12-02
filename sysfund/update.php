<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Student</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=DM+Sans:opsz@9..40&family=Inter:ital,opsz,wght@0,14..32,100..900;1,14..32,100..900&display=swap');

        html {
            margin: 0 auto;
            background-color: #e9ecef;
        }

        body {
            font-family: "Inter", sans-serif;
            display: flex;
            justify-content: center;
            flex-direction: column;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        h2 {
            color: #333;
            margin-bottom: 25px;
            text-align: center;
            font-size: 20px;
        }

        form {
            background: white;
            box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
            border-radius: 10px;
            padding: 40px;
            width: 300px;
        }

        input[type="text"] {
            font-family: "Inter", sans-serif;
            width: 93%;
            padding: 10px;
            margin: 10px 0;
            border: 1px solid #ccc;
            border-radius: 4px;
            transition: border-color 0.3s;
        }

        input[type="text"]:focus {
            border-color: #007BFF;
            outline: none;
        }

        input[type="submit"] {
            font-family: "Inter", sans-serif;
            background-color: #007BFF;
            color: white;
            border: none;
            padding: 10px;
            border-radius: 5px;
            cursor: pointer;
            width: 100%;
            margin-top: 20px;
            transition: background-color 0.3s;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>

<body>
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
     
        $sql = "SELECT * FROM enrollment WHERE id = $id";
        $result = $con->query($sql);
        $row = $result->fetch_assoc();
    }

    if (isset($_POST['update'])) {
        $lname = $con->real_escape_string($_POST['lname']);
        $fname = $con->real_escape_string($_POST['fname']);
        $mi = $con->real_escape_string($_POST['mi']);

        $sql = "UPDATE enrollment SET LNAME='$lname', FNAME='$fname', MI='$mi' WHERE id=$id";

        if ($con->query($sql) === TRUE) {
            echo "Record updated successfully";
            header("Location: index.php");
        } else {
            echo "Error updating record: " . $con->error;
        }
    }
    ?>

    <form action="" method="POST">
        <h2>Update Student</h2>
        Last Name: <input type="text" name="lname" value="<?php echo $row['LNAME']; ?>" required><br>
        First Name: <input type="text" name="fname" value="<?php echo $row['FNAME']; ?>" required><br>
        Middle Initial: <input type="text" name="mi" value="<?php echo $row['MI']; ?>" required><br>
        <input type="submit" name="update" value="Update Student">
    </form>

    <?php
    $con->close();
    ?>
</body>

</html>
