<?php
    require_once 'common.php';

    // 1) Remove all Session Variables registered so far
    $_SESSION = "";

    // 2) Destroying the current session
    session_destroy();

    // 3) Redirect user to before_home.html
    header('Location: before_home.html');
    exit();
?>

