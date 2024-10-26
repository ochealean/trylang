<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <div style="display:flex; flex-direction:column; align-items:center; justify-content:space-evenly; height:100vh;">
        <form action="" method="post" enctype="multipart/form-data">
            <div style="width:250px; display:flex; justify-content:space-between;" class="email">
                <input name="image" type="file">
            </div>
            <div style="width:250px; display:flex; justify-content:space-between;" class="password">
                Name:
                <input name="name" type="text">
            </div>
            <div style="width:250px; display:flex; justify-content:space-between;" class="email">
                Email:
                <input name="email" type="text">
            </div>
            <div style="width:250px; display:flex; justify-content:space-between;" class="password">
                Password:
                <input name="pass" type="password">
            </div>
            <div style="width:250px;" class="button">
                <input type="submit" name="save" value="submit">
            </div>
        </form>
    </div>

    <script>
    function getRandomInt(min, max) {
        return Math.floor(Math.random() * (max - min + 1)) + min;
    }

    let randomIntInRange = getRandomInt(1000000000, 9999999999);
    document.cookie = "randomInt=" + randomIntInRange;
    console.log(randomIntInRange);
    </script>

    <?php
    // Database connection
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "trylang";

    // Create connection
    $conn = new mysqli($servername, $username, $password, $dbname);

    // Check connection
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Check if the form has been submitted
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save'])) {
        // Get the form data
        $image = $_FILES['image']['name'];
        $name = $_POST['name'];
        $email = $_POST['email'];
        $password = $_POST['pass'];
        $user_id = $_COOKIE['randomInt'];

        // Move the uploaded file to a directory
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        move_uploaded_file($_FILES["image"]["tmp_name"], $target_file);

        // Insert data into the database
        $sql = "INSERT INTO accounts (email, passwordd, image, name, user_id) VALUES ('$email', '$password', '$image', '$name', '$user_id')";
        
        if ($conn->query($sql) === TRUE) {
            echo "<script>window.location.reload();
            window.location.replace('http://localhost/trylangpangwebhost/index.php/');
</script>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    $conn->close();
    ?>
</body>
</html>
