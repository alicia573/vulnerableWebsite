<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 07-12-17
 * Time: 13:18
 */
?>

<script>
//console.log(<?php print_r($_GET['cookie']); ?>);
</script>

<?php
extract($_GET);
if(!isset($cookie)) {
    $cookie = "testje";
}
$link = mysqli_connect("localhost:3306", "pipo", "declown", "vulnerable_db");
$query = "INSERT into cookie (time , cookievalue) VALUES (now(),'".$cookie."')";
?>

<script>
console.log("<?php echo $query; ?>");
</script>


<?php
if (!mysqli_query($link, $query)) {
    printf("Errormessage: %s\n", mysqli_error($link));
}
?>
