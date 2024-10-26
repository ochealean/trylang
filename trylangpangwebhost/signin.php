<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script>
        function getInputValues() {
            let emailValue = document.getElementById('emailInput').value;
            let passwordValue = document.getElementById('passwordInput').value;
            console.log('Email:', emailValue);
            console.log('Password:', passwordValue);
        }
    </script>
</head>
<body>
<div id="login">
    <form action="" method="post" onsubmit="getInputValues()">
        <div style="width:250px; display:flex; justify-content:space-between;" id="email">
            Email:
            <input id="emailInput" name="emaill" type="text">
        </div>
        <div style="width:250px; display:flex; justify-content:space-between;" id="password">
            Password:
            <input id="passwordInput" name="pass" type="password">
        </div>
        <div style="width:250px;" class="button">
            <input type="submit" name="save" value="submit">
        </div>
    </form>

    <?php
        $servername = "localhost";
        $username = "root";
        $password = "";
        $dbname = "trylang";

        $email;
        $passwordd;
        $image;
        $name;
        $user_id;

        // Create connection
        $conn = new mysqli($servername, $username, $password, $dbname);

        // Check connection
        if ($conn->connect_error) {
            die("Connection failed: " . $conn->connect_error);
        }

        // SQL query to retrieve data
        $sql = "SELECT email, passwordd, image, name, user_id FROM accounts";
        $result = $conn->query($sql);

        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['save']))
        {
            $email_user = $_POST['emaill'];
            $password_user = $_POST['pass'];

            if ($result->num_rows > 0) {
                // Output data of each row
                while($row = $result->fetch_assoc()) {
                    $user_id = $row["user_id"];
                    $email = $row["email"];
                    $passwordd = $row["passwordd"];
                    $image = $row["image"];
                    $name = $row["name"];
                if($email_user==$email && $password_user==$passwordd ) {
                    echo "";
                    break;
                }
                else {
                    echo "Wrong Password";
                }
                }
            } else {
                echo "0 results";
            }

        }
        $conn->close();
    ?>

</div>


<div>
    <div></div>
    <div></div>
    <div></div>
</div>

<script>
    let userId = "<?php echo isset($user_id) ? $user_id : ''; ?>";
    let u_name = "<?php echo isset($name) ? $name : ''; ?>";
    let u_image = "<?php echo isset($image) ? $image : ''; ?>";
    let u_email = "<?php echo isset($email) ? $email : ''; ?>";
    console.log('User ID:', userId);
</script>
</body>
</html>
