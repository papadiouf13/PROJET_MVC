<?php
if (!is_admin()) header("location:" . WEB_ROUTE . "?controller=securityController&view=connexion");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "accueil") {
            require_once(ROUTE_DIR . 'vue/Admin/Admin.html.php');
        } elseif ($_GET['view'] == "listequestion") {
            $users = get_list_user();
            require_once(ROUTE_DIR . 'vue/Admin/Listequestion.html.php');
        } elseif ($_GET['view'] == "creerquestion") {
            require_once(ROUTE_DIR . 'vue/Admin/creerquestion.html.php');
        } elseif ($_GET['view'] == "list.user") {
            /* pagination(); */
            $users = get_list_user();
            require_once(ROUTE_DIR . 'vue/Admin/affiche_user.html.php');
        } elseif ($_GET['view'] == "list.Admin") {
            $users = get_list_user();
            require_once(ROUTE_DIR . 'vue/Admin/ListeAdmin.html.php');
        } elseif ($_GET['view'] == "inscriptionAdmin") {
            require_once(ROUTE_DIR . 'vue/Admin/creeradmin.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "inscription") {
            /* var_dump($_POST);die; */
            inscriptionAdmin($_POST, $_FILES);
        } elseif ($_POST['action'] == "CREER") {
            unset($_POST["controller"]);
            unset($_POST["action"]);
            Questionnaire($_POST);
        }
    }
}





function Questionnaire($questionnaire):void{
    $arrayError=array();
    extract($questionnaire);

    $questionnaire['id'] = uniqid();
    AddQuestion($questionnaire);
    /* var_dump($questionnaire); die; */
    /* header("location:" . WEB_ROUTE . "?controller=AdminController&view=listequestion"); */



    valid_input($arrayError, $quest, 'question');
    valid_input($arrayError, $typedequestion, 'typeQuestion');
    valid_input($arrayError, $reponse, 'Reponse');
    valid_input($arrayError, $numb, 'numero');

    if (empty($arrayError)) {
        if ($result != null) {
            $_SESSION['questionAJOUTER'] = $result;}

        if ($data['id'] != "") {

            modificationQuestion($data);
        } else {

            $newquestion = [
                "question" => $quest,
                "typeQuestion" => $typedequestion,
                "Reponse" => $reponse,
                "numero" => $numb,
                "id" => uniqid()

            ];
        }
        
        AddQuestion($Question);
        $_SESSION['questionAJOUTER']=$Question;
        header("location:" . WEB_ROUTE . "?controller=AdminController&view=listequestion");
    } else {
        header("location:" . WEB_ROUTE . "?controller=AdminController&view=creerquestion");
    }
}




/* LES FONCTIONS */

function inscriptionAdmin($inscription, $files)
{

    $arrayError = [];
    extract($inscription);

    valid_champ_user($arrayError, $nom, 'nom');
    valid_champ_user($arrayError, $prenom, 'prenom');
    valid_champ_user($arrayError, $email, 'email');
    valid_champ_user($arrayError, $password, 'password');
    valid_champ_user($arrayError, $confirmPassword, 'confirmPassword');
    validation_password($password, 'password', $arrayError);
    if ($password != $confirmPassword) {
        $arrayError['confirmPassword'] = 'Les deux password ne sont pas identiques';
    }
    if (empty($arrayError)) {

        if (to_uploads($files)) {
            $data['fileToUpload'] = $files['fileToUpload']['name'];
        }
        if ($data['id'] != "") {

            modification($data);
        } else {

            $user = [
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "password" => $password,
                "id" => uniqid(),
                "role" => 'ROLE_ADMIN',
                "avatar" =>  $files['fileToUpload']['name']
            ];
        }

        addUser($user);
        $_SESSION['userConnected'] = $user;
        header("location:" . WEB_ROUTE . "?controller=AdminController&view=listequestion");
    } else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:" . WEB_ROUTE . "?controller=AdminController&view=inscriptionAdmin");
    }
}
