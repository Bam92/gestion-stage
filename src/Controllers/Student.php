<?php use Attendancy\Model\Student;

function students_list_action()
{
    $db = db_connect();

    $studentModel = new Student($db);

    if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
        $id = $_GET['id'];
        
        if ($studentModel->deleteStudent($id) > 0) {
            $message = "L'étudiant a été supprimé de la base de données avec succès! ";
        }
    }

    $studentList = $studentModel->getAllStudents();
    
    require 'templates/students.php';
}