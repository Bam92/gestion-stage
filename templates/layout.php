<!-- templates/layout.php -->
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../public/style.css">
    <script src="https://kit.fontawesome.com/f47cc0a207.js" crossorigin="anonymous"></script>
    <title><?= $title ?></title>
</head>

<body>
    <?php
    require 'navigation.php';
    ?>

    <main>
        <?= $content ?>
    </main>
    <script src="../public/script.js"></script>

</html>