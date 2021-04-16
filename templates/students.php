<?php
// templates/students.php
$title = 'Liste des stagiaires';
ob_start();
?>

<h1>
    <?= $title; ?>
</h1>

<?php
if (isset($message)) {
    echo '<p>' . $message . '</p>';
}
?>
<ul>
    <?php foreach ($students as $student) : ?>

    <li>
        <?= $student['first_name'] . ' ' . $student['name']; ?>
        <form method="get">
            <input type="hidden" name="id" value="<?= $student['id'] ?>">
            <input type="submit" name="del" value="Suppr">
        </form>
    </li>

    <?php endforeach; ?>

</ul>

<?php
$content = ob_get_clean();
include 'layout.php';
?>