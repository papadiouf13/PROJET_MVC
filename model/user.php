<?php 
function addUser(array $user) {
    $users = get_file_content();
    if (!isset($users)) {
        $users = [];
    }

    array_push($users, $user);
    ajouter_fichier($users);
}

function get_list_user() {
    $users = get_file_content();
    if (!isset($users)) {
        $users = [];
    }

    return $users;
}

function get_user_by_id(string $id) {
    $users = get_list_user();
    foreach ($users as $key => $value) {
        if($value['id'] == $id) {

            return $value;
        }
    }
}

function get_file_content() {
    $json = file_get_contents(ROUTE_DIR.'data/user.data.json');
    return json_decode($json, true);
}

function ajouter_fichier(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/user.data.json', $json);
}


function login_password_exist($login, $password) {
    $users = get_file_content();

    foreach ($users as $key => $value) {
        if ($value['email'] == $login && $value['password'] == $password ) {
            return $value;
        }
    }

    return null;
}

function delete(string $id):bool{
    $data = get_file_content();
    $tab=[];
    $yes=false;
    foreach ($data as $value) {
        if ($value['id'] == $id) {
            $yes = true;
        }else{
            $tab [] = $value;
        }
    }
    if($yes){
        ajouter_fichier($tab);
    }
    return $yes;
     
}
function deleteQuestion(string $id):bool{
    $data = get_file_contentQuestion();
    $tab=[];
    $yes=false;
    foreach ($data as $value) {
        if ($value['id'] == $id) {
            $yes = true;
        }else{
            $tab [] = $value;
        }
    }
    if($yes){
        ajouter_Question($tab);
    }
    return $yes;
     
}

function modification(array $user){
    $modif = get_file_content();
    foreach ($modif as $key => $value) {
        if($value['id'] == $user['id'] || 'role' == "ROLE_ADMIN"){
            $modif[$key] = $user;
        }
    }
    ajouter_fichier($modif);
}
function validation_password( $valeur, string $key , array &$arrayError, $min = 3, $max = 10){
    if (est_vide($valeur)) {
        $arrayError[$key] = "Password est obligatoire";
    }elseif ((strlen($valeur) < $min)||(strlen($valeur) > $max)) {
        $arrayError[$key] = "Password doit être compris entre $min et $max";
    }
}
                        /*FONCTIONS POUR LES QUESTIONS */     



function AddQuestion(array $Question) {
    $Questions = get_file_contentQuestion();
    if (!isset($Questions)) {
        $Questions = [];
    }
    array_push($Questions, $Question);
    ajouter_Question($Questions);
}

function get_list_question() {
    $Questions = get_file_contentQuestion();
    if (!isset($Questions)) {
        $Questions = [];
    }

    return $Questions;
}

function get_question_by_id(string $id) {
    $Questions = get_list_question();
    foreach ($Questions as $key => $value) {
        if($value['id'] == $id) {
            return $value;
        }
    }
}

function get_file_contentQuestion() {
    $json = file_get_contents(ROUTE_DIR.'data/question.data.json');
    return json_decode($json, true);
}

function ajouter_Question(array $array) {
    $json = json_encode($array);
    file_put_contents(ROUTE_DIR.'data/question.data.json', $json);
}

function modificationQuestion(array $Question){
    $modifQuestion = get_file_contentQuestion();
    foreach ($modifQuestion as $key => $value) {
        if($value['id'] == $Question['id']){
            $modifQuestion[$key] = $Question;
        }
    }
    ajouter_Question($modifQuestion);
}

function modif_question_id( $id):array{
    $json =file_get_contents(ROUTE_DIR.'data/question.data.json');
    $arrayQuest = json_decode($json , true);
    foreach($arrayQuest as $Question ){
      if ($Question ['id'] == $id){
        return $Question;
      }
    }
    return[];
  }

  function modif_question(array $new_question){
    $json = file_get_contents(ROUTE_DIR.'data/question.data.json');
    $arrayQuest = json_decode($json , true);
    foreach ($arrayQuest as $key => $old_question  ) {
        if ($old_question['id'] == $new_question['id']){
          $arrayQuest[$key] = $new_question;
        }
      }
       $json = json_encode($arrayQuest);
        file_put_contents(ROUTE_DIR.'data/question.data.json' , $json);
    }

/* PAGINATION */

function countpage(int $taillePage, array $arrayPersonne) {
    $nbrePage = intdiv(count($arrayPersonne), $taillePage);
    if (count($arrayPersonne)%$taillePage != 0) {
        $nbrePage = $nbrePage + 1;
    }
    return $nbrePage;
}

function getListToDisplay(array $arrayPersonne, $page, $taillePage) {
    $indiceDepart = ($taillePage*$page) - $taillePage;
    $indiceArriver = $indiceDepart + $taillePage - 1;
    $arrayPaged = [];

    for ($i=$indiceDepart; $i< count($arrayPersonne); $i++){
        if ($indiceArriver < count($arrayPersonne)) {
            array_push($arrayPaged, $arrayPersonne[$i]);
            if ($i == $indiceArriver) {
                break;
            }
        }else {
            array_push($arrayPaged, $arrayPersonne[$i]);
        }
    }
    return $arrayPaged;
}
/* $count=$pdo->prepare("select count(id) as cpt from article");
$count->setFetchMode(PDO::FETCH_ASSOC);
$count->execute();
$tcount=$count->fetchAll; */

/* function pagination(){
    $nbr_element_par_page=5;
    $nbr_de_page=ceil($tcount[0]["cpt"]/$nbr_element_par_page);
    echo $nbr_de_page;
} */