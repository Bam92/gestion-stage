<?php
// templates/students.php
$title = 'Liste des groupes';
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
    <?php foreach ($groups as $group) : ?>
    <li>
        <?= $group['name']; ?>
        <form method="get">
            <input type="hidden" name="id" value="<?= $group['id'] ?>">
            <input type="submit" name="del" value="Suppr">
        </form>
    </li>
    <?php endforeach; ?>
</ul>

<?php
$content = ob_get_clean();
include 'layout.php';
?>