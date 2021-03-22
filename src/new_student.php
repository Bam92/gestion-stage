 <h1>Nouveau stagiaire</h1>
 <p><a href="/">Accueil</a></p>

 <?php
    require './model/model.php';
    if (isset($_POST['submit'])) {

        $new_student = array(
            "first_name" => $_POST['fName'],
            "name" => $_POST['name'],
            "last_name" => $_POST['lName'],
            "institution" => $_POST['institution'],
            "gender" => $_POST['gender'],
            "class" => $_POST['gender']
        );

        if (add_student($new_student)) {
            echo "Student added successfully!";
        }
    }

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
         <input type="text" placeholder="Groupe" name="class" id="class">
     </div>
     <div>
         <input type="submit" name="submit" value="Enregistrer">
     </div>
 </form>