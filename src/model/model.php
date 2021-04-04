<?php

include(dirname(__FILE__) . "/../connection.php");


$db = db_connect();

function add_attendancy(array $data)
{
    global $db;
    $sql = "INSERT INTO attendance (studentId, attendance_date, status) VALUES (:studentId, :date, :status)";
    $req = $db->prepare($sql);

    $req->execute($data);
}

function get_attendancy_by_date($attendance_data)
{
    global $db;
    $sql = "SELECT * FROM attendance WHERE attendance_date=?";
    $req = $db->prepare($sql);
    $req->execute([$attendance_data]);

    return $req->fetchAll(PDO::FETCH_ASSOC);
}

/**
 * @return list of all students
 */
function list_students()
{
    global $db;
    $students = array();
    $sql = "SELECT * FROM student ORDER BY name";
    foreach ($db->query($sql) as $row) {
        $students[] = $row;
    }
    return $students;
}

/**
 * @return one student by id
 */
function get_student_by_id($id)
{
    global $db;
    $sql = "SELECT first_name, name, last_name, gender FROM student WHERE id=? ORDER BY name";

    $req = $db->prepare($sql);
    $req->execute([$id]);
    return $req->fetch();
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

/**
 * Insert a new group
 * @return bool true
 */
function add_group($data)
{
    global $db;
    $sql = "INSERT INTO groupe (name) VALUES (?)";

    try {
        $req = db_connect()->prepare($sql);
        $req->execute(array($data));
        return true;
    } catch (Exception $e) {
        echo $e->getMessage();
    }
}

/**
 * @return list of all group
 */
function list_groups()
{
    global $db;
    $sql = "SELECT id, name FROM groupe ORDER BY name";
    return $db->query($sql)->fetchAll();
}