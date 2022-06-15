<?php

if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "connexion") {
            require_once(ROUTE_DIR . 'vue/security/connexion.html.php');
        } elseif ($_GET['view'] == "inscription") {
            require_once(ROUTE_DIR . 'vue/security/inscription.html.php');
        } elseif ($_GET['view'] == "connexion") {
            require_once(ROUTE_DIR . 'vue/security/connexion.html.php');
        } elseif ($_GET['view'] == "deconnexion") {
            destroy_session();
            require_once(ROUTE_DIR . 'vue/security/connexion.html.php');
        }elseif ($_GET['view'] == "delete") {
            if(isset($_GET['id'])){
                delete($_GET['id']);
                header("location:".WEB_ROUTE."?controller=AdminController&view=list.user");
            }
        }elseif ($_GET['view'] == "supprimer") {
            if(isset($_GET['id'])){
                delete($_GET['id']);
                header("location:".WEB_ROUTE."?controller=AdminController&view=list.Admin");
            }
        }elseif ($_GET['view'] == "inscription" || $_GET['view'] == "edit") {
            if(isset($_GET["id"])){
                
                $_SESSION['user']= get_user_by_id($_GET["id"]);
            }
            require_once(ROUTE_DIR.'vue/Admin/creeradmin.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (isset($_POST['action'])) {
        if ($_POST['action'] == "connexion") {
            connexion($_POST);
        } elseif ($_POST['action'] == "inscription") {
            
            inscription($_POST, $_FILES);
        }
    }
}


function connexion($data)
{
    $arrayError = [];
    extract($data);
    valid_champ_user($arrayError, $email, 'email');
    valid_champ_user($arrayError, $password, 'password');

    if (empty($arrayError)) {
        $result = login_password_exist($email, $password);

        if ($result != null) {

            $_SESSION['userConnected'] = $result;
            header("location:" . WEB_ROUTE . "?controller=AdminController&view=accueil");

            if ($_SESSION['userConnected']['role'] == "ROLE_JOUEUR") {
                header("location:" . WEB_ROUTE . "?controller=JoueurController&view=accueil");
            } else {
                header("location:" . WEB_ROUTE . "?controller=AdminController&view=accueil");
            }
        } else {
            $arrayError['error'] = "email ou mot de passe incorrect";
            $_SESSION['arrayError'] = $arrayError;
            header("location:" . WEB_ROUTE . "?controller=securityController&view=connexion");
        }
    } else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:" . WEB_ROUTE . "?controller=securityController&view=connexion");
    }
}
function deconnexion()
{
    unset($_SESSION['userConnected']);
}

function inscription($inscription, $files)
{

    $arrayError = [];
    extract($inscription);

    valid_champ_user($arrayError, $nom, 'nom');
    valid_champ_user($arrayError, $prenom, 'prenom');
    valid_champ_user($arrayError, $telephone, 'telephone');
    valide_email($arrayError, $email, 'email');
    valid_champ_user($arrayError, $password, 'password');
    valid_champ_user($arrayError, $confirmPassword, 'confirmPassword');
    validation_password($password, 'password', $arrayError);
    if ($password != $confirmPassword) {
        $arrayError['confirmPassword'] = 'Les deux password ne sont pas identiques';
    }
    if (empty($arrayError)) {

        if ( to_uploads($files)) {
            $data['fileToUpload'] = $files['fileToUpload']['name'];
        }
        if ($data['id'] != "") {

            modification($data);
        } else {

            $user = [
                "nom" => $nom,
                "prenom" => $prenom,
                "telephone" => $telephone,
                "email" => $email,
                "password" => $password,
                "id" => uniqid(),
                "role" => 'ROLE_JOUEUR',
                "avatar" =>  $files['fileToUpload']['name']
            ];
        }

        addUser($user);
        $_SESSION['userConnected'] = $user;
        header("location:" . WEB_ROUTE . "?controller=securityController&view=connexion");
    } else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:" . WEB_ROUTE . "?controller=securityController&view=inscription");
    }
}
