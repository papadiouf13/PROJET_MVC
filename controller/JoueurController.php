<?php 
if($_SERVER['REQUEST_METHOD'] == "GET") {
    if (isset($_GET['view'])) {
        if ($_GET['view'] == "accueil") {
            require_once(ROUTE_DIR.'vue/Joueur/accueil1.html.php');
        }elseif ($_GET['view'] == "jouer") {
            $page = 1;
            if (isset($_GET["page"])) {
                $page = intval($_GET["page"]);
            }
            $Questions = get_list_question();
            
          $totalPage=countpage(5, $Questions);
          $Questions= getListToDisplay($Questions, $page , 5);
            require_once(ROUTE_DIR.'vue/Joueur/jouer.html.php');
        } elseif ($_GET['view'] == "meilleurScore") {
            require_once(ROUTE_DIR . 'vue/Joueur/meilleur_score.html.php');
        }
    }
}
?>