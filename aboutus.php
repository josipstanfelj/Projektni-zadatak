<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bakery website">
    <title>Bakery "Štanfelj"</title>
    <link rel="stylesheet" href="aboutusstyle.css">
    <link rel="icon" type="image/x-icon" href="Slike/LOGOPEKARA.png">
    <script src="https://kit.fontawesome.com/79837be5cf.js" crossorigin="anonymous"></script>

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
            <li><a href="home.php">Home</a></li>
            <div class="nav-right">
                <li><a href="news.php">News</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a class="selected" href="aboutus.php">About Us</a></li>
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
        <section>
            <h1>New!</h1> 
            <hr><br> 
            <p>Fill out the questionnaire and get a discount on your first purchase! <br>
            Subscribe to our newsletter and receive notifications about promotions and exclusive benefits you won't want to miss! </p>
        </section>
        <section>
            <h1>Hiring</h1> 
            <hr><br> 
            <p>We are currently looking for new employees! <br>
             All you need to do is fill out a small questionnaire and contact us 24 hours later on mobile phone: (+385) 99 8339 180.</p>
        </section>
        <section>
            <h1>Complaints and Grievances</h1> 
            <hr><br>
            <p>Do you have a complaint or grievance? Feel free to write to us via email or through reviews on Google Maps. We will do our best to address the issue and respond as quickly as possible!</p>    
        </section>
        <section>
            <h1>Our Partners</h1> 
            <hr><br>
            <p>We currently do not have any partners, but we are working on it. <br>
            If you would like to inquire about starting a partnership, write to us at: stanfelj.zdravko@gmail.com or call the above-mentioned mobile number.</p>   
        </section>
        <section>
            <h1> About Us</h1> <br>
            <p>Bakery “Štanfelj” started as a small business back in 1995. To this day, with great effort and on a professional level, we offer our customers high-quality bakery products. The production of bread follows our traditional, and of course, unique method of dough preparation and processing, which we can boast about even among much larger bakery companies. As bakers with many years of experience, we are convinced that the quality of our bakery products is at a high level.
            Purchasing our products includes free daily delivery. When we think of delivery, we mean the delivery of bread straight from the oven to your home, without any charge!</p>
        </section>
        <section>
            <p><strong>Looking forward to meeting you in our bakery, hoping you will visit us!</strong><br>
            Follow us on our social media! <br> Instagram, Twitter, Facebook, and TikTok *(Pages coming soon)</p>  
        </section>
        <section class="bussines-hours">
            <p>
                <strong>Business hours:</strong> <br>
                Monday: 07:00 – 16:30  <br>
                Tuesday: 07:00 – 16:30 <br>
                Wednesday: 07:00 – 16:30 <br>
                Thursday: 07:00 – 16:30 <br>
                Friday: 07:00 – 16:30 <br>
                Saturday: 07:00 – 16:30 <br>
                Sunday: Closed! <br>
                <strong>We do not work on holidays!</strong>
            </p>
            <img src="Slike/LOGOPEKARA.png" alt="bakerylogo">

            <iframe width="560" height="315" src="https://www.youtube.com/embed/XNXuwrXFHRs" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


        </section>
        
        
    </main>
    <div class="newsletter-block"> 
        <div class="newsletter-positioning"> 
        <h3>Subscribe to our newsletter and be the first to know about new promotions and offers!</h3>
        <form action="#">
          <input class="newsletter-registration" type="text" placeholder="Enter your e-mail address here!" required>
          <button type="submit" class="newsletter-button">Subscribe</button>
          <br>
          <input class="conditions" type="checkbox" id="conditions" name="conditions" value="Conditions" required>
          <label class="conditions" for="conditions">I agree to the terms and conditions.</label>
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