<?php
// templates/students.php
$title = 'Nouveau stagiaire';
ob_start();
?>

<h1><?= $title; ?></h1>
<p><a href="/">Accueil</a></p>

<?php

    if(isset($message)) echo $message;

    ?>
<form method="post">
    <div>
        <label for="fName">Prénom</label>
        <input type="text" placeholder="Prénom de l'etudiant" name="fName" id="fName">
    </div>
    <div>
        <label for="name">Nom</label>*
        <input type="text" placeholder="Nom de l'etudiant" name="name" id="name" required>
    </div>
    <div>
        <label for="lName">Post-nom</label>
        <input type="text" placeholder="Post-nom de l'etudiant" name="lName" id="lName">
    </div>
    <div>
        <input type="radio" id="man" name="gender" value="M" checked>
        <label for="man">Homme</label>
    </div>

    <div>
        <input type="radio" id="woman" name="gender" value="F">
        <label for="woman">Femme</label>
    </div>

    <div>
        <label for="institution">Institution</label>
        <input type="text" placeholder="Intitution d'origine" name="institution" id="institution">
    </div>

    <div>
        <label for="class">Groupe</label>
        <select name="class" id="class">

            <?php
                /**
                 * Get list of available groups if any
                 */
                $list = list_groups();
                foreach ($list as $group) {
                ?>
            <option value="<?= $group['id'] ?>">
                <?= $group['name'] ?>
            </option>
            <?php } ?>

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