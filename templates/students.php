<?php
// templates/students.php
$title = 'Liste des stagiaires';
ob_start();
?>

<h1>
    <?= $title; ?>
</h1>

<?php

$students = list_students();

if (isset($message)) {
    echo '<p>' . $message . '</p>';
}
?>

<table cellpadding="10" cellspacing="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Nom complet</th>
            <th>Sexe</th>
            <th title="Institution d'origine">Institution</th>
            <th>Groupe</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

        <?php
        $count = 0;
        foreach ($students as $student) {
            $count++; ?>
        <tr>
            <td><?= $count; ?></td>
            <td>
                <?= $student['first_name'] . " " . $student['name'] . " " . $student['last_name'] ?>
            </td>
            <td>
                <?= $student['gender'] ?>
            </td>
            <td>
                <?= $student['institution'] ?>
            </td>
            <td>
                <?= $student['class'] ?>
            </td>
            <td>
                <form method="get">
                    <input type="hidden" name="id" value="<?= $student['id'] ?>">
                    <input type="submit" name="del" value="Suppr">
                </form>
            </td>
        </tr>

        <?php
        } ?>

    </tbody>
</table>
<?php
$content = ob_get_clean();
include 'layout.php';
?>