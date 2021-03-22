<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 06-12-17
 * Time: 14:28
 */

if(!isset($_COOKIE["geheim"])) {
    $cookie_name = "geheim";
    $cookie_value = "Deze informatie is zeeer geheim";
    setcookie($cookie_name, $cookie_value, time() + (86400 * 30), "/"); // 86400 = 1 day
}
?>
<?php include("../layout/header.php"); ?>
<?php include("nav.php");?>

<b>Geheim cookie is gezet!!</b>

<?php
print_r($_COOKIE);
include("../layout/footer.php");
?>

