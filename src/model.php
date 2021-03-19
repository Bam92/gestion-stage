<?php
require './connection.php';
$db = db_connect();

function add_attendancy(array $data)
{
    global $db;
    $sql = "INSERT INTO attendance (studentId, attendance_date, status) VALUES (:studentId, :date, :status)";
    $req = $db->prepare($sql);

    $req->execute($data);
}

/**
 * @return list of all students
 */
function list_students()
{
    global $db;
    $sql = "SELECT * FROM student ORDER BY name";
    return $db->query($sql)->fetchAll();
}

/**
 * Insert a new student
 */
function add_student(array $data)
{
    global $db;
    $sql = sprintf(
        "INSERT INTO %s (%s) VALUES (%s)",
        "student",
        implode(", ", array_keys($data)),
        ":" . implode(", :", array_keys($data))
    );

    $req = db_connect()->prepare($sql);

    $req->execute($data);

    return true;
}