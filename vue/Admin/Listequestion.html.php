<?php require_once(ROUTE_DIR . 'vue/inc/menu.html.php'); ?>
<div class="nbrQuestion">
    <div class="cadrnbrQuestion">
        <div class="cadr1">
            <h2>Nombre de question / jeu</h2>
        </div>
        <div class="cadr2"><input type="number"></div>
        <div class="cadr3"><button>OK</button></div>
    </div>
    <div class="cadrnbrQuestion1">
        <?php foreach ($Questions as $key => $val) : ?>

            <h3> <?php echo $key + 1, "." . $val['question']; ?></h3>

            <?php foreach ($val['Reponse'] as $reps => $rep) : ?>
                <?php if ($val["typeQuestion"] == "multiple") : ?>
                    <input type="checkbox"><?php echo $rep  ?><br>
                    
                <?php elseif ($val["typeQuestion"] == "unique") : ?>
                    <input type="radio" name="choix"><?php echo $rep ?> <br>
                <?php elseif ($val["typeQuestion"] == "simple") : ?>
                    <input type="text" value="<?php echo $rep ?> "><br>

                <?php endif; ?>

            <?php endforeach; ?>
            <td>
                <a href="<?= WEB_ROUTE . '/?controller=AdminController&view=deletequest&id=' . $val['id'] ?>">Supprimer</a>
                <a href="<?= WEB_ROUTE . '/?controller=AdminController&view=edit&id=' . $val['id'] ?>">Modifier</a>
            </td>
        <?php endforeach; ?>
    </div>
    <?php for($i = 1; $i <= $totalPage; $i++):?>
        <a href="<?= WEB_ROUTE.'/?controller=AdminController&view=listequestion&page='.$i.''?>">
        <button class="liensstyle"><?php echo $i; ?></button>
    </a>
        <?php endfor;?>
</div>
<style>
    .ColorLiens{
        color: white;
    }
    .cadrnbrQuestion {


        display: flex;
        margin-left: 27%;
        margin-top: 5px;
    }

    .cadrnbrQuestion h2 {
        color: blue;
        margin-top: -0.5%;
    }

    .cadr2 input {
        width: 40px;
    }

    .cadrnbrQuestion1 {
        border: 2px solid #3792E5;
        width: 99%;
        padding: 5px;
    }

    .nbrQuestion {
        width: 70%;
        margin-left: 2%;
    }
    .liensstyle{
        background-color: #3792E5;
        margin-top: 5%;
        margin: 1%;
    }
    a{
        text-decoration: none;
        
    }
</style>
