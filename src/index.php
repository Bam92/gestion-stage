 <h1>Présence stagiaires</h1>

 <?php
    require './model/model.php';

    if (isset($_POST['submit'])) {
        if (!empty($_POST['studentId'])) {
            foreach ($_POST['studentId'] as $student_one) {
                $status = ($_POST['status-' . $student_one] == "present") ? 1 : 0;

                $new_attendance = array(
                    "studentId" => $student_one,
                    "date" => $_POST['attendance_date'],
                    "status" => $status
                );

                add_attendancy($new_attendance);
            }
            echo "Bravo! Votre liste a été créée avec succès";
        }
    }
    ?>
 <p><a href="./new_student.php">Ajouter nouveau stagiaire</a></p>
 <form method="post">
     <div>
         <label for="attendance_date">Date</label>
         <input type="date" name="attendance_date" required> (obligatoire)
     </div>
     <div>
         <table cellpadding="10" cellspacing="1">
             <thead>
                 <tr>
                     <th>Étudiant</th>
                     <th>Présent</th>
                     <th>Absent</th>
                 </tr>
             </thead>
             <tbody>
                 <?php
                    $list = list_students();

                    foreach ($list as $student) {
                    ?>
                 <tr>
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