 <h1>Nouveau groupe</h1>
 <p><a href="/">Accueil</a></p>

 <?php
    include(dirname(__FILE__) . "/model/model.php");

        if (add_group($_POST['name'])) {
            echo "Nouveau groupe enregistré avec succès!";
        }

    ?>
 <form method="post">
     <div>
         <label for="groupe">Nom</label>
         <input type="text" placeholder="Nom du groupe" name="name" id="name">
     </div>
     <div>
         <input type="submit" name="submit" value="Enregistrer">
     </div>
 </form>