<?php
if (!is_admin()) header("location:" . WEB_ROUTE . "?controller=securityController&view=connexion");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "accueil") {
            require_once(ROUTE_DIR . 'vue/Admin/Admin.html.php');
        } elseif ($_GET['view'] == "listequestion") {
            $Questions = get_list_question();
            require_once(ROUTE_DIR . 'vue/Admin/Listequestion.html.php');
        } elseif ($_GET['view'] == "creerquestion") {
            require_once(ROUTE_DIR . 'vue/Admin/creerquestion.html.php');
        } elseif ($_GET['view'] == "list.user") {
            /* $totalPage = countpage(5, $users);
            $users = getListToDisplay($users, 1, 5); */
            $users = get_list_user();
            require_once(ROUTE_DIR . 'vue/Admin/affiche_user.html.php');
        } elseif ($_GET['view'] == "list.Admin") {
            /* $totalPage=countpage(5, $users);
          $users= getListToDisplay($users, 1 , 4); */
            $users = get_list_user();
            /* $user=get_user_by_id($_GET['id']); */
            require_once(ROUTE_DIR . 'vue/Admin/ListeAdmin.html.php');
        } elseif ($_GET['view'] == "inscriptionAdmin") {
            require_once(ROUTE_DIR . 'vue/Admin/creeradmin.html.php');
        }elseif ($_GET['view'] == "deletequest") {
            if(isset($_GET['id'])){
                deleteQuestion($_GET['id']);
                header("location:".WEB_ROUTE."?controller=AdminController&view=listequestion");
            }
        }/* elseif ($_GET['view'] == "creerquestion" || $_GET['view'] == "edit") {
            if(isset($_GET["id"])){
                
                $_SESSION['user']= get_user_by_id($_GET["id"]);
            }
            require_once(ROUTE_DIR.'vue/Admin/creerquestion.html.php');
        } */elseif($_GET['view'] == 'edit'){
            $_SESSION['id']=$_GET['id'];
            $id = $_SESSION['id'];
            $question = modif_question_id($id);
            require(ROUTE_DIR.'vue/Admin/creerquestion.html.php');
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





function Questionnaire($questionnaire): void
{
    $arrayError = array();
    extract($questionnaire);
    $newquestion = [];
    /* var_dump($questionnaire);
    die; */
    $questionnaire['id'] = uniqid();
    /* AddQuestion($questionnaire); */
    /* var_dump($questionnaire); die; */
    /* header("location:" . WEB_ROUTE . "?controller=AdminController&view=listequestion"); */



    valid_input($arrayError, $question, 'question');
   type_reponse($typeQuestion, 'typeQuestion',$arrayError );
    reponse($reponse, 'Reponse',$arrayError );
    valid_point($arrayError , $numero, 'numero' );

    if (empty($arrayError)) {
        if ($result != null) {
            $_SESSION['questionAJOUTER'] = $result;
        }

        if ($data['id'] != "") {

            modificationQuestion($data);
        } else {

            $newquestion = [
                "question" => $question,
                "typeQuestion" => $typeQuestion,
                "Reponse" => 
                    $reponse
                ,
                "bonneReponse" => 
                    $bonneReponse
                ,
                "numero" => $numero,
                "id" => uniqid()

            ];
            AddQuestion($newquestion);
        }

        $_SESSION['questionAJOUTER'] = $Question;
        header("location:" . WEB_ROUTE . "?controller=AdminController&view=listequestion");
    } else {
        $_SESSION['arrayError']=$arrayError;
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
        /* $_SESSION['userconnec'] = $user; */
        header("location:" . WEB_ROUTE . "?controller=AdminController&view=list.Admin");
    } else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:" . WEB_ROUTE . "?controller=AdminController&view=inscriptionAdmin");
    }
}
