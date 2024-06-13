<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $slika = "";
    if (isset($_POST['title']) && isset($_POST['about']) && isset($_POST['content']) && isset($_POST['category'])) {
        $_SESSION['title'] = $_POST['title'];
        $_SESSION['about'] = $_POST['about'];
        $_SESSION['content'] = $_POST['content'];
        $_SESSION['category'] = $_POST['category'];
    }
    if (isset($_FILES['pphoto']) && $_FILES['pphoto']['error'] == 0) {
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($_FILES["pphoto"]["name"]);
        
        if (move_uploaded_file($_FILES["pphoto"]["tmp_name"], $target_file)) {
            $_SESSION['uploaded_image_path'] = $target_file;
            $slika = $target_file;
        } else {
            $_SESSION['upload_error'] = "Došlo je do greške prilikom premještanja datoteke.";
        }
    }


    $dbs = mysqli_connect("localhost", "root", "", "pekara");
        
    if (!$dbs) {
        die("Greška: Povezivanje nije uspjelo. " . mysqli_connect_error());
    }
    
    $datum = date("Y-m-d");
    $_SESSION['datum'] = $datum;
    $naslov = $_POST['title'];
    $sazetak = $_POST['about'];
    $tekst = $_POST['content'];
    $kategorija = $_POST['category'];
    $arhiva = isset($_POST['archive']) ? 1 : 0;

    $sql = "INSERT INTO vijesti (datum, naslov, sazetak, tekst, slika, kategorija,arhiva) VALUES (CURDATE(), '$naslov', '$sazetak', '$tekst', '$slika', '$kategorija',$arhiva)";
    mysqli_query($dbs, $sql);
    mysqli_close($dbs);

    header("Location: pregledvijesti.php");
    exit; 

}
?>

