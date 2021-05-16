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

    <?php
    $count = 0;
    foreach ($students as $student) {
        $count++;
        printf(
            "<tbody>
            <tr>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>%s</td>
                <td>
                    <button>
                        <!-- Todo
                        Add an alert before user delete
                        -->
                        <i class='far fa-trash-alt'></i>
                        <a href='/students/list?id=%s'>Supprimer</a>
                    </button>
                </td>
            </tr>
            </tbody>",
            $count,
            htmlspecialchars($student['first_name'] . " " . $student['name'] . " " . $student['last_name'], ENT_QUOTES),
            htmlspecialchars($student['gender'], ENT_QUOTES),
            htmlspecialchars($student['institution'], ENT_QUOTES),
            htmlspecialchars($student['class'], ENT_QUOTES),
            htmlspecialchars($student['id'], ENT_QUOTES)
        );
    }
    ?>
</table>

<?php
$content = ob_get_clean();
include 'layout.php';
?>