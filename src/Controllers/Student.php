<?php use Attendancy\Model\Student;

$db = db_connect();

function students_list_action()
{
    global $db;
    $studentModel = new Student($db);

    // Initilize variables:
    $message = $studentList = '';

    if (isset($_GET['id']) && ctype_digit($_GET['id'])) {
        $id = $_GET['id'];
        
        if ($studentModel->deleteStudent($id) > 0) {
            $message = "L'étudiant a été supprimé de la base de données avec succès! ";
        }
    }

    $studentList = $studentModel->getAllStudents();
    
    require 'templates/students.php';
}

function students_add_action()
{
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (empty($_POST['class'])) {
            $message = 'Veuillez choisir un groupe';
        } else {
            $studentInfo = array(
            "first_name" => $_POST['fName'],
            "name" => $_POST['name'],
            "last_name" => $_POST['lName'],
            "institution" => $_POST['institution'],
            "gender" => $_POST['gender'],
            "class" => $_POST['class']
        );
        
            global $db;
            $studentModel = new Student($db);
        
            if ($studentModel->addStudent($studentInfo)) {
                $message = "Quel succes! Vous avez ajouté un nouveau stagiaire";
            }
        }
    }
    require 'templates/add_student.php';
}