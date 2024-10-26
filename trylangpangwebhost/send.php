<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $nname = $_POST['uname'];
        $ppass = $_POST['pword'];

        echo"username is " . " " . $nname . "<br>";
        echo"password is " . " " . $ppass;
    
    ?>

<script>
    var id_num = "<?php echo $user_id; ?>";
    console.log(id_num);
</script>
</body>
</html>