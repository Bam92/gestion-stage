<?php
// templates/home.php
$title = 'Présence stagiaires';
ob_start();
?>

<h1>
    <?= $title; ?>
</h1>

<?php if(isset($message)) echo $message; ?>

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
                $list = list_students();
                $count = 0;

                foreach ($list as $student) {
                    $count++;
                ?>
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
                <?php } ?>
            </tbody>
        </table>
    </div>
    <div>
        <input type="submit" name="submit" value="Enregistrer">
    </div>
</form>

<?php
$content = ob_get_clean();
include 'layout.php';
?>