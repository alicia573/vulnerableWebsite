<?php
$host='127.0.0.1';
$db='vulnerable_db';
$user='alicia';
$pass='music';
$charset='utf8mb4';
$opt=[
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try{
    $dsn="mysql:host=$host;dbname=$db;charset=$charset";
    $dbh= new PDO($dsn, $user, $pass, $opt);
}
catch(PDOException $e){
    error_log('PDO Exception:'.$e->getMessage());
    die('PDO says no.');
}

$sth= $dbh->prepare('SELECT name, password from userplainpasswords where name = :voornaam and password = :password');
$sth->bindParam(':voornaam', $_POST["voornaam"], PDO::PARAM_STR, 45);
$sth->bindParam(':password', $_POST["password"], PDO::PARAM_STR, 500);
$sth->execute();
$result = $sth->fetch();


include("../layout/header.php")
?>


<h1>MYSQL Injection</h1>
<ul><li><a href="index.php">MySQL Injection Home</a></li></ul>
<?php
if($result){
    echo"Welkom".$result['name'];
}
include("../layout/footer.php");

