<?php

use Attendancy\Model\Attendancy;

include __DIR__ . "/../../config/connection.php";

$db = db_connect();

function home_action()
{
    global $db;
    $model = new Attendancy($db);
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if (!empty($_POST['studentId'])) {
            foreach ($_POST['studentId'] as $student_one) {
                // student attendance status: 1 => present, 0 => absent
                $status = ($_POST['status-' . $student_one] == "present") ? 1 : 0;

                $new_attendance = array(
                    "studentId" => $student_one,
                    "date" => $_POST['attendance_date'],
                    "status" => $status
                );
                // https://www.php.net/manual/fr/functions.anonymous.php
                $model->add_attendancy($new_attendance);
            }
            $message = "Bravo! Votre liste a été créée avec succès";
        }
    }
    require 'templates/home.php';
}

// all about attendance
function attendance_list_action()
{
    global $db;
    $model = new Attendancy($db);
    
    if (isset($_GET['submit'])) {
        $date = $_GET['date'];
        $class = $_GET['class'];

        $list = $model -> get_attendancy($date, $class);

        if (sizeof($list) == 0) {
            $message = 'Désolé, aucune présence pour cette date';
        }
    }

    require 'templates/attendances.php';
}

function attendance_add_action()
{
    global $db;
    $model = new Attendancy($db);

    $groups = $model->list_groups();
    
    if (isset($_GET['submit']) && $_GET['class'] != "") {
        $list = $model -> get_student_by_group($_GET['class']);
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        $ids  =  $_POST['studentId'];

        if (!empty($ids)) {
            foreach ($ids as $student) {
                $status = ($_POST['status-' . $student] == "present") ? 1 : 0;

                $new_attendance = array(
                    "studentId" => $student,
                    "date" => $_POST['attendance_date'],
                    "status" => $status
                );
                
                if ($model -> add_attendancy($new_attendance)) {
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
    global $db;
    $model = new Attendancy($db);
    
    if (isset($_GET['del'])) {
        if ($model -> del_row('groupe', $_GET['id']) > 0) {
            $message = "Le groupe a été supprimé de la base de données avec succès! ";
        }
    }
    
    $groups = $model -> list_groups();

    require 'templates/groups.php';
}

function group_add_action()
{
    global $db;
    $model = new Attendancy($db);
    
    if ($_SERVER["REQUEST_METHOD"] === "POST") {
        if ($model -> add_group($_POST['name'])) {
            $message = "Nouveau groupe enregistré avec succès!";
        }
    }

    require 'templates/add_group.php';
}