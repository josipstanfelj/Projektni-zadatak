<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bakery website">
    <title>Bakery "Štanfelj"</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="Slike/LOGOPEKARA.png">
    <script src="https://kit.fontawesome.com/79837be5cf.js" crossorigin="anonymous"></script>
    <style>
        main{
            display: flex;
            flex-direction: row;
            align-items: start;
        }
        form{
            width: 70%;
        }
        input{
            width: 35%;
        }
        span{
            color: red;
        }
    </style>
</head>
<body>
    <?php 
        session_start();
    ?>
    <header>
        <img src="Slike/header-picture.jpg" alt="naslovna slika" class="header-image">
        <div class="overlaytext">Bakery "Štanfelj"</div>
    </header>
    <nav class="sticky">
        <ul>
            <li><a class="selected" href="home.php">Home</a></li>
            <div class="nav-right">
                <li><a href="news.php">News</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="kategorija.php?id=Product news" class="">Product News</a></li>
                <?php 
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] === 1){
                    echo " <li class='liicon'>
                    <i class='fa-solid fa-user icon'></i>
                        <ul class='dropdown'>
                            <li><a href='administracija.php'>Administration</a></li>
                            <li><a href='unos.php'>News entry</a></li>
                            <li><a href='signout.php'>Sign Out</a></li>
                        </ul>
                    </li>";
                }else if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true){
                    echo " <li class='liicon'>
                    <i class='fa-solid fa-user icon'></i>
                        <ul class='dropdown'>
                            <li><a href='signout.php'>Sign Out</a></li>
                        </ul>
                    </li>";
                }
                else{
                    echo " <li class='liicon'>
                    <i class='fa-solid fa-user icon'></i>
                        <ul class='dropdown'>
                            <li><a href='login.php'>Login</a></li>
                            <li><a href='register.php'>Register</a></li>
                        </ul>
                    </li>";
                }
                ?>
            </div>
        </ul>
    </nav>
    <main>
        <form id="loginForm" action="skripta_login.php" method="POST">
            <div class="form-item">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
                <br>
                <span id="messageUsername" class="error"></span>
            </div>
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <br>
                <span id="messagePassword" class="error"></span>
            </div>
            <div class="form-item">
                <button id="button" type="submit">Login</button>
            </div>
        </form>
    </main>
    <footer> 
        <div class="text1">
            <p>Copyright © &nbsp;2023. &nbsp;&nbsp;&nbsp;&nbsp; <strong> Bakery "Štanfelj" </strong>&nbsp;&nbsp;&nbsp;&nbsp; Your bakery!</p>
            <p>Since 1995.</p>
        </div>
        <p class="text2">Josip Štanfelj <br> JMBAG : <strong>0246108016</strong></p> 
    </footer>
    <script>       
    document.getElementById("button").onclick = function(event) {
        var slanje_forme = true;

        var poljeUsername = document.getElementById("username");
        var username = poljeUsername.value.trim();
        if (username === "") {
            slanje_forme = false;
            poljeUsername.style.border = "2px solid red";
            document.getElementById("messageUsername").innerHTML = "Username is required!";
        } else {
            poljeUsername.style.border = "";
            document.getElementById("messageUsername").innerHTML = "";
        }

        var poljePassword = document.getElementById("password");
        var password = poljePassword.value.trim();
        if (password === "") {
            slanje_forme = false;
            poljePassword.style.border = "2px solid red";
            document.getElementById("messagePassword").innerHTML = "Password is required!";
        } else {
            poljePassword.style.border = "";
            document.getElementById("messagePassword").innerHTML = "";
        }

        if (!slanje_forme) {
            event.preventDefault();
        }
    }
    </script>
</body>
</html>
