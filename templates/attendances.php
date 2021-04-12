<?php
// templates/home.php
$title = 'Voir liste de présence';
ob_start();
?>

<h1>
    <?= $title; ?>
</h1>

<small>(choisir le groupe )</small>
<form method="get">
    <label for="class">Groupe / classe</label>
    <select name="class" id="class">
        <option value="">selctionner</option>
        <?php
        $groups = list_groups();
        foreach ($groups as $group) {
        ?>

        <option value="<?= $group['id']; ?>">
            <?= $group['name']; ?>
        </option>
        <?php } ?>
    </select>

    <label for="date">Date</label>
    <input type="date" placeholder="dd/mm/yyyy" name="date" id="date">

    <input type="submit" name="submit" value="Afficher les étudiants">
</form>

<?php
if ($date) {
    if ($message) echo $message;
    else {

        $date_format = new DateTime($date);
?>

<h2>
    Groupe: <?= $class; ?>,
    Date : <?= $date_format->format('d/m/Y'); ?>
</h2>

<table cellpadding="10" cellspacing="1">
    <thead>
        <tr>
            <th>#</th>
            <th>Étudiant</th>
            <th>Présence</th>
        </tr>
    </thead>
    <tbody>

        <?php
                $absence_count = 0;
                $absence_female_count = 0;
                $count = 0;

                foreach ($list as $student) {
                    $count++;
                    if ($student['status'] == 0) {
                        $absence_count += 1;
                        if ($student['gender'] == "F") $absence_female_count += 1;
                    }

                    $status = ($student['status']) == 1 ? "+" : "-";
                ?>
        <tr>
            <td><?= $count; ?></td>
            <td>
                <?= $student['first_name'] . " " . $student['name'] . " " . $student['last_name'] ?>
            </td>
            <td>
                <?= $status ?>
            </td>
        </tr>

        <?php } ?>

    </tbody>
</table>

<p>
    Nombre d'absence:
    <?= $absence_count . " dont " . $absence_female_count . " femme(s)"; ?>
</p>

<?php
    }
}

$content = ob_get_clean();
include 'layout.php';

?>
<!-- To do  -->
<!-- Add "Encadreur" -->