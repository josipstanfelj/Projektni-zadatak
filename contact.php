<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bakery website">
    <title>Bakery "Štanfelj"</title>
    <link rel="stylesheet" href="contactstyle.css">
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
            <li><a href="home.php">Home</a></li>
            <div class="nav-right">
                <li><a href="news.php">News</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a class="selected" href="contact.php">Contact</a></li>
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
        <form action="URL">
            <fieldset class="form1">
                <p style="color: crimson;">Please fill out all fields marked by *ASTERISK*</p>
                <legend>Personal data</legend>
                <label for="fname"><span class="asterisk">*</span>First name:</label><br>
                <input type="text" id="fname" name="fname" placeholder="First name" required><br>
                <label for="prez"><span class="asterisk">*</span>Last name:</label><br>
                <input type="text" id="prez" name="prez" placeholder="Last name" required><br>
                <label for="email"><span class="asterisk">*</span>E-mail:</label><br>
                <input type="email" id="email" name="email" placeholder="E-mail address" required><br>
                <label for="tel">Mobile phone:</label><br>
                <input type="tel" id="tel" name="tel" placeholder="Mobile phone number">
                
            </fieldset>
    
            <fieldset class="form2">
                <legend>Inquiry</legend>
                <label for="pred"><span class="asterisk">*</span>Subject:</label><br>
                <input type="text" id="pred" name="pred" placeholder="Subject"><br>
                <label for="message"><span class="asterisk">*</span>Message:</label><br>
                <textarea id="message" name="message" rows="5" cols="50" placeholder="Message"></textarea>
            </fieldset>
            <div id="privacybox">
                <input  type="checkbox" id="privacypolicy" name="privacypolicy" value="Privacypolicy" required>
                <label  for="privacypolicy">I agree to the Privacy Policy</label>

            </div>
            <input class="button" type="submit" value="Send">
        </form>
        <div class="iframediv">
            <h2 class="naslov1">Our location:</h2>
            <p  class="tekst1"> 
                Croatia, Primorsko-Goranska Županija, 51304 Gerovo, Partizanska 2</p>
            <iframe class="iframee"  src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d349.4591716580836!2d14.638995979087387!3d45.51665338025448!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x476495bf4d88b599%3A0xf83f15f83c312ee1!2zUGVrYXJuaWNhICLFoHRhbmZlbGoi!5e0!3m2!1shr!2shr!4v1681553791517!5m2!1shr!2shr" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
            
        </div>
    </main>
    <footer > 
        <div class="text1" >
            <p>Copyright © &nbsp;2023. &nbsp;&nbsp;&nbsp;&nbsp; <strong> Bakery "Štanfelj" </strong>&nbsp;&nbsp;&nbsp;&nbsp; Your bakery!</p>
            <p>Since 1995.</p>
        </div>
       
        <p class="text2">Josip Štanfelj <br> JMBAG : <strong>0246108016</strong></p> 
    </footer>
</body>
</html>