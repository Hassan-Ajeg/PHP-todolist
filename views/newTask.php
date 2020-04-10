<h2>Nouvelle tâche</h2>

<?php
    if(count($errors) > 0) : ?>
    <div class="alert alert-danger">
        <ul>
            <?php foreach($errors as $message) :?>
            <li>
                <?= $message ?> 
            </li>
            <?php endforeach ?>
        </ul>
    </div>


<?php endif ?>


<form action="" method="POST">
<div class="form-group">
    <label for="">Titre</label>
    <input type="text" name="title" class="form-control">
</div>
<div class="form-group">
    <label for="">Date d'échéance</label>
    <input type="date" name="dueDate" class="form-control">
</div>
<div class="form-group">
    <label for="">Catégorie</label>
    <select name="category" class="form-control">
    <option value="">Choisissez une catégorie</option>
        <?php foreach($categoryList as $category) :?>
            <option value="<?= $category["id"]?>">
                <?= $category["category_name"] ?>
            </option>
        <?php endforeach ?>
    </select>
</div>
<div class="form-group">
    <label for="">Statut</label>
    <select name="status" class="form-control">
    <?php foreach($statusList as $status) : ?>
        <option value="<?= $status["id"] ?>"><?= $status["status_name"] ?></option>
    <?php  endforeach ?>
    </select>
</div>
<div class="form-group">
    <label for="">Avancement</label>
    <input type="range" min="1" max="100" name="completion" class="form-control">
</div>
<button type="submit" name="submit" class="btn btn-primary btn-block ">Valider</button>
</form>