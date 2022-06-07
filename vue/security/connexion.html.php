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
    <title>Connexion</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="fixe">
        <h1>LE PLAISIR DE JOUER</h1>
    </div>
    <form method="POST" action="<?=WEB_ROUTE?>">
    <input type="hidden" name="controller" value="securityController">
    <input type="hidden" name="action" value="connexion">
        <div class="logo">
            <img src="images/logo.png" alt="">
        </div>
        <div class="Titre">Connexion</div>
       <center> <span><?php echo isset($arrayError['error']) ? $arrayError['error'] : '' ?></span></center>
        <div class="inputs">
            <label for="">E-mail</label><br>
            <input type="text" name="email" placeholder="Veuillez saisir votre email"><br>
            <span><?php echo isset($arrayError['email']) ? $arrayError['email'] : '' ?></span>
        </div>
        <div class="inputs">
            <label for="">Mot de passe</label><br>
            <input type="password" name="password" placeholder="Veuillez saisir votre mot de passe"><br>
            <span><?php echo isset($arrayError['password']) ? $arrayError['password'] : '' ?></span>
        </div>
        <button type="submit">Connexion</button>
        <div class="bas">
            <p>vous n'avez pas de compte ?  <a href="<?php echo WEB_ROUTE.'?controller=securityController&view=inscription' ?>">Inscrivez-vous</a></p>
        </div>
    </form>
</body>
</html>