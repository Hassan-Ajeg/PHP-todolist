<?php

//requête sur la BD pour afficher la liste des tâches
$recordSet = $pdo->query("SELECT * FROM view_tasks");
$taskList = $recordSet->fetchAll();

$pageTitle =  "Liste des tâches";
$content = "taskList";


require "../views/baseLayout.php";