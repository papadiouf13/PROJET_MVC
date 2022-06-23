<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/StyleJoueur.css">
</head>
<body>
    <div class="fixe">
        <h1>LE PLAISIR DE JOUER</h1>
        <div class="deconn"><button class="BUTON"><a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>">Deconnexion</a></button></div>
    </div>
    <div class="menuJoueur">
       <div class="photojoueur">
       <img src="images/uploads/<?php echo $_SESSION['userConnected']['avatar']?>" alt="Pas de photo profil" class="photojoueur">
       </div>
       <a href="<?php echo WEB_ROUTE.'?controller=JoueurController&view=jouer'?>">Jouer</a>
       <a href="<?php echo WEB_ROUTE.'?controller=JoueurController&view=meilleurScore'?>">Meilleurs records</a>
    </div>
</body>
</html>



<style>
    .menuJoueur{
        width: 100%;
        display: flex;
        justify-content: space-around;
        align-items: center;
        background: #3192F1;
        margin-top: 1%;
    }
    .photojoueur{
        width: 80px;
        height: 80px;
        border-radius: 50%;
    }
</style>