<?php require_once(ROUTE_DIR . 'vue/inc/menu.html.php'); ?>
<form action="<?=WEB_ROUTE?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="controller" value="AdminController">
    <input type="hidden" name="action" value="CREER">
    <div class="cadree">
        <div class="saisirdesquestions">
            Question: <textarea name="question" id="" cols="30" rows="10"></textarea>
            <!-- <span><?php echo isset($arrayError['question']) ? $arrayError['question'] : '' ?></span> -->
        </div><br>
        Nombre de point: <input type="number" name="numero" class="TAILLE"><br><br>
        Type de réponses:
        <select name="typeQuestion" id="" class="TAILLE1">
            <option  value="">Donnez le type de réponse</option>
            <option value="Simple" >Réponse simple</option>
            <option value="Unique">Réponse unique</option>
            <option value="Multiple">Réponse à choix multiple</option>
        </select><br><br>
        Réponse <input type="text" name="Reponse" class="TAILLE2"><br>
    </div>
    <button type="submit" class="butonQuestion">Enregistrer</button>
</form>

<style>
    .saisirdesquestions input {
        border: 2px solid #3792E5;
        width: 80%;
        height: 50px;
        margin-top:5%;
        border-radius: 10px 5px;
    }

    .TAILLE {
        width: 40px;
        border: 2px solid #3792E5;
        border-radius: 5px 5px;
    }

    .TAILLE1 {
        border: 2px solid #3792E5;
        border-radius: 5px 5px;

    }

    .cadree {
        border: 2px solid;
        width: 40em;
        height: 300px;
        margin-left: 10%;
    }
    .TAILLE2{
        border: 2px solid #3792E5;
        width: 60%;
        height: 30px;
        border-radius: 10px 5px;
    }
    textarea{
        width: 50%;
        height: 30px;
        border: 2px solid #3792E5;
        margin-top: 3%;
        border-radius: 5px 5px;
    }
    .butonQuestion{
        margin-left: 97.5%;
        background: #3792E5;
        color: white;
        border: none;
    }
</style>