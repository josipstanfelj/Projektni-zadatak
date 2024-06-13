<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Bakery website">
    <title>Bakery "Štanfelj"</title>
    <link rel="stylesheet" href="pregledvijesti.css">
    <link rel="icon" type="image/x-icon" href="Slike/LOGOPEKARA.png">
    <script src="https://kit.fontawesome.com/79837be5cf.js" crossorigin="anonymous"></script>
</head>
<body>
    <?php 
        session_start();
    ?>
  
    <?php 
    include 'connect.php';

    if (isset($_GET['id'])) {
        $id_vijesti = $_GET['id'];
        $sql = "SELECT * FROM vijesti WHERE id = $id_vijesti";
        $result = mysqli_query($dbc, $sql);
    
        if (mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $category = $row['kategorija'];
            $title = $row['naslov'];
            $datum = $row['datum'];
            $uploaded_image_path = $row['slika'];
            $about = $row['sazetak'];
            $content = $row['tekst'];
        }
        mysqli_close($dbc);
    }
    
    ?>

    <header>
        <img  src="Slike/header-picture.jpg" alt="naslovna slika" class="header-image">
        <div class="overlaytext">Bakery "Štanfelj"</div>
    </header>
    <nav class="sticky">
        <ul>
            
            <li><a  href="home.php">Home</a></li>
            <div class="nav-right">
                <li><a class="selected" href="news.php">News</a></li>
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
        
        <section class="section1" role="main">
            <div class="row">
                <p class="category"><?php echo $category; ?></p>
                <h1 class="title"><?php echo $title; ?></h1>
                <p>Published: <?php echo $datum; ?></p>
            </div>
            <section class="slika">
                <img src="<?php echo $uploaded_image_path; ?>" alt="Slika vijesti">
            </section>
            <section class="about">
                <p><?php echo $about; ?></p>
            </section>
            <section class="sadrzaj">
                <?php echo "<p> $content </p>"; ?>
            </section>
            
        </section>
        

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