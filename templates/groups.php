<?php
// templates/students.php
$title = 'Liste des groupes';
ob_start();
?>

<h1>
    <?= $title; ?>
</h1>
<ul>
    <?php foreach ($groups as $group) : ?>
    <li>
        <?= $group['name']; ?>
    </li>
    <?php endforeach; ?>
</ul>

<?php
$content = ob_get_clean();
include 'layout.php';
?>