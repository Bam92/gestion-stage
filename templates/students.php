<?php
// templates/students.php
$title = 'Liste des stagiaires';
ob_start();
?>

<h1>
    <?= $title; ?>
</h1>
<ul>
    <?php foreach ($students as $student) : ?>

    <li>
        <?= $student['name']; ?>
    </li>

    <?php endforeach; ?>

</ul>

<?php
$content = ob_get_clean();
include 'layout.php';
?>