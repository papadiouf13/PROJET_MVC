<?php 
$arrayError = [];

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
    <title>Inscription</title>
    <link rel="stylesheet" href="css/styleinscription.css">
</head>
<body>
    <div class="fixe">
        <h1>LE PLAISIR DE JOUER</h1>
    </div>
    <form method="POST" action="<?=WEB_ROUTE?>" enctype="multipart/form-data">
    <input type="hidden" name="controller" value="securityController">
    <input type="hidden" name="action" value="inscription">
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
        <div class="Titre">Inscription</div>
        <div class="cadre">
           <div class="cadre1">
               <label for="">Prénom</label><br>
               <input type="text" name="prenom" value="<?=isset($user['prenom']) ? $user['prenom'] : '' ?>">
               <span><?php echo isset($arrayError['prenom']) ? $arrayError['prenom'] : '' ?></span>
           </div>
           <div class="cadre1">
               <label for="">Nom</label><br>
               <input type="text" name="nom">
               <span><?php echo isset($arrayError['nom']) ? $arrayError['nom'] : '' ?></span>
           </div>
        </div>
        <div class="cadre">
           <div class="cadre1">
               <label for="">Téléphone</label><br>
               <input type="text" name="telephone">
               <span><?php echo isset($arrayError['telephone']) ? $arrayError['telephone'] : '' ?></span>
           </div>
           <div class="cadre1">
               <label for="nom">Email</label><br>
               <input type="text" name="email">
               <span><?php echo isset($arrayError['email']) ? $arrayError['email'] : '' ?></span>
           </div>
        </div>
        <div class="cadre">
           <div class="cadre1">
               <label for="">Mot de passe</label><br>
               <input type="password" name="password">
               <span><?php echo isset($arrayError['password']) ? $arrayError['password'] : '' ?></span>
           </div>
           <div class="cadre1">
               <label for="nom">Confirmez votre mot de passe</label><br>
               <input type="password" name="confirmPassword">
               <span><?php echo isset($arrayError['confirmPassword']) ? $arrayError['confirmPassword'] : '' ?></span>
           </div>
        </div>
        <div class="file">
            <input class="files" type="file" name="fileToUpload">
        </div>
        <button type="submit">Enregistrer</button>
        <div class="lien">
        <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=connexion' ?>">Se connecter</a>
        </div>
       
    </form>
</body>
</html>