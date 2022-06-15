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
    <input type="hidden" name="action" value="<?=isset($user['id']) ? 'edit' : 'inscription' ?>">
    <input type="hidden" name="id" value="<?=isset($user['id']) ? $user['id'] : '' ?>">
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
        <div class="Titre">Inscription</div>
        <div class="cadre">
           <div class="cadre1">
               <label for="">Prénom</label><br>
               <input type="text" name="prenom" placeholder="Veuillez saisir votre prénom" value="<?=isset($user['prenom']) ? $user['prenom'] : '' ?>">
               <span><?php echo isset($arrayError['prenom']) ? $arrayError['prenom'] : '' ?></span>
           </div>
           <div class="cadre1">
               <label for="">Nom</label><br>
               <input type="text" name="nom" placeholder="Veuillez saisir votre nom" value="<?=isset($user['nom']) ? $user['nom'] : '' ?>">
               <span><?php echo isset($arrayError['nom']) ? $arrayError['nom'] : '' ?></span>
           </div>
        </div>
        <div class="cadre">
           <div class="cadre1">
               <label for="">Téléphone</label><br>
               <input type="text" name="telephone" placeholder="Veuillez saisir votre numero de téléphone" value="<?=isset($user['telephone']) ? $user['telephone'] : '' ?>">
               <span><?php echo isset($arrayError['telephone']) ? $arrayError['telephone'] : '' ?></span>
           </div>
           <div class="cadre1">
               <label for="nom">Email</label><br>
               <input type="text" name="email" placeholder="Veuillez saisir votre email" value="<?=isset($user['email']) ? $user['email'] : '' ?>">
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