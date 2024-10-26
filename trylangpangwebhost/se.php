<html lang="en"><head>
    <script src="chrome-extension://jcacnejopjdphbnjgfaaobbfafkihpep/./hive_keychain.js"></script><meta charset="UFT-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        div{
            width: 100px;
            height: 100px;
            background-color: rgb(162, 92, 0);
        }
    </style>
</head>
<body>
    <h1>Using AJAX</h1>
    <h3>Start typing a name of animal in the input field below:</h3>
    <form action="" method="POST">
    Animal: <input type="text" id="myanimal" onkeyup="showSuggest(this.value)" />
    Animal: <input type="text" id="myanimal" onkeyup="dis(this.value)" />
    </form>
    <p><span id="txtsuggest"></span>  </p>
    <?php
$conn = new mysqli("localhost", "root", "", "opportunity");

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM user";
$result = $conn->query($sql);

$u_s_e_r = [[], []];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $u_s_e_r[0][] = $row['user_username'];
        $u_s_e_r[1][] = $row['user_password'];
    }
}

// Convert PHP array to JSON
$u_s_e_r_json = json_encode($u_s_e_r);
?>

<script>
// Pass the PHP array to JavaScript
var userArray = <?php echo $u_s_e_r_json; ?>;
userArray[0].forEach(function(usernm) {
    console.log(usernm);
});

userArray[1].forEach(function(userps) {
    console.log(userps);
});
</script>



</body></html>