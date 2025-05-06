<?php
$middleware = new Middleware();
$middleware->ifAuth();
function home(){
    echo "<h1>Home NIGGA</h1>";
}