<?php

session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    include 'connect.php';
    $msg = '';
    
    $ime = $_POST['firstname'];
    $prezime = $_POST['lastname'];
    $username = $_POST['username'];
    $lozinka = $_POST['password1'];

    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
    $razina = 0;
    $registriranKorisnik = '';
    $sql = "SELECT korisnicko_ime FROM korisnici WHERE korisnicko_ime = ?";
    $stmt = mysqli_stmt_init($dbc);
    if (mysqli_stmt_prepare($stmt, $sql)) {
        mysqli_stmt_bind_param($stmt, 's', $username);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_store_result($stmt);
    }
    if(mysqli_stmt_num_rows($stmt) > 0){
        $msg = 'Korisničko ime već postoji!';
    } else {
        $_SESSION['loggedin'] = true;
        $_SESSION['role'] = $razina;
        $sql = "INSERT INTO korisnici (ime, prezime, korisnicko_ime, lozinka, razina) VALUES (?, ?, ?, ?, ?)";
        $stmt = mysqli_stmt_init($dbc);
        if (mysqli_stmt_prepare($stmt, $sql)) {
            mysqli_stmt_bind_param($stmt, 'ssssd', $ime, $prezime, $username, $hashed_password, $razina);
            mysqli_stmt_execute($stmt);
            $registriranKorisnik = true;
        }
    }

    mysqli_close($dbc);
    
    echo '<!DOCTYPE html>
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
        <header>
            <img  src="Slike/header-picture.jpg" alt="naslovna slika" class="header-image">
            <div class="overlaytext">Bakery "Štanfelj"</div>
        </header>
        <nav class="sticky">
            <ul>
                
                <li><a class="selected"  href="home.php">Home</a></li>

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
                    
                
                    
    echo' 
                </div>
                
            </ul>
        </nav>
        <main>
    
        <form action="new_user.php" method="POST">
                <div class="form-item">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username">
                    <br>';
    
                    if(isset($msg)) {echo "<br><span class='error'>$msg</span>";} 
    echo ' 
                    <span id="messageUsername" class="error"></span>
                </div>
                <div class="form-item">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname">
                    <br>
                    <span id="messageFirstName" class="error"></span>
                </div>
                <div class="form-item">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname">
                    <br>
                    <span id="messageLastName" class="error"></span>
                </div>
                <div class="form-item">
                    <label for="password1">Password</label>
                    <input type="password" name="password1" id="password1">
                    <br>
                    <span id="messageTypePassword" class="error"></span>
                </div>
                <div class="form-item">
                    <label for="password2">Confirm Password</label>
                    <input type="password" name="password2" id="password2">
                    <br>
                    <span id="messageCheckPassword" class="error"></span>
                </div>
                <div class="form-item">
                    <button id="button" type="submit">Register</button>
                </div>';
                
                    if(isset($registriranKorisnik)) {
                        echo "<p style='color:green;'>Korisnik je uspješno registriran!</p>";
                    }
                

    echo ' 
            </form>
        </main>
        
        <footer > 
            <div class="text1" >
                <p>Copyright © &nbsp;2023. &nbsp;&nbsp;&nbsp;&nbsp; <strong> Bakery "Štanfelj" </strong>&nbsp;&nbsp;&nbsp;&nbsp; Your bakery!</p>
                <p>Since 1995.</p>
            </div>
            <p class="text2">Josip Štanfelj <br> JMBAG : <strong>0246108016</strong></p> 
        </footer>
        
        <script>       
        document.getElementById("button").onclick = function(event) {
            var slanje_forme = true;

            
            var poljeUsername = document.getElementById("username");
            var username = document.getElementById("username").value;
            if (username === "") {
                slanje_forme = false;
                poljeUsername.style.border = "2px solid red";
                document.getElementById("messageUsername").innerHTML = "Korisničko ime je obavezno polje!<br>";
            } else if (username.length < 5) {
                slanje_forme = false;
                poljeUsername.style.border = "2px solid red";
                document.getElementById("messageUsername").innerHTML = "Korisničko ime ne smije biti manje od 5 znakova!<br>";
            }else {
                poljeUsername.style.border = "";
                document.getElementById("messageUsername").innerHTML = "";
            }

        
            var poljePassword1 = document.getElementById("password1");
            var password1 = document.getElementById("password1").value;
            if (password1 === "") {
                slanje_forme = false;
                poljePassword1.style.border = "2px solid red";
                document.getElementById("messageTypePassword").innerHTML = "Lozinka je obavezno polje!";
            } else {
                poljePassword1.style.border = "";
                document.getElementById("messageTypePassword").innerHTML = "";
            }

            var poljeFirstName = document.getElementById("firstname");
            var firstName = document.getElementById("firstname").value;
            if (firstName === "") {
                slanje_forme = false;
                poljeFirstName.style.border = "2px solid red";
                document.getElementById("messageFirstName").innerHTML = "Ime je obavezno polje!<br>";
            } else {
                poljeFirstName.style.border = "";
                document.getElementById("messageFirstName").innerHTML = "";
            }
            
            var poljeLastName = document.getElementById("lastname");
            var lastName = document.getElementById("lastname").value;
            if (lastName === "") {
                slanje_forme = false;
                poljeLastName.style.border = "2px solid red";
                document.getElementById("messageLastName").innerHTML = "Prezime je obavezno polje!<br>";
            } else {
                poljeLastName.style.border = "";
                document.getElementById("messageLastName").innerHTML = "";
            }
        
            var poljePassword2 = document.getElementById("password2");
            var password2 = document.getElementById("password2").value;
            if (password2 === "") {
                slanje_forme = false;
                poljePassword2.style.border = "2px solid red";
                document.getElementById("messageCheckPassword").innerHTML = "Potvrda lozinke je obavezno polje!";
            } else {
                poljePassword2.style.border = "";
                document.getElementById("messageCheckPassword").innerHTML = "";
            }

            
            if (password1 !== password2) {
                slanje_forme = false;
                poljePassword1.style.border = "2px solid red";
                poljePassword2.style.border = "2px solid red";
                document.getElementById("messageCheckPassword").innerHTML = "Lozinke se ne podudaraju!";
            }

            if (!slanje_forme) {
                event.preventDefault();
            }
        }
        </script>
    </body>
</html>';
}
?> 