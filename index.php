<?php
include_once("core/ezSyntax.php");
include_once("router.php");

$Router = new Router();

// Routing auto bos wkwkwkwkwk

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/css/output.css">

</head>
<body class="font-poppins">
  <?php
    $Router->run();
  ?>
</body>
</html>
