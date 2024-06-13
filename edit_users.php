
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
</head>
<body>
    <?php 
        session_start();
    ?>
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
                <li><a href="kategorija.php?id=Product news" class="">Product News</a></li>
                <?php 
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] === 1){
                    echo " <li class='selected liicon'>
                    <i class=' fa-solid fa-user icon'></i>
                        <ul class='dropdown'>
                            <li><a class='selected' href='administracija.php'>Administration</a></li>
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
        <?php 
            include 'connect.php';

            $query = "SELECT * FROM korisnici";
            $result = mysqli_query($dbc, $query);
            while ($row = mysqli_fetch_array($result)) {
                echo '
                <form action="update_users.php" method="POST">
                <div class="form-item">
                    <label for="username">Username</label>
                    <input type="text" name="username" id="username" value="' . $row['korisnicko_ime'] . '">
                    <br>
                    <span id="messageUsername" class="error"></span>
                </div>
                <div class="form-item">
                    <label for="firstname">First Name</label>
                    <input type="text" name="firstname" id="firstname" value="' . $row['ime'] . '">
                    <br>
                    <span id="messageFirstName" class="error"></span>
                </div>
                <div class="form-item">
                    <label for="lastname">Last Name</label>
                    <input type="text" name="lastname" id="lastname" value="' . $row['prezime'] . '">
                    <br>
                    <span id="messageLastName" class="error"></span>
                </div>
                <div class="form-item">
                    <label for="password1">Password</label>
                    <input type="password" name="password" id="password">
                    <br>
                    <span id="messageTypePassword" class="error"></span>
                </div>
                <div class="form-item">
                    <label for="role">Role</label>
                    <input type="number" name="role" id="role" value="' . $row['razina'] . '">
                    <br>
                    <span id="messageTypeRole" class="error"></span>
                </div>
                <div class="form-item">
                    <input type="hidden" name="id" class="form-field-textual" value="' . $row['id'] . '">
                    <button name="delete" id="deleteButton" type="submit">Delete</button>
                    <button name="update" id="updateButton" type="submit">Update</button>
                </div>
                </form>';
        }   

       
        mysqli_close($dbc);
        ?>
</main>
<footer > 
    <div class="text1" >
        <p>Copyright © &nbsp;2023. &nbsp;&nbsp;&nbsp;&nbsp; <strong> Bakery "Štanfelj" </strong>&nbsp;&nbsp;&nbsp;&nbsp; Your bakery!</p>
        <p>Since 1995.</p>
    </div>
    <p class="text2">Josip Štanfelj <br> JMBAG : <strong>0246108016</strong></p> 
</footer>

<script>       
    document.getElementById("updateButton").onclick = function(event) {
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

       
        var poljePassword1 = document.getElementById("password");
        var password1 = document.getElementById("password").value;
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
        
        var poljeRazina = document.getElementById("role");
        var role = document.getElementById("role").value;
        if (role === "") {
            slanje_forme = false;
            poljeRazina.style.border = "2px solid red";
            document.getElementById("messageTypeRole").innerHTML = "Morate odabrati razinu!<br>";
        }

        if (!slanje_forme) {
            event.preventDefault();
        }
    }
    </script>
    
</body>
</html>
