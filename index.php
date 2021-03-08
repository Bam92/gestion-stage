 <h1>Presence stagiaires</h1>

 <?php
    if (isset($_POST['submit'])) {
        require './connection.php';

        $student = $_POST['student'];
        // $new_attendance = array(
        //     "student" => $_POST['student'],
        //     // "present" => $_POST['present'],
        //     //"date" => $_POST['date']
        // );

        $sql = "INSERT INTO attendance (student) VALUES (?)";
        $req = db_connect()->prepare($sql);

        $req->execute(array($student));
        echo "Student added successfully!";
    }

    ?>
 <form method="post">
     <input type="date" name="date"><br>
     <input type="text" placeholder="student name" name="student">
     <div>
         <input type="radio" id="present" name="present" value="present" checked>
         <label for="huey">Present</label>
     </div>

     <div>
         <input type="radio" id="absent" name="absent" value="absent">
         <label for="absent">Absent</label>
     </div>

     <input type="submit" name="submit" value="Enregistrer">
 </form>