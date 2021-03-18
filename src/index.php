 <h1>Presence stagiaires</h1>

 <?php
    if (isset($_POST['submit'])) {
        require './connection.php';

        $status = ($_POST['status'] == "present") ? 1 : 0;
        $new_attendance = array(
            "student" => $_POST['student'],
            "date" => $_POST['date'],
            "status" => $status
        );

        $sql = "INSERT INTO attendance (student, attendance_date, status) VALUES (:student, :date, :status)";
        $req = db_connect()->prepare($sql);

        $req->execute($new_attendance);
        echo "Student added successfully!";
    }

    ?>
 <p><a href="./new_student.php">Ajouter nouveau stagiaire</a></p>
 <form method="post">
     <input type="date" name="date"><br>
     <input type="text" placeholder="Nom de l'etudiant" name="student">
     <div>
         <input type="radio" id="present" name="status" value="present" checked>
         <label for="present">Present</label>
     </div>

     <div>
         <input type="radio" id="absent" name="status" value="absent">
         <label for="absent">Absent</label>
     </div>

     <input type="submit" name="submit" value="Enregistrer">
 </form>