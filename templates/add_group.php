<?php
// templates/home.php
$title = 'Nouveau groupe';
ob_start();
?>

<h1>
    <?= $title; ?>
</h1>

<?php if(isset($message)) echo $message; ?>

<form method="post">
    <div>
        <label for="groupe">Nom</label>
        <input type="text" placeholder="Nom du groupe" name="name" id="name">
    </div>
    <div>
        <input type="submit" name="submit" value="Enregistrer">
    </div>
</form>

<?php
$content = ob_get_clean();
include 'layout.php';
?>