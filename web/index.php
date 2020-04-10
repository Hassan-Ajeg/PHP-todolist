<?php
//récupération du controleur à executer
$route = filter_input(INPUT_GET, "route") ?? "taskList";

//construction du chemin vers le fichier du contrôleur
$controllerPath = "../controllers/{$route}Controller.php";

//gestion d'erreur si le fichier contrôleur demandé est absent
if(! file_exists($controllerPath)) {
    $errorMessage = "Fichier introuvable !";
    $controllerPath = "../controllers/errorController.php";
}

//ouverture de la connexion à la BD
$pdo = new PDO(
    "mysql:host=127.0.0.1;dbname=todolist;charset=utf8;port=8889",
    "root",
    "root",
    [
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
        ]
    );


//execution du contrôleur 
require $controllerPath;