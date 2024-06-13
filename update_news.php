<?php

include 'connect.php';

if(isset($_POST['delete'])){
    $id=$_POST['id'];

    $query = "SELECT slika FROM vijesti WHERE id=$id";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_assoc($result);
    $delete_photo = $row['slika'];
    if (file_exists($delete_photo)) {
            unlink($delete_photo);
    }

    $query = "DELETE FROM vijesti WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
}

if(isset($_POST['update'])){
    $title = $_POST['title'];
    $about = $_POST['about'];
    $content = $_POST['content'];
    $category = $_POST['category'];
    $archive = isset($_POST['archive']) ? 1 : 0;
    $id = $_POST['id'];

    
    $query = "SELECT slika FROM vijesti WHERE id=$id";
    $result = mysqli_query($dbc, $query);
    $row = mysqli_fetch_assoc($result);
    $delete_photo = $row['slika'];
    if (file_exists($delete_photo)) {
        unlink($delete_photo);
    }


    $target_dir = "uploads/";
    $picture = $target_dir . basename($_FILES["pphoto"]["name"]);
    
    move_uploaded_file($_FILES["pphoto"]["tmp_name"], $picture);

    $query = "UPDATE vijesti SET naslov='$title', sazetak='$about', tekst='$content',
            slika='$picture', kategorija='$category', arhiva='$archive' WHERE id=$id ";
    
    $result = mysqli_query($dbc, $query);
}

            
header("Location: edit_news.php");
mysqli_close($dbc);
?>