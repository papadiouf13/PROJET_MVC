<?php
function est_vide($valeur) {
    return empty($valeur);
}

function est_entier($valeur) {
    return is_numeric($valeur);
}

function valid_champ(array &$arrayError, $str, string $key) {
    $valeur = str_replace(" ","",$str);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Champ obligatoire";
    } else if (!est_entier($valeur)) {
        $arrayError[$key] = "Veuillez saisir un nombre";
    }
}

function valid_champ_user(array &$arrayError, $valeur, string $key) {
    $valeur = str_replace(" ","",$valeur);
    if (est_vide($valeur)) {
        $arrayError[$key] = "Champ obligatoire";
    }
}
function est_email($valeur):bool{
    if (filter_var($valeur ,FILTER_VALIDATE_EMAIL)) {
        return true;
    }else {
        return false;
    }
}

function valide_email(array &$arrayError, $valeur , string $key ):void{
    if (est_vide($valeur)) {
        $arrayError[$key]= 'Champ obligatoire';
    }elseif (!est_email($valeur)) {
        $arrayError[$key]= 'saisir un email valide (exemple@gmail.com)';
    }
}

/* FONCTION VALIDATOR POUR LES QUESTIONS */
function type_reponse( $valeur, string  $key,  &$arrayError){
    if (est_vide($valeur)) {
        $arrayError[$key] = "Veuillez donner le type de réponse";
    }   
}
function reponse( $valeur, string  $key,  &$arrayError){
    if(est_vide($valeur)) {
        $arrayError[$key] = "Veuillez donner la réponse";
    }   
}

function valid_input(array &$arrayError, $str, string $key){
    $valeur = str_replace(" ","",$str);
    if (empty($valeur)) {
        $arrayError[$key] = "Ce champ est obligatoire ";
    }
}

function valid_point(array &$arrayError,$valeur,string $key){
    if (empty($valeur)) {
        $arrayError[$key] = "Ce champ est obligatoire ";
    }elseif ($valeur<=0) {
        $arrayError[$key] = "Veillez saisir un nombre positif";
    }
}


function valid_nbr_reponse($valeur,string $key,array &$arrayError){
    if (empty($valeur)) {
        $arrayError[$key] = "Ce champ est obligatoire ";
    }elseif ($valeur<=0) {
        $arrayError[$key] = "Veillez saisir un nombre positif";
    }
}
?>
