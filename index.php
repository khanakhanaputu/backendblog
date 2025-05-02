<?php
include_once("core/ezSyntax.php");
include_once("router.php");
include_once("core/middleware.php");

$Router = new Router();

// Routing auto bos wkwkwkwkwk

// ngecek url ada /api atau ngga
if (isset($_SERVER['REQUEST_URI']) && strpos($_SERVER['REQUEST_URI'], '/api') === 0) {
    // kalo ada /api tampiannya cuman jsone response
    header('Content-Type: application/json; charset=UTF-8');
    echo $Router->run();  // ngejalanin router api
} else {
    // kalo nggaada /api nampilih struktur html untuk view nya
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
    <?php
}
?>
