<?php
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php'; 

    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT korisnicko_ime, lozinka, razina FROM korisnici WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
        mysqli_stmt_bind_result($stmt, $db_username, $db_password, $razina);
        mysqli_stmt_fetch($stmt);
        
        if(mysqli_stmt_num_rows($stmt) == 1) {
            if(password_verify($password, $db_password)) {
                $_SESSION['loggedin'] = true;
                $_SESSION['role'] = $razina;
                $_SESSION['username'] = $db_username;
            } else {
                $msg = 'Pogrešna lozinka!';
            }
        } else {
            $msg = 'Korisničko ime ne postoji!';
        }
    }
    mysqli_close($dbc);

echo '<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bakery website">
    <title>Bakery "Štanfelj" - Login</title>
    <link rel="stylesheet" href="style.css">
    <link rel="icon" type="image/x-icon" href="Slike/LOGOPEKARA.png">
    <script src="https://kit.fontawesome.com/79837be5cf.js" crossorigin="anonymous"></script>
    <style>
        main {
            display: flex;
            flex-direction: row;
            align-items: start;
        }
        form {
            width: 70%;
        }
        input {
            width: 35%;
        }
        span {
            color: red;
        }
    </style>
</head>
<body>
    <header>
        <img src="Slike/header-picture.jpg" alt="naslovna slika" class="header-image">
        <div class="overlaytext">Bakery "Štanfelj"</div>
    </header>
    <nav class="sticky">
        <ul>
            <li><a href="home.php">Home</a></li>
            <div class="nav-right">
                <li><a href="news.php">News</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="kategorija.php?id=Product news" class="">Product News</a></li>';
                 
                
                
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
            
                
                
echo '        </div>
        </ul>
    </nav>
    <main>
        <form action="login.php" method="POST">
            <div class="form-item">
                <label for="username">Username</label>
                <input type="text" name="username" id="username">
            </div>
            <div class="form-item">
                <label for="password">Password</label>
                <input type="password" name="password" id="password">
                <br>';
                
                if(isset($msg)) { 
                    echo '<span class="error">' . $msg . '</span>'; 
                }else{
                    echo '<p style="color:green;">Uspješno ste se prijavili</p>';
                }
                
echo '          </div>
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
</body>
</html>';



}
?>
