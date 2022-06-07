<?php
function open_session() {
    if (session_status()== PHP_SESSION_NONE) {
        session_start();
    }
}

function destroy_session(){
    session_destroy();
}

function is_user_connect() {
    return isset($_SESSION['userConnected']);
}

function is_admin() {
    if (is_user_connect()) {
        $user = $_SESSION['userConnected'];
        return isset($user["role"]) && $user["role"]=="ROLE_ADMIN";
    }

    return false;
}

?>
