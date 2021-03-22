<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 06-12-17
 * Time: 12:43
 */

session_start();

include("../layout/header.php");
include("nav.php");

//checkPermissions();
checkPermissionsSafe();
function checkPermissionsSafe() {
    //echo "session login, remote addr en http user agent: "
    //.$_SESSION['login']. ", ".$_SESSION['REMOTE_ADDR'].", "
    //.$_SESSION['HTTP_USER_AGENT']."<br>";
    if(isset($_SESSION["login"])
        && $_SESSION['REMOTE_ADDR']== getenv('REMOTE_ADDR')
        && $_SESSION['HTTP_USER_AGENT']== $_SERVER['HTTP_USER_AGENT'])
   {
        echo "<b>Ja, je mag deze beveiligde pagina bekijken!!</b>";
    } else {
        echo "<b>Nee, je hebt geen toegang!!!</b>";
    }
}


function checkPermissions() {
    if(isset($_SESSION["login"])) {
        echo "<b>Ja, je mag deze beveiligde pagina bekijken!!</b>";
    } else {
        echo "<b>Nee, je hebt geen toegang!!!</b>";
    }
}
include("../layout/footer.php");
