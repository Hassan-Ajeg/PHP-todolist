--- Suppression de la BD si elle existe 
--- permet de rééxécuter le script en partant d'une base vierge 
DROP DATABASE IF EXISTS todolist;

--- création de la BD
CREATE DATABASE todolist DEFAULT CHARACTER SET utf8 COLLATE utf8_general_ci;

--- ouverture de la BD
USE todolist;

--- création de la table catégories
CREATE TABLE categories (
    id TINYINT UNSIGNED AUTO_INCREMENT,
    category_name VARCHAR(30) NOT NULL,
    PRIMARY KEY (id)
);

--- création de la table status
CREATE TABLE task_status (
    id TINYINT UNSIGNED AUTO_INCREMENT,
    status_name VARCHAR(20) NOT NULL
    PRIMARY KEY (id) 
);

--- création de la table tâches
--- DEFAULT permet d'affecter une valeur par défaut 
CREATE TABLE tasks(
    id INT UNSIGNED AUTO_INCREMENT,
    title VARCHAR(50) NOT NULL,
    due_date DATE,
    completion_rate TINYINT UNSIGNED NOT NULL DEFAULT 0,
    category_id TINYINT UNSIGNED NOT NULL,
    status_id TINYINT UNSIGNED NOT NULL DEFAULT 1,
    PRIMARY KEY (id),
    CONSTRAINT categories_to_tasks
        FOREIGN KEY (category_id)
        REFERENCES categories(id),
    CONSTRAINT status_to_tasks
        FOREIGN KEY (status_id)
        REFERENCES task_status(id)
);

--- insertion de catégories
INSERT INTO categories(category_name)
    VALUES ('courses'),('travail'),('loisirs'),('santé');

--- insertion de status
INSERT INTO task_status(status_name)
    VALUES ('en cours'),('terminée'),('annulée');

--- insertion de tâches
INSERT INTO tasks(title, due_date, completion_rate, category_id)
    VALUES ('acheter du lait', '2020-04-21', 0, 1);

----Création d'une vue pour faciliter les requêtes
CREATE OR REPLACE VIEW view_tasks AS
    SELECT tasks.*, categories.category_name, task_status.status_name
    FROM tasks
        INNER JOIN categories ON categories.id = tasks.category_id
        INNER JOIN task_status ON task_status.id = task_status_id