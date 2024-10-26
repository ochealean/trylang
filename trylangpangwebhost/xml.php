
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding:0px;
            margin:0px;
        }
        header{
            background-color:#0481fe;
            width:100%;
            height: 60px;
            display:flex;
            justify-content:space-between;
            font-size:30px;
        }
        span{
            display:flex;
            justify-content:center;
            align-items:center;
            color:#ffb900;
            width: 250px;
        }
        .nav-bar{
            display:flex;
            justify-content:center;
            align-items:center;
            color:#ffffff;
            font-size: 20px;
            width: 250px;
        }
        nav{
            display:flex;
            justify-content:center;
            align-items:center;
        }
        ul{
            display:flex;
            justify-content:space-evenly;
            align-items:center;
            font-size: 16px;
            width: 300px;
        }
        li{
            color:#ffffff;
            list-style-type:none;
            cursor:pointer;
        }
        a{
            text-decoration:none;
            color:#ffffff;
        }
    </style>
</head>
<body>
    <header>
        <span>
            <p>OpportUNITY</p>
        </span>
        <nav>
            <ul>
                <li>Home</li>
                <li>About</li>
                <li>Contacts</li>
                <a id="gotoLogout"><li>Logout</li></a>
            </ul>
            <div class="nav-bar">
                
                <p><?=$name?></p>
            </div>
        </nav>
    </header>
    <script>
        const logout = document.getElementById('gotoLogout');
        logout.addEventListener('click', function() {
            // Refresh the page and prevent going back
            window.location.replace("opportUnity.html");
        });

    </script>
</body>
</html>