<?php 
$arrayError = array();

if (isset($_SESSION['arrayError'])) {
    $arrayError = $_SESSION['arrayError'];
    unset($_SESSION['arrayError']);
}
?>
<?php require_once(ROUTE_DIR . 'vue/inc/menu.html.php'); ?>
<form action="<?=WEB_ROUTE?>" method="POST" enctype="multipart/form-data">
    <input type="hidden" name="controller" value="AdminController">
    <input type="hidden" name="action" value="CREER">
    <input type="hidden" name="id" value="<?=isset($Question['id']) ? $Question['id'] : '' ?>">

    <div class="cadree">
        <div class="saisirdesquestions">
            <label for="">Question: </label><br>
            <textarea name="question" id="" cols="30" rows="10"><?= isset($Question['question']) ? $Question['question'] : '' ?></textarea><br>
            <span id="erreur"><?php echo isset($arrayError['question']) ? $arrayError['question'] : '' ?></span>
        </div><br>
        <label for=""> Nombre de point:</label><br>
        <input type="number" name="numero" value="<?= isset($Question['numero']) ? $Question['numero'] : '' ?>" class="TAILLE"><br>
        <span id="erreur"><?php echo isset($arrayError['numero']) ? $arrayError['numero'] : '' ?></span><br>
        <label for="">Type de réponses:</label><br>
        <select name="typeQuestion" id="typeQuestion" class="TAILLE1">
            <option value="">Donnez le type de réponse</option>
            <option value="simple" >Réponse simple</option>
            <option value="unique">Réponse unique</option>
            <option value="multiple">Réponse à choix multiple</option>
        </select> 
        <span id="plus">
            <i class="fa-solid fa-plus breukh"></i><br><br>
        <span id="erreur"><?php echo isset($arrayError['typeQuestion']) ? $arrayError['typeQuestion'] : '' ?></span>

        </span> 
        <label id="error"></label>
        <div id="rep">
        <?php if(isset($Question)): ?>
            
            <?php foreach ($Question['Reponse'] as $key => $value) :?>
            <?php if($Question["typeQuestion"] == "unique"): ?>
            <input type="text" name="reponse[]" value="<?= $value ?>" >
            <input type="radio" name="bonneReponse[]" value="<?= $value ?>">
            <i class="fa fa-trash" id="delete"></i>
        <?php endif?>
        <?php if($Question["typeQuestion"] == "simple"): ?>
            <input type="text" name="bonneReponse[]" value="<?= $value ?>" >
            <i class="fa fa-trash" id="delete"></i>
        <?php endif?>
        <?php if($Question["typeQuestion"] == "multiple"): ?>
            <input type="text" name="reponse[]" value="<?= $value ?>" >
            <input type="checkbox" name="bonneReponse[]" value="<?= $value ?>">
            <i class="fa fa-trash" id="delete"></i><br>
        <?php endif?>
        <?php endforeach?>     
      <?php endif?>
        </div>
        <button type="submit" class="butonQuestion">Enregistrer</button>
    </div>
    
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
        margin-left: 10%;
        padding: 10px;
        background-color: #3792E5;
        /* background-image: url(images/images.png); */
    }
    .TAILLE2{
        border: 2px solid #3792E5;
        width: 60%;
        height: 20px;
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
        margin-left: 42%;
        background: whitesmoke;
        color: #3792E5;
        border: none;
    }
    .breukhnieule{
        padding: 7px;
    }
    .breukh{
    cursor: pointer;
    background-color: #3792E5;
    color: white;
    padding: 3px;
    border-radius:2px;
    }
    #repSimple, #repUnique , #repMultiple{
    display: none;
    }
    .fa-trash{
    color: red;
    cursor: pointer;
    }
    .show{
    display: block !important;
    }
    #erreur{
        color: red;
        font-size: 10px;
    }
</style>
<script>
    const rep = document.getElementById("rep")
    const typeQuestion = document.getElementById("typeQuestion")
    const plus = document.getElementById("plus")
    const error = document.getElementById('error')
    nbr = 0
    plus.addEventListener("click",()=>{

        nbr++
       let div = document.createElement("div")
       div.classList.add('breukhnieule')

       typeQuestion.addEventListener("change" , ()=>{
        nbr = 0
        rep.removeChild(div)
       })

       if(typeQuestion.value == "simple") {

        error.innerHTML = ""
        if(nbr < 2){

            div.innerHTML = 
        `
                <label for="">Réponse ${nbr}</label>
                <input type="text" name="reponse[]" class="TAILLE2">
                <i class="fa fa-trash" ></i>
       ` 
        }else{
        
        div.classList.remove('breukhnieule')

        }

       }else if(typeQuestion.value == "unique"){

        error.innerHTML = ""
        div.innerHTML = 
       `
            <label for="">Réponse ${nbr}</label>
            <input type="text" name="reponse[]" class="TAILLE2">
            <input type="radio" name="bonneReponse[]" value="${nbr}">
            
       `
       }else if (typeQuestion.value == "multiple") {

        error.innerHTML = ""
        div.innerHTML = 
       `
            <label for="">Réponse ${nbr}</label>
            <input type="text" name="reponse[]" class="TAILLE2">
            <input type="checkbox" name="bonneReponse[]" value="${nbr}">
            
       `
       }else if (typeQuestion.value == "") {
        nbr = 0
        error.innerHTML = "check please!"
       }
       
       if (typeQuestion.value != "") {
           rep.appendChild(div)
       }

      
    })

    
   
    
</script>