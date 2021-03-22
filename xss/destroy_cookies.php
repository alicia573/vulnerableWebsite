<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 06-12-17
 * Time: 14:23
 */


if (isset($_COOKIE['geheim'])) {
    unset($_COOKIE['geheim']);
    setcookie('geheim', '', time() - 3600, '/'); // empty value and old timestamp
}
include("../layout/header.php");
include("nav.php");
?>

<b>Cookies zijn verwijderd</b>
<?php print_r($_COOKIE); ?>
<?php include("../layout/footer.php"); ?>
