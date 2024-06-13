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
        span{
            color: red;
            font-weight: bold;
            padding-top: 10px;
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
            
            <li><a  href="home.php">Home</a></li>
       
            <div class="nav-right">
                <li><a href="news.php">News</a></li>
                <li><a href="gallery.php">Gallery</a></li>
                <li><a href="aboutus.php">About Us</a></li>
                <li><a href="contact.php">Contact</a></li>
                <li><a href="kategorija.php?id=Product news" class="">Product News</a></li>
                <?php 
                if(isset($_SESSION['loggedin']) && $_SESSION['loggedin'] === true && $_SESSION['role'] === 1){
                    echo " <li class='selected liicon'>
                    <i class='fa-solid fa-user icon'></i>
                        <ul class='dropdown'>
                            <li><a href='administracija.php'>Administration</a></li>
                            <li><a class='selected' href='unos.php'>News entry</a></li>
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
        
        <form action="skripta.php" method="POST" enctype="multipart/form-data">
            <div class="form-item">
                <label for="title">News Title</label>
                <div class="form-field">
                    <input id="title" type="text" name="title" class="form-field-textual">
                </div>
                <span id="porukaTitle" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="about">Brief Summary</label>
                <div class="form-field">
                    <textarea id="about" name="about" cols="30" rows="10" class="form-field-textual"></textarea>
                </div>
                <span id="porukaAbout" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="content">News Content</label>
                <div class="form-field">
                    <textarea id="content" name="content" cols="30" rows="10" class="form-field-textual"></textarea>
                </div>
                <span id="porukaContent" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="pphoto">Image: </label>
                <div class="form-field">
                    <input value="Choose photo" id="pphoto" type="file" accept="image/jpg,image/gif" class="input-text" name="pphoto"/>
                </div>
                <span id="porukaSlika" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label for="category">News Category</label>
                <div class="form-field">
                    <select id="category" name="category" class="form-field-textual">
                        <option value="category">Category</option>
                        <option value="Announcement">Announcements</option>
                        <option value="Product news">Product News</option>
                    </select>
                </div>
                <span id="porukaKategorija" class="bojaPoruke"></span>
            </div>
            <div class="form-item">
                <label>Save to Archive:
                    <div class="form-field">
                        <input type="checkbox" name="archive">
                    </div>
                </label>
            </div>
            <div class="form-item">
                <button type="reset" value="Reset">Reset</button>
                <button id="send" type="submit" value="Submit">Submit</button>
            </div>
        </form>
        
        
    </main>
    
    <footer > 
        <div class="text1" >
            <p>Copyright © &nbsp;2023. &nbsp;&nbsp;&nbsp;&nbsp; <strong> Bakery "Štanfelj" </strong>&nbsp;&nbsp;&nbsp;&nbsp; Your bakery!</p>
            <p>Since 1995.</p>
        </div>
        <p class="text2">Josip Štanfelj <br> JMBAG : <strong>0246108016</strong></p> 
    </footer>

    <script type="text/javascript">
        document.getElementById("send").onclick = function(event) {
    
            var slanjeForme = true;
    
            var poljeTitle = document.getElementById("title");
            var title = document.getElementById("title").value;
            if (title.length < 5 || title.length > 30) {
                slanjeForme = false;
                poljeTitle.style.border = "1px solid red";
                document.getElementById("porukaTitle").innerHTML = "Naslov vjesti mora imati između 5 i 30 znakova!<br>";
            } else {
                poljeTitle.style.border = "1px solid green";
                document.getElementById("porukaTitle").innerHTML = "";
            }
    
            
            var poljeAbout = document.getElementById("about");
            var about = document.getElementById("about").value;
            if (about.length < 10 || about.length > 100) {
                slanjeForme = false;
                poljeAbout.style.border = "1px solid red";
                document.getElementById("porukaAbout").innerHTML = "Kratki sadržaj mora imati između 10 i 100 znakova!<br>";
            } else {
                poljeAbout.style.border = "1px solid green";
                document.getElementById("porukaAbout").innerHTML = "";
            }
      
            var poljeContent = document.getElementById("content");
            var content = document.getElementById("content").value;
            if (content.length == 0) {
                slanjeForme = false;
                poljeContent.style.border = "1px solid red";
                document.getElementById("porukaContent").innerHTML = "Sadržaj mora biti unesen!<br>";
            } else {
                poljeContent.style.border = "1px solid green";
                document.getElementById("porukaContent").innerHTML = "";
            }
        
            var poljeSlika = document.getElementById("pphoto");
            var pphoto = document.getElementById("pphoto").value;
            if (pphoto.length == 0) {
                slanjeForme = false;
                poljeSlika.style.border = "1px solid red";
                document.getElementById("porukaSlika").innerHTML = "Slika mora biti unesena!<br>";
            } else {
                poljeSlika.style.border = "1px solid green";
                document.getElementById("porukaSlika").innerHTML = "";
            }
           
            var poljeCategory = document.getElementById("category");
            if(document.getElementById("category").selectedIndex == 0) {
                slanjeForme = false;
                poljeCategory.style.border = "1px solid red";
    
                document.getElementById("porukaKategorija").innerHTML = "Kategorija mora biti odabrana!<br>";
            } else {
                poljeCategory.style.border = "1px solid green";
                document.getElementById("porukaKategorija").innerHTML = "";
            }
    
            if (slanjeForme != true) {
                event.preventDefault();
            }
        };
    </script>
    
    

</body>
</html>