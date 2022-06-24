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
    <title>PROJET QUIZZ</title>
    <link rel="stylesheet" href="css/styleAdmin.css">
</head>
<body>
<?php require_once(ROUTE_DIR.'vue/inc/menu.html.php'); ?>
    <div class="EntourageAdmin">
        <div class="photodelecrivain"><img src="images/Albert.jpeg" alt="" class="photodelecrivain"></div>
       
        <div class="citation">
            <center class="POETE"> <h2>ALBERT EINSTEIN</h2><h1>“Le monde que nous avons créé est le résultat de notre niveau de réflexion,
                 mais les problèmes qu'il engendre ne sauraient être résolus à ce même niveau.”</h1></center>
        </div>
    </div>
</body>
</html>