<?php
// templates/home.php
$title = 'Bienvenue';
ob_start();
?>

<h1>
    <?= $title; ?>
</h1>

<div class="landing_buttons">
    <a href="/attendance/add" id="first">Faire l'appel</a>
    <a href="/attendance/list">Voir les présence</a>
</div>
<?php
$content = ob_get_clean();
include 'layout.php';
?>