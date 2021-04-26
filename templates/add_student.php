<?php
// templates/students.php
$title = 'Nouveau stagiaire';
ob_start();
?>

<h1><?= $title; ?></h1>

<?php if (isset($message)) {
    echo $message;
} ?>

<form method="post">
    <div>
        <input type="text" placeholder="Quel est le prénom de l'étudiant ?" name="fName" id="fName">
    </div>
    <div>
        <input type="text" placeholder="Et son nom ?" name="name" id="name" required>
    </div>
    <div>
        <input type="text" placeholder="Ajoutez le post-nom s'il y en a" name="lName" id="lName">
    </div>
    <div class="gender">

        <label for="man">
            <input type="radio" id="man" name="gender" value="M" checked>
            Homme
        </label>
        <label for="woman">
            <input type="radio" id="woman" name="gender" value="F">
            Femme
        </label>
    </div>

    <div>
        <input type="text" placeholder="Intitution d'origine" name="institution" id="institution">
    </div>

    <div>
        <select name="class" id="class">
            <option value="">--Selectionnez un groupe--</option>

            <?php
            /**
             * Get list of available groups if any
             */
            $groups = list_groups();
            foreach ($groups as $group) {
                ?>

            <option value="<?= $group['id']; ?>">
                <?= $group['name'] ?>
            </option>

            <?php
            } ?>

        </select>
    </div>

    <div>
        <input type="submit" name="submit" value="Enregistrer">
    </div>
</form>

<?php
$content = ob_get_clean();
include 'layout.php';
?>