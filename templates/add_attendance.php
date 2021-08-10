<?php
// templates/add_attendance.php
$title = 'Présence stagiaires';
ob_start();
?>

<h1>
    <?= $title; ?>
</h1>

<?php if (isset($message)) {
    echo $message;
} ?>

<small>(choisir le groupe )</small>
<form method="get">
    <label for="class">Groupe / classe</label>
    <select name="class" id="class">
        <option value="">selctionner</option>

        <?php foreach ($groups as $group) { ?>

        <option value="<?= $group['id']; ?>">
            <?= $group['name']; ?>
        </option>

        <?php } ?>
    </select>

    <input type="submit" name="submit" value="Afficher les étudiants">
</form>

<?php

if (!$list) {
    echo "Veillez choisir un groupe";
} else { ?>

<form method="post">
    <div>
        <label for="attendance_date">Date</label>
        <input type="date" name="attendance_date" required> (obligatoire)
    </div>
    <div>
        <table cellpadding="10" cellspacing="1">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Étudiant</th>
                    <th>Présent</th>
                    <th>Absent</th>
                </tr>
            </thead>
            <tbody>

                <?php
                    $count = 0;
    foreach ($list as $student) {
        $count++; ?>

                <tr>
                    <td><?= $count; ?></td>
                    <td>
                        <input type="hidden" name="studentId[]" value=<?= $student['id']; ?>>
                        <?= $student['first_name'], " ", $student['name'], " ", $student['last_name']; ?>
                    </td>
                    <td>
                        <input type="radio" id="present" name="status-<?= $student['id']; ?>" value="present" checked>
                    </td>
                    <td>
                        <input type="radio" id="absent" name="status-<?= $student['id']; ?>" value="absent">
                    </td>
                </tr>

                <?php
    } ?>

            </tbody>
        </table>
    </div>
    <div>
        <input type="submit" name="submit" value="Enregistrer">
    </div>
</form>

<?php
}
$content = ob_get_clean();
include 'layout.php';
?>