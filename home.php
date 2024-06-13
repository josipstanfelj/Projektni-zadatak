<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bakery website">
    <title>Bakery "Štanfelj"</title>
    <link rel="stylesheet" href="home.css">
    <link rel="icon" type="image/x-icon" href="Slike/LOGOPEKARA.png">
    <script src="https://kit.fontawesome.com/79837be5cf.js" crossorigin="anonymous"></script>
    <style>
        main{
            display: flex;
            margin: 0 auto;
        }
        section{
            width: 60%;
            margin: 0 auto;
        }
        img{
            max-width: 100%;
        }
    </style>
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
    <section class="welcome-section">
            <h1>Welcome to our website</h1>
            <p>Explore our delicious assortment of freshly baked goods and experience the tradition of quality baking that has delighted customers since 1995.</p>
        </section>

        <section class="news-section">
            <div class="news-article">
                <img src="Slike/bakery.jpg" alt="News Image">
                <div class="news-content">
                    <p>Bakery "Štanfelj" has been providing high-quality bakery products to its customers for many years. Our products are characterized by a unique recipe that has been developed within our family for over 60 years. We focus on ensuring consistent quality that never wavers. Despite being a small bakery, we stand out among leading producers with our quality, recipe, and knowledge. In today's world of mass production, including frozen foods, products packed with additives, flavors, and chemicals, food quality is very low. Unlike many others, we stick to our true values by staying true to our homemade recipe and making bread in a healthy way.</p>
                </div>
            </div>
    </section>
    </main>
    <div class="newsletter-block"> 
        <div class="newsletter-positioning"> 
        <h3>Subscribe to our newsletter and be the first to know about new promotions and offers!</h3>
        <form action="#">
          <input class="newsletter-registration" type="text" placeholder="Enter your e-mail address here!" required>
          <button type="submit" class="newsletter-button">Subscribe</button>
          <br>
          <input class="conditions" type="checkbox" id="opciuvjeti" name="opciuvjeti" value="Općiuvjeti" required>
          <label class="conditions" for="opciuvjeti">I agree to the terms and conditions.</label>
          </form>
        </div>
    </div>
    <footer> 
    
        <div class="text1" >
            <p>Copyright © &nbsp;2023. &nbsp;&nbsp;&nbsp;&nbsp; <strong> Bakery "Štanfelj" </strong>&nbsp;&nbsp;&nbsp;&nbsp; Your bakery!</p>
            <p>Since 1995.</p>
        </div>
        <p class="text2">Josip Štanfelj <br> JMBAG : <strong>0246108016</strong></p> 
    </footer>

</body>
</html>