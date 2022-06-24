<?php
if (!is_admin()) header("location:" . WEB_ROUTE . "?controller=securityController&view=connexion");
if ($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "accueil") {
            require_once(ROUTE_DIR . 'vue/Admin/Admin.html.php');
        } elseif ($_GET['view'] == "tableaubord") {
            require_once(ROUTE_DIR . 'vue/Admin/tableaubord.html.php');
        } elseif ($_GET['view'] == "listequestion") {
            $page = 1;
            if (isset($_GET["page"])) {
                $page = intval($_GET["page"]);
            }
            $Questions = get_list_question();

            $totalPage = countpage(5, $Questions);
            $Questions = getListToDisplay($Questions, $page, 5);

            require_once(ROUTE_DIR . 'vue/Admin/Listequestion.html.php');
        } elseif ($_GET['view'] == "creerquestion") {
            require_once(ROUTE_DIR . 'vue/Admin/creerquestion.html.php');
        } elseif ($_GET['view'] == "list.user") {
            $page = 1;
            if (isset($_GET["page"])) {
                $page = intval($_GET["page"]);
            }
            $users = utilisateur("ROLE_JOUEUR");

            $totalPage = countpage(5, $users);
            $users = getListToDisplay($users, $page, 5);
            require_once(ROUTE_DIR . 'vue/Admin/affiche_user.html.php');
        } elseif ($_GET['view'] == "list.Admin") {
            $page = 1;
            if (isset($_GET["page"])) {
                $page = intval($_GET["page"]);
            }
            $users = utilisateur("ROLE_ADMIN");

            $totalPage = countpage(5, $users);
            $users = getListToDisplay($users, $page, 5);
            require_once(ROUTE_DIR . 'vue/Admin/ListeAdmin.html.php');
        } elseif ($_GET['view'] == "inscriptionAdmin") {
            require_once(ROUTE_DIR . 'vue/Admin/creeradmin.html.php');
        } elseif ($_GET['view'] == "deletequest") {
            if (isset($_GET['id'])) {
                deleteQuestion($_GET['id']);
                header("location:" . WEB_ROUTE . "?controller=AdminController&view=listequestion");
            }
        }/* elseif ($_GET['view'] == "creerquestion" || $_GET['view'] == "edit") {
            if(isset($_GET["id"])){
                
                $_SESSION['user']= get_user_by_id($_GET["id"]);
            }
            require_once(ROUTE_DIR.'vue/Admin/creerquestion.html.php');
        } */ elseif ($_GET['view'] == 'edit') {
            $Question = get_question_by_id($_GET["id"]);
            require(ROUTE_DIR . 'vue/Admin/creerquestion.html.php');
        } elseif ($_GET['view'] == "inscription" || $_GET['view'] == "editAdmin") {


            if (isset($_GET["id"])) {
                $user = get_user_by_id($_GET["id"]);
            }
            require_once(ROUTE_DIR . 'vue/Admin/creeradmin.html.php');
        }
    }
} elseif ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['action'])) {
        if ($_POST['action'] == "inscriptionAdmin") {
            /* var_dump($_POST);die; */
            inscriptionAdmin($_POST, $_FILES);
        } elseif ($_POST['action'] == "CREER") {
            unset($_POST["controller"]);
            unset($_POST["action"]);
            Questionnaire($_POST);
        } else  if ($_POST['action'] == "editAdmin") {
            /* var_dump($_POST);die; */
            inscriptionAdmin($_POST, $_FILES);
        }
    }
}





function Questionnaire($questionnaire):void{
    $arrayError=array();
    extract($questionnaire);
    $newquestion= [];
 
    valid_input($arrayError, $question, 'question');
    type_reponse($typeQuestion,'typeQuestion',$arrayError,);
    reponse($reponse,'Reponse', $arrayError);
    valid_point($arrayError, $numero,'numero');
     if (count($arrayError) == 0) {
 
        if ($questionnaire['id'] != "") {
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
                "id" => $id
            ];
            modificationQuestion($newquestion);
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
      
       
      
        $_SESSION['questionAJOUTER']=$Question;
        header("location:" . WEB_ROUTE . "?controller=AdminController&view=listequestion");
    } else {
        $_SESSION['arrayError'] = $arrayError;
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
            $inscription['fileToUpload'] = $files['fileToUpload']['name'];
        }
        if ($inscription['id'] != "") {
            $user = [
                "nom" => $nom,
                "prenom" => $prenom,
                "email" => $email,
                "password" => $password,
                "id" => $id,
                "role" => 'ROLE_ADMIN',
                "avatar" =>  $files['fileToUpload']['name']
            ];
            modification($user);
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
            addUser($user);
        }

        /* $_SESSION['userconnec'] = $user; */
        header("location:" . WEB_ROUTE . "?controller=AdminController&view=list.Admin");
    } else {
        $_SESSION['arrayError'] = $arrayError;
        header("location:" . WEB_ROUTE . "?controller=AdminController&view=inscriptionAdmin");
    }
}
