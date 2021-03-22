<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 06-12-17
 * Time: 09:51
 */

session_start();

include("../layout/header.php");
include("nav.php");

$link = mysqli_connect("127.0.0.1", "pipo", "declown", "vulnerable_db");

$query = "SELECT * FROM user WHERE name = '".$_POST["voornaam"]."' and password = '".MD5($_POST["wachtwoord"])."'";



echo "<br>".$query."<br>";

$result = mysqli_query($link, $query);
if (!mysqli_query($link, $query)) {
    printf("Errormessage: %s\n", mysqli_error($link));
}


while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    print $row[0]." ".$row[1]." ".$row[2]."<br>";
    $_SESSION["login"] = true;
}

?>

<?php include("../layout/footer.php"); ?>
