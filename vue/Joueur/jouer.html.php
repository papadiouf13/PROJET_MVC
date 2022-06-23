<?php require_once(ROUTE_DIR . 'vue/inc/menu1.html.php'); ?>
<div class="caddr">
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
    <?php endforeach; ?><br>
    <button class="PAPA">VALIDER</button>
</div>
<div>
    <?php for ($i = 1; $i <= $totalPage; $i++) : ?>
        <a href="<?= WEB_ROUTE . '/?controller=JoueurController&view=jouer&page=' . $i . '' ?>" class="lienpagination">
            <button class="liensstyle"><?php echo $i; ?></button>
        </a>
    <?php endfor; ?>
</div>
<style>
    .caddr {
        border: 2px solid;
    }

    .PAPA {
        margin-left: 30%;
        background-color: #3792E5;

    }
    .lienpagination{
        
        text-decoration: none;
    }
    .liensstyle{
        background-color: #3792E5;
        color: red;
    }
</style>