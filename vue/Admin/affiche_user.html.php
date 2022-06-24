

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PROJET QUIZZ</title>
    <link rel="stylesheet" href="css/styleTableauJoueur.css">
</head>

<body>
    <?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?>
    <div class="global">
    <div class="TABLEAU">
   <br>
    <div>
    <?php if(empty($users)):?>
        <h1>Aucun résultat</h1>
    <?php endif;?>
    <?php if(!empty($users)):?>
            <table class="table-style">
            <thead>
            <tr>
                <th>Nom</th>
                <th>Prenom</th>
                <th>Score</th>
            </tr>
            </thead>
                <?php foreach ($users as $key => $val):?>
                    <?php if ($val['role']=="ROLE_JOUEUR"):?>
                    <tr>
                        <td><?php echo $val['nom'];?></td>
                        <td><?php echo $val['prenom'];?></td>
                        <td><?php echo $val['telephone'];?></td>
                    </tr>
                    <?php endif;?>
                <?php endforeach;?>
                
            </table>
    <?php endif;?>
    <?php for($i = 1; $i <= $totalPage; $i++):?>
        <a href="<?= WEB_ROUTE.'/?controller=AdminController&view=list.user&page='.$i.''?>">
        <button class="liensstyle"><?php echo $i; ?></button>
    </a>
        <?php endfor;?>
    </div>
   </div>
    </div>
</body>

</html>
<style>
    .liensstyle{
        background-color: #3792E5;
        margin-top: 5%;
        margin: 4%;
        border: none;
        color: whitesmoke;
    }
    a{
        text-decoration: none;
    }
</style>

