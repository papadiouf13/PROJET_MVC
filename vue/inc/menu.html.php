
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleAdmin.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css" integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
<div class="fixe">
        <h1>LE PLAISIR DE JOUER</h1>
        <div class="deconn"><button class="BUTON"><a href="<?php echo WEB_ROUTE.'?controller=securityController&view=deconnexion'?>">Deconnexion</a></button></div>
    </div>
   <div class="grandCadre">
       <div class="profil">
           <div class="entete">
               <div class="photoAdmin">
                   <img src="images/uploads/<?php echo $_SESSION['userConnected']['avatar']?>" alt="Pas de photo profil" class="photoAdmin">
               </div>
               <div class="infoAdmin">
                   <div class="Nomprenom">
                   <label for="">Prenom:</label> <?php echo $_SESSION['userConnected']['prenom']?> <br>
                   <label for="">Nom:</label> <?php echo $_SESSION['userConnected']['nom']?><br>
                   </div>
                  <label for=""> Date:</label> <?php echo date_format(date_create(), "d-m-Y"); ?>
               </div>
           </div>
           <div class="modificationAdmin">
               <br>
               <a href="<?php echo WEB_ROUTE.'?controller=AdminController&view=listequestion'?>" class="lienModAmin"><i class="fa-solid fa-list"></i></a><a href="<?php echo WEB_ROUTE.'?controller=AdminController&view=listequestion'?>" class="lienModAmin"> Liste des questions</a><br><br><br>
               <a href="<?php echo WEB_ROUTE.'?controller=AdminController&view=inscriptionAdmin'?>" class="lienModAmin"><i class="fa-solid fa-plus"></i></a><a href="<?php echo WEB_ROUTE.'?controller=AdminController&view=inscriptionAdmin'?>" class="lienModAmin"> Créer un admin</a><br><br><br>
               <a href="<?php echo WEB_ROUTE.'?controller=AdminController&view=list.user'?>" class="lienModAmin"> <i class="fa-solid fa-list"></i>  </a><a href="<?php echo WEB_ROUTE.'?controller=AdminController&view=list.user'?>" class="lienModAmin">  Liste Joueurs   </a><br><br><br>
               <a href="<?php echo WEB_ROUTE.'?controller=AdminController&view=creerquestion'?>" class="lienModAmin">  <i class="fa-solid fa-plus"></i></a><a href="<?php echo WEB_ROUTE.'?controller=AdminController&view=creerquestion'?>" class="lienModAmin">  Créer Questions  </a><br><br><br>
               <a href="<?php echo WEB_ROUTE.'?controller=AdminController&view=list.Admin'?>" class="lienModAmin"> <i class="fa-solid fa-list"></i> </a><a href="<?php echo WEB_ROUTE.'?controller=AdminController&view=list.Admin'?>" class="lienModAmin">  Liste Admin  </a><br><br>
           </div>
       </div>
</body>
</html>