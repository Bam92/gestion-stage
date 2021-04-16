<?php
// include(dirname(__FILE__) . "/../Model/models.php");

function home_action()
{
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
            $message = "Bravo! Votre liste a été créée avec succès";
        }
    }
    require 'templates/home.php';
}

function students_list_action()
{
    if (isset($_GET['del'])) {
        if (del_row('student', $_GET['id']) > 0) {
            $message = "L'etudiant a ete supprime de la bd avec succes! ";
        }
    }
    
    $students = list_students();

    require 'templates/students.php';
}

function students_add_action()
{
    if (isset($_POST['submit'])) {
        $new_student = array(
            "first_name" => $_POST['fName'],
            "name" => $_POST['name'],
            "last_name" => $_POST['lName'],
            "institution" => $_POST['institution'],
            "gender" => $_POST['gender'],
            "class" => $_POST['class']
        );

        if (add_student($new_student)) {
            $message = "Quel succes! Vous avez ajouté un nouveau stagiaire";
        }
    }
    require 'templates/add_student.php';
}

// all about attendance
function attendance_list_action()
{
    if (isset($_GET['submit'])) {
        $date = $_GET['date'];
        $class = $_GET['class'];

        $list = get_attendancy($date, $class);

        if (sizeof($list) == 0) {
            $message = 'Désolé, aucune présence pour cette date';
        }
    }

    require 'templates/attendances.php';
}

function attendance_add_action()
{
    if (isset($_GET['submit']) && $_GET['class'] != "") {
        $list = get_student_by_group($_GET['class']);
    }

    if (isset($_POST['submit'])) {
        $ids  =  $_POST['studentId'];

        if (!empty($ids)) {
            foreach ($ids as $student) {
                $status = ($_POST['status-' . $student] == "present") ? 1 : 0;

                $new_attendance = array(
                    "studentId" => $student,
                    "date" => $_POST['attendance_date'],
                    "status" => $status
                );

                if (add_attendancy($new_attendance)) {
                    $message = "Félicitation! Votre liste de présence a été enregistrée avec succès! ";
                }
            }
        }
    }

    require 'templates/add_attendance.php';
}

// all about group or class
function group_list_action()
{
    if (isset($_GET['del'])) {
        if (del_row('groupe', $_GET['id']) > 0) {
            $message = "Le group a ete supprime de la bd avec succes! ";
        }
    }
    
    $groups = list_groups();

    require 'templates/groups.php';
}

function group_add_action()
{
    if (isset($_POST['submit'])) {
        if (add_group($_POST['name'])) {
            $message = "Nouveau groupe enregistré avec succès!";
        }
    }

    require 'templates/add_group.php';
}