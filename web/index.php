<?php
//récupération du controleur à executer
$route = filter_input(INPUT_GET, "route") ?? "taskList";

//construction du chemin vers le fichier du contrôleur
$controllerPath = "../controllers/{$route}Controller.php";

//gestion d'erreur si le fichier contrôleur demandé est absent
if(! file_exists($controllerPath)){
    $errorMessage = "Fichier introuvable !";
    $controllerPath = "../controllers/errorController.php";
}
//execution du contrôleur 
require $controllerPath;