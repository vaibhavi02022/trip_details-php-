<?php
$insert = false;
if(isset($_POST['name'])){
    $server = "localhost";
    $username = "root";
    $password = "";

    $con = mysqli_connect($server, $username, $password);
    if(!$con){
        die("Connection to database failed: " . mysqli_connect_error());
    }

    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];
    $sql = "INSERT INTO `trip`.`trip` (`name`, `age`, `gender`, `email`, `phone`, `other`, `dd`) 
            VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp());";

    if($con->query($sql) === true){
        $insert = true;
    } else {
        echo "ERROR: $sql <br> $con->error";
    }

    $con->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Trip Registration Form</title>
    <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>

    <div class="container">
        <h1>🌎 Sinhgad Institute US Trip Registration</h1>
        <p>Fill in your details below to confirm your spot for the exciting trip!</p>

        <?php if($insert): ?>
            <p class="submitMsg">✅ Thank you! You've successfully registered for the US trip.</p>
        <?php endif; ?>

        <form action="index.php" method="post">
            <input type="text" name="name" placeholder="Your Full Name" required>
            <input type="number" name="age" placeholder="Your Age" required>
            <input type="text" name="gender" placeholder="Your Gender" required>
            <input type="email" name="email" placeholder="Your Email" required>
            <input type="tel" name="phone" placeholder="Your Phone Number" required>
            <textarea name="desc" placeholder="Any additional info or questions?" rows="4"></textarea>
            <button class="btn" type="submit">Submit</button>
        </form>
    </div>

</body>
</html>
