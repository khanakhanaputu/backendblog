<?php
function cookie() {
    echo "Selamat datang di halaman cookie.<br/>";
    echo "Ini halaman cookie.<br/>";

    setcookie("username","khana", time() + 3600,"/");
    echo $_COOKIE['username'];
}
?>