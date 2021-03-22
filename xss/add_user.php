<?php

/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 06-12-17
 * Time: 13:36
 */
//session_start();

if(isset($_POST['knop'])) {

    /*
     * Onveilige variant
     *
    extract($_POST);
    $link = mysqli_connect("localhost:3306", "pipo", "declown", "vulnerable_db");
    $query = "INSERT into user (name, password) VALUES ('".$naam."' , '".$password."')";
    if (!mysqli_query($link, $query)) {
        printf("Errormessage: %s\n", mysqli_error($link));
    }
    */

    /*
     * PDO variant
     */
    $db   = 'vulnerable_db';
    $user = 'pipo';
    $pass = 'declown';
    $charset = 'utf8mb4';
    $opt = [
        PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION, //Zorg ervoor dat je foutmeldingen netjes kan afhandelen
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        PDO::ATTR_EMULATE_PREPARES   => false, //data an query worden apart naar de server verzonden
    ];
    
    try {
        $dsn = "mysql:host=$host;dbname=$db;charset=$charset";
        $dbh = new PDO($dsn, $user, $pass, $opt);
    }
    catch (PDOException $e) {
        error_log('PDO Exception: '.$e->getMessage());
        die('PDO says no.');
    }

    $sth = $dbh->prepare('INSERT into user (name, password) VALUES (:naam, :$password)');
    $sth->bindParam(':naam', $naam, PDO::PARAM_STR, 45);
    $sth->bindParam(':password', $password, PDO::PARAM_STR, 500);
    $sth->execute();
}
include("../layout/header.php");
include("nav.php");
?>

<h3>Gebruiker toevoegen</h3>

<form action="#" method="POST">
    Naam: <input type="text" name="naam"><br>
    Wachtwoord: <input type="text" name="password"><br>
    <input type="submit" name="knop">
</form>
<?php include("../layout/footer.php"); ?>
