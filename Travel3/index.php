<?php
session_start();

?>
<?php 
    if (!isset($_SESSION["username"]))
    {
        $_SESSION["username"] = "";
    }
?>
<?php include "header.php" ?>
<body>
    <?php include "menu.php" ?>
    <?php include "body.php" ?>
</body>
<?php include "footer.php" ?>