<?php 
$arrayError = array();

if (isset($_SESSION['arrayError'])) {
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJET QUIZZ</title>
</head>

<body>
    <?php require_once(ROUTE_DIR . 'vue/inc/menu.html.php'); ?>
    <div class="ajoutAdmin">
        <div class="formAjoutAdmin">
            <div class="titreFormAdmin">
                <h2 class="hh2">S’inscrire pour proposer des quizz</h2>
            </div>
            <div class="formInscritAdmin">
                <form method="POST" action="<?= WEB_ROUTE ?>" enctype="multipart/form-data">
                    <input type="hidden" name="controller" value="AdminController">
                    <input type="hidden" name="action" value="<?= isset($user['id']) ? 'editAdmin' : 'inscriptionAdmin' ?>">
                    <input type="hidden" name="id" value="<?= isset($user['id']) ? $user['id'] : '' ?>">
                    <div class="labinput">
                        <label for="" class="labIns">Prénom</label><br>
                        <input type="text" name="prenom" class="InpIns" value="<?=isset($user['prenom']) ? $user['prenom'] : '' ?>"><br>
                        <span><?php echo isset($arrayError['prenom']) ? $arrayError['prenom'] : '' ?></span>
                    </div>
                    <div class="labinput">
                        <label for="" class="labIns">Nom</label><br>
                        <input type="text" name="nom" class="InpIns"  value="<?=isset($user['nom']) ? $user['nom'] : '' ?>"><br>
                        <span><?php echo isset($arrayError['nom']) ? $arrayError['nom'] : '' ?></span>
                    </div>
                    <div class="labinput">
                        <label for="" class="labIns">Login</label><br>
                        <input type="text" name="email" class="InpIns" value="<?=isset($user['email']) ? $user['email'] : '' ?>"><br>
                        <span><?php echo isset($arrayError['email']) ? $arrayError['email'] : '' ?></span>
                    </div>
                    <div class="labinput">
                        <label for="" class="labIns">Mot de passe</label><br>
                        <input type="password" name="password" class="InpIns"><br>
                        <span><?php echo isset($arrayError['password']) ? $arrayError['password'] : '' ?></span>
                    </div>
                    <div class="labinput">
                        <label for="" class="labIns">Confirmer votre mot de passe</label><br>
                        <input type="password" name="confirmPassword" class="InpIns"><br>
                        <span><?php echo isset($arrayError['confirmPassword']) ? $arrayError['confirmPassword'] : '' ?></span>
                    </div>
                    <div class="labinput">
                        <label for="" class="labIns">Avatar</label><br>
                        <input type="file" name="fileToUpload" class="InpIns">
                    </div>
                    <button class="buttton">Créer un compte</button>
                </form>
            </div>
        </div>
        <!-- <div class="AVATARInserer"></div> -->
    </div>
    </div>
</body>

</html>