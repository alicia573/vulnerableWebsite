<?php
/**
 * Created by PhpStorm.
 * User: janjaap
 * Date: 04-12-17
 * Time: 15:33
 */
?>
<?php include('../layout/header.php'); ?>
<h1>OWASP Top 10</h1>
    <ul>
        <li><a href="../mysql_injection/index.php">MySQL Injection</a></li>
        <li><a href="../file_inclusion/index.php?file=included_file.php">File inclusion</a></li>
        <li><a href="../session_management/index.php">Session management</a></li>
        <li><a href="../xss/index.php">Xss</a></li>
        <li><a href="../direct_obj_reference/index.php">Direct Object Reference</a></li>
        <li><a href="../db_misconfig/index.php">Configuratie missers</a></li>
        <li><a href="phpinfo.php">Configuratie PHP</a></li>
    </ul>
<?php include('../layout/footer.php'); ?>

