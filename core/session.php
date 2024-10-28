<?php
function check_session() {
    session_start();
    if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
        header("Location: ../views/auth/login.php");
        exit();
    }
}

function get_logged_in_user_id() {
    return isset($_SESSION['user_id']) ? $_SESSION['user_id'] : null;
}
