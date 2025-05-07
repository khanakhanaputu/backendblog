<?php
$middleware = new Middleware();
$middleware->ifAuth();
function home(){
foreach ($_SESSION['user_data'] as $data) {
    echo 'username ' . $data['username'].'<br>';
    echo 'password ' . $data['password'] .'<br>';
    echo 'id ' . $data['id'] .'<br>';
}
?>

    <form action="" method="post">
        <button type="submit" name="logout">Log out</button>
    </form>
<?php }

if (isset($_POST['logout'])) {
    session_destroy();
}