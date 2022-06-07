<?php

  
    if (isset($_REQUEST['controller'])) {
        if($_REQUEST['controller'] == "AdminController") {
            require_once(ROUTE_DIR.'controller/AdminController.php');
        }elseif ($_REQUEST['controller'] == "JoueurController") {
            require_once(ROUTE_DIR.'controller/JoueurController.php');
        }elseif ($_REQUEST['controller'] == "userController") {
            require_once(ROUTE_DIR.'controller/userController.php');
        }
         elseif ($_REQUEST['controller'] == "securityController") { 
            require_once(ROUTE_DIR.'controller/securityController.php');
        }
    }else {
        require_once(ROUTE_DIR.'vue/security/connexion.html.php');
    } 



?>
