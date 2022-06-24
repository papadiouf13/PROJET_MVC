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
    <div class="Grandentourage">
        <div class="petitEntourage">
            <div class="nbreAdmin">
                <h3>Nombre d'admin </h3>
                <i class="fas fa-user-lock icone"></i>
                <p class="chiffre1"><?= $cptadmin ?></p>

            </div>
        </div>
        <div class="petitEntourage">
            <div class="nbrejoueur">
                <h3>Nombre de joueur </h3>
                <i class="fas fa-users icone"></i> 
                <p class="chiffre2"><?= $cptjoueur ?></p>
            </div>
        </div>
        <div class="petitEntourage">
            <div class="nbrequestion">
                <h3>Nombre de question</h3>
                <i class="fa fa-question icone" aria-hidden="true"></i>
                <p class="chiffre3"><?= $cptquestion ?></p>

            </div>
        </div>
    </div>


</div>

<style>
    .RECTANGLE {

        text-align: center;
        border: 2px solid whitesmoke;
        margin-left: 5%;
        width: 80%;
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

    .nbreAdmin {
        color: blue;
        font-size: 26px;
    }

    .nbrejoueur {
        color: blue;
        font-size: 25px;
    }

    .nbrequestion {
        color: blue;
        font-size: 25px;
    }

    .icone {
        color: red;
    }

    .Grandentourage {
        display: flex;
        justify-content: space-around;
        margin-top: 2%;
    }

    .petitEntourage {
        width: 30%;
        height: 70vh;
        background-color: wheat;
        box-shadow: 5px 5px 3px #3792E5;
    }
    .chiffre1{
        color: #3792E5;
        font-size: 35px;
        font-family: bold;
    }
    .chiffre2{
        color: #3792E5;
        font-size: 35px;
    }
    .chiffre3{
        color: #3792E5;
        font-size: 36px;
    }
</style>