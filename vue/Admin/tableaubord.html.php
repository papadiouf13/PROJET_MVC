<?php require_once(ROUTE_DIR . 'vue/inc/menu.html.php'); ?>

<div class="RECTANGLE">



    <div class="TABLEAUBORD">
        <h2 class="titreTbord">TABLEAU DE BORD</h2>
    </div>
    <?php
    $json = file_get_contents(ROUTE_DIR . 'data/user.data.json');
    $arrayUser = json_decode($json, true);

    $json = file_get_contents(ROUTE_DIR . 'data/question.data.json');
    $arrayQuestion = json_decode($json, true);

    $cptadmin =  $cptjoueur = $cptquestion = 0;

    foreach ($arrayUser as $user) {

        if ($user['role'] == 'ROLE_ADMIN') {
            $cptadmin++;
        } elseif ($user['role'] == 'ROLE_JOUEUR') {
            $cptjoueur++;
        }
    }
    foreach ($arrayQuestion as $question) {

        if ($question['question']) {
            $cptquestion++;
        }
    }
    ?>




    <div class="nbreAdmin">
    <h3>Nombre d'admin <i class="fas fa-user-lock icone"></i></h3>
    <p class="mr-2"><?= $cptadmin ?></p>
    
    </div>


    <div class="nbrejoueur">
    <h3>Nombre de joueur <i class="fas fa-users icone"></i>  </h3>
    <p class="mr-4"><?= $cptjoueur ?></p>
    </div>


    <div class="nbrequestion">
    <h3>Nombre de question  <i class="fa fa-question icone" aria-hidden="true"></i></h3>
    <p class="mr-5"><?= $cptquestion ?></p>
   
    </div>






</div>

<style>
    .RECTANGLE {
        box-shadow: 5px 5px 3px #3792E5;
        text-align: center;
        border: 2px solid whitesmoke;
        margin-left: 20%;
        width: 30%;
       /*  background-image: url(images/images.jpeg)
        ; */
    }

    .TABLEAUBORD {
        border: 2px solid wheat;
        background: #3792E5;
    }

    .titreTbord {
        text-align: center;
        color: whitesmoke;
    }
    .nbreAdmin{
        color: blue;
        font-size: 25px;
    }
    .nbrejoueur{
        color: blue;
        font-size: 25px;
    }
    .nbrequestion{
        color: blue;
        font-size: 25px;
    }
    .icone{
        color: goldenrod;
    }
</style>