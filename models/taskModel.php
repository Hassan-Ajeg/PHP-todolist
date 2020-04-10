<?php

function getAllCategories(PDO $pdo): array {
    $recordSet = $pdo->query("SELECT * FROM categories");
    return $recordSet->fetchAll();
}

function getAllStatuses(PDO $pdo): array {
    $recordSet = $pdo->query("SELECT * FROM task_status");
    return $recordSet->fetchAll();
}

function insertTask(array $task, PDO $pdo): int {
    $sql = "INSERT INTO tasks(title, due_date, category_id, status_id, completion_rate)
            VALUES(:title, :dueDate, :category, :status, :completion)";
    $statement = $pdo->prepare($sql);
    $statement->execute($task);

    return $pdo->lastInsertId();
}

function validateTask(array $task): array {
    $errors = [];
    if(($task["title"])){
        array_push($errors, "Le titre ne peut être vide");
    }
    //verifie si la date saisie n'est pas anterieur à la date d'aujourd'hui
    if(strtotime($task["dueDate"]) < strtotime("now")) {
        array_push($errors, "La date d'échéance doit être postérieur à la date du jour ");
    }

    return $errors;
}