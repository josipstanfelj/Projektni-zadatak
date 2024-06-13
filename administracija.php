
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
        table {
            width: 70%;
            border-collapse: collapse;
            margin: 20px 0;
        }
        section{
            width: 70%;
            text-align: center;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        table th {
            border-bottom: 2px solid #000;
            padding: 10px;
            text-align: left;
        }

        table td {
            border-bottom: 1px solid #ddd;
            padding: 10px;
            text-align: left;
        }
        table tr {
            border: none;
        }
        section h2 {
            text-align: left;
            margin: 10px 0;
        }
        .edit-button {
            display: inline-block;
            margin-top: 10px;
            padding: 10px 20px;
            background-color:#4CAF50;
            color:white;
            text-align: center;
            text-decoration: none;
            border-radius: 5px;
            transition: background-color 0.3s ease;
        }
        .edit-button:hover {
            background-color: #2c9630;
        }
        main{
            display: flex;
            flex-direction: column;
            justify-content:start;
            align-items: center;
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
        <h1>User and news administration</h1>
    <?php
        include 'connect.php';
        
        $user_query = "SELECT * FROM korisnici";
        $user_result = mysqli_query($dbc, $user_query);

        echo "<section><h2>Users</h2><table border='1'>";
        echo "<tr><th>Username</th><th>Role</th></tr>";
        if (mysqli_num_rows($user_result) > 0) {
            while ($user_row = mysqli_fetch_assoc($user_result)) {
                echo "<tr><td>". $user_row['korisnicko_ime'] . "</td><td>" . $user_row['razina'] . "</td></tr>";
            }
        } else {
            echo "<tr><td colspan='2'>No users found.</td></tr>";
        }
        echo "</table>";
        echo '<a href="edit_users.php" class="edit-button">Edit Users</a> </section>';
        echo '<br><br>';
        $news_query = "SELECT * FROM vijesti";
        $news_result = mysqli_query($dbc, $news_query);
        echo "<section><h2>News</h2><table border='1'>";
        echo "<tr><th>Title</th><th>Summary</th><th>Date</th></tr>";
        if (mysqli_num_rows($news_result) > 0) {
            while ($news_row = mysqli_fetch_assoc($news_result)) {
                $arhiva = $news_row['arhiva'];
                if($arhiva == 0){
                    echo "<tr><td>" . $news_row['naslov'] . "</td><td>" . $news_row['sazetak'] . "</td><td>" . $news_row['datum'] . "</td></tr>";
                }
            }
        } else {
            echo "<tr><td colspan='3'>No news articles found.</td></tr>";
        }
        echo "</table>";
        echo '<a href="edit_news.php" class="edit-button">Edit News</a> </section>';

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

</body>
</html>
