<?php 
include 'connect.php';

if(isset($_POST['delete'])){
    $id=$_POST['id'];

    $query = "DELETE FROM korisnici WHERE id=$id ";
    $result = mysqli_query($dbc, $query);
}

    
if(isset($_POST['update'])){
    $id=$_POST['id'];

    $username = $_POST['username'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $password = $_POST['password'];
    $role = $_POST['role'];
    $hashed_password = password_hash($lozinka, CRYPT_BLOWFISH);
        
    $query = "UPDATE korisnici SET ime='$firstname', prezime='$lastname', korisnicko_ime='$username',
            lozinka='$hashed_password', razina='$role' WHERE id=$id ";
        
    $result = mysqli_query($dbc, $query);
}
header("Location: edit_users.php");
mysqli_close($dbc);

?>