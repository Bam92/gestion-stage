 <h1>Voir liste de présence du</h1>
 <p><a href="/">Accueil</a></p>

 <?php
    require './model.php';
    if (isset($_GET['submit'])) {
        $date = $_GET['date'];
        $date_format = new DateTime($date);
        $list = get_attendancy_by_date($date);
    }

    ?>
 <form method="get">
     <label for="date">Date</label>
     <input type="date" placeholder="dd/mm/yyyy" name="date" id="date">

     <input type="submit" name="submit" value="Afficher">
 </form>
 <?php
    if ($date) { ?>

 <h2>
     <?= $date_format->format('d/m/Y'); ?>
 </h2>
 <table cellpadding="10" cellspacing="1">
     <thead>
         <tr>
             <th>Étudiant</th>
             <th>Présence</th>
         </tr>
     </thead>
     <tbody>
         <?php
                $absenceCount = 0;
                foreach ($list as $student) {
                    $status = ($student['status']) == 1 ? "+" : "-";
                    $student = get_student_by_id($student['studentId']);

                    if ($status == 0) {
                        $absenceCount += 1;
                    }

                ?>
         <tr>
             <td>
                 <?= $student['first_name'] . " " . $student['name'] . " " . $student['last_name'] ?>
             </td>
             <td>
                 <?= $status ?>
             </td>

         </tr>
         <?php

                }
                ?>
     </tbody>
 </table>

 <!-- <p>Nombre d'absence: -->
 <!-- <?= $absenceCount ?> -->
 <!-- </p> -->
 <?php } ?>