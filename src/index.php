 <h1>Presence stagiaires</h1>

 <?php
    require './connection.php';
    $db = db_connect();

    if (isset($_POST['submit'])) {

        if (!empty($_POST['studentId'])) {
            foreach ($_POST['studentId'] as $student_one) {
                $status = ($_POST['status-' . $student_one] == "present") ? 1 : 0;

                $new_attendance = array(
                    "studentId" => $student_one,
                    "date" => $_POST['attendance_date'],
                    "status" => $status
                );

                $sql = "INSERT INTO attendance (studentId, attendance_date, status) VALUES (:studentId, :date, :status)";
                $req = $db->prepare($sql);

                $req->execute($new_attendance);
            }
            echo "Student added successfully!";
        }
    }

    function list_students()
    {
        global $db;
        $sql = "SELECT * FROM student";
        return $db->query($sql)->fetchAll();
    }
    ?>
 <p><a href="./new_student.php">Ajouter nouveau stagiaire</a></p>
 <form method="post">
     <div>
         <input type="date" name="attendance_date">
     </div>
     <div>
         <table cellpadding="10" cellspacing="1">
             <thead>
                 <tr>
                     <th>Etudiant</th>
                     <th>Présent</th>
                     <th>Absent</th>
                 </tr>
             </thead>
             <tbody>
                 <?php
                    $list = list_students();

                    foreach ($list as $student) { ?>
                 <tr>
                     <td>
                         <input type="hidden" name="studentId[]" value=<?= $student['id']; ?>>
                         <?= $student['first_name'], " ", $student['name'], " ", $student['last_name'];   ?>
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