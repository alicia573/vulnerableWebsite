<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 04-12-17
 * Time: 16:21
 */

//Database Connection
$link = mysqli_connect("localhost:3306", "alicia", "music", "vulnerable_db");

//Check connection
if (mysqli_connect_errno()) {
    printf("Connect failed: %s\n", mysqli_connect_error());
    exit();
}

//Definieer query op basis van userinput (onveilig)
$query = "SELECT * FROM userplainpasswords WHERE name = '".$_POST["voornaam"]."' and password = '".$_POST["wachtwoord"]."'";

//Eventuele errors worden weergegeven
$result = mysqli_query($link, $query);
if (!mysqli_query($link, $query)) {
   // printf("Errormessage: %s\n", mysqli_error($link));
}


include("../layout/header.php");
?>

<h1>MySQL Injection</h1>
<ul><li><a href="index.php">MySQL Injection home</a></li></ul>

<?php
//Optioneel de query weergeven:
echo "<p>Query: ".$query."</p>";

//Geef resultaten uit database weer
while($row = mysqli_fetch_array($result, MYSQLI_NUM)) {
    print "<h3>Welkom ".$row[1]
    //.$row[0]." ".$row[2]
    ."</h3><br>";
}

include("../layout/footer.php");
?>