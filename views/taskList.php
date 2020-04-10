<h1><?= $pageTitle ?></h1>

<table class="table table-borderd table-stripped">
    <tr>
    <th>Titre</th>
    <th>Catégorie</th>
    <th>Status</th>
    <th>Avancement</th>
    <th>Date d'échéance</th>
    </tr>

    <?php foreach($taskList as $task) : ?>
        
        <?php //transforme les clefs d'un tableau associatif en une suite de variables
            extract($task) ?>
    <tr>
        <td><?= $title ?></td>
        <td><?= $category_name ?></td>
        <td><?= $status_name ?></td>
        <td><?= $completion_rate ?></td>
        <td><?= $due_date ?></td>
    </tr>


    <?php endforeach ?>

</table>