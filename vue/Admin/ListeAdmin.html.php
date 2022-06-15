<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="css/styleTableau.css">
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
                <th>Email</th>
                <th>Action</th>
                <th>Image</th>
            </tr>
            </thead>
                <?php foreach ($users as $key => $val):?>
                    <?php if ($val['role']=="ROLE_ADMIN"):?>
                    <tr>
                        <td><?php echo $val['nom'];?></td>
                        <td><?php echo $val['prenom'];?></td>
                        <td><?php echo $val['email'];?></td>
                        <td>
                            <a href="<?= WEB_ROUTE.'/?controller=securityController&view=supprimer&id='.$val['id']?>">Supprimer</a>
                            <a href="<?= WEB_ROUTE.'/?controller=securityController&view=edit&id='.$val['id']?>">Modifier</a>
                        </td>
                        <td><?php echo $val['avatar'];?></td>
                    </tr>
                    <?php endif;?>
                <?php endforeach;?>
            </table>
    <?php endif;?>
    </div>
   </div>
    </div>
</body>

</html>

