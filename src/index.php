 <h1>Presence stagiaires</h1>

 <?php
    require './connection.php';
    $db = db_connect();

    if (isset($_POST['submit'])) {

        $status = ($_POST['status'] == "present") ? 1 : 0;
        $new_attendance = array(
            "studentId" => $_POST['student'],
            "date" => $_POST['date'],
            "status" => $status
        );

        $sql = "INSERT INTO attendance (studentId, attendance_date, status) VALUES (:studentId, :date, :status)";
        $req = $db->prepare($sql);

        $req->execute($new_attendance);
        echo "Student added successfully!";
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
     <input type="date" name="date"><br>
     <select name="student" id="student">

         <?php
            $list = list_students();

            foreach ($list as $student) { ?>

         <option value=<?= $student['id'];   ?>>
             <?= $student['name'];   ?>
         </option>
         <?php } ?>
     </select>

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