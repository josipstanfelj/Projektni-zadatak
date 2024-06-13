<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bakery website">
    <title>Bakery "Štanfelj"</title>
    <link rel="stylesheet" href="gallerystyle.css">
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
            
            <li><a  href="home.php">Home</a></li>

            <div class="nav-right">
                <li><a href="news.php">News</a></li>
                <li><a class="selected" href="gallery.php">Gallery</a></li>
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
            <article>
            <h2 id="opcenito">About Bakery "Štanfelj"</h2>
            <p> Bakery Štanfelj has been providing its customers with high-quality bakery products for years. 
                Our products are characterized by a specific recipe that has been developed for over 60 years within our family. 
                We emphasize the lasting quality of our products, which never deviates from its standard. Although we are a small business, our quality, recipe, and knowledge set us apart even among the leading producers of bakery products. 
                Considering today's mass production that includes frozen food, food full of additives, flavors, and preservatives, and various chemically derived ingredients, we can conclude that the quality of food today is at a very low level. 
                Unlike many producers who turn to that side, we still honor true values by staying faithful to our homemade recipe and preparing bread in a healthy way. 
                Therefore, we are proud of our local production and bread, which we can confidently say is unmatched.</p>
              <br> 
              
            </article>
         
            <section>
                <h2 id="bijeli">White Wheat Bread</h2>
                <div class="psenicnibijeli"><img src="Slike/bijeli2.JPG" alt=""></div>
                <div class="poredslike">
                    <p>From flour T-550 of 700g</p><br>
                    <p><strong>INGREDIENTS:</strong> Wheat flour T-550, water, oil, salt, yeast, improver<br>
                    <strong>ALLERGEN:</strong> Wheat gluten</p><br>
                </div>
            </section>
            
            <section>
                <h2 id="francuz">Baguette</h2>
                <div class="psenicnibijeli"><img src="Slike/francuz2.JPG" alt=""></div>
                <div class="poredslike">
                    <p>From flour T-550 of 700g</p><br>
                    <p><strong>INGREDIENTS:</strong> Wheat flour T-550, water, oil, salt, yeast, improver<br>
                    <strong>ALLERGEN:</strong> Wheat gluten</p><br>
                </div>
            </section>
            
            <section>
                <h2 id="peka">Peka</h2>
                <div class="psenicnibijeli"><img src="Slike/razeni2.JPG" alt=""></div>
                <div class="poredslike">
                    <p>From flour T-850, T-1250 of 700g</p><br>
                    <p><strong>INGREDIENTS:</strong> Wheat flour, water, oil, salt, yeast, improver<br>
                    <strong>ALLERGEN:</strong> Wheat gluten</p><br>
                </div>
            </section>
            
            <section>
                <h2 id="razeni">Small Rye Bread</h2>
                <div class="psenicnibijeli"><img src="Slike/kruh2.jpg" alt=""></div>
                <div class="poredslike">
                    <p>From flour T-850, T-1250 of 700g</p><br>
                    <p><strong>INGREDIENTS:</strong> Wheat flour, water, oil, salt, yeast, improver<br>
                    <strong>ALLERGEN:</strong> Wheat gluten</p><br>
                </div>
            </section>
            
            <section>
                <h2 id="domaci">Homemade Fine Bread</h2>
                <div class="psenicnibijeli"><img src="Slike/domacikruhmali.jpg" alt=""></div>
                <div class="poredslike">
                    <p>From flour T-550 of 350g</p><br>
                    <p><strong>INGREDIENTS:</strong> Wheat flour, water, oil, salt, yeast, improver<br>
                    <strong>ALLERGEN:</strong> Wheat gluten</p><br>
                </div>
            </section>
            
            <section>
                <h2 id="pecivo">Wheat Pastry</h2>
                <div class="psenicnibijeli"><img src="Slike/pecivo2.JPG" alt=""></div>
                <div class="poredslike">
                    <p>From flour T-550 of 70g</p><br>
                    <p><strong>INGREDIENTS:</strong> Wheat flour, water, oil, salt, yeast, improver<br>
                    <strong>ALLERGEN:</strong> Wheat gluten</p><br>
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
    <footer > 
        <div class="text1" >
            <p>Copyright © &nbsp;2023. &nbsp;&nbsp;&nbsp;&nbsp; <strong> Bakery "Štanfelj" </strong>&nbsp;&nbsp;&nbsp;&nbsp; Your bakery!</p>
            <p>Since 1995.</p>
        </div>
        <p class="text2">Josip Štanfelj <br> JMBAG : <strong>0246108016</strong></p> 
    </footer>

</body>
</html>