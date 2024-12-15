<?PHP
if (empty($_SESSION["id"])){
    $error = "Account Not Login";
    header("location:../index.php?Error=$error");
}
?>