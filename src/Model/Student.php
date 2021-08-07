<?php namespace Attendancy\Model;

use PDO;

// src/Model/Student.php

class Student
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    /**
    * @return a list of all students
    */
    public function getAllStudents()
    {
        return $this->db->query("SELECT * FROM student ORDER BY name");
    }

    /**
     * Insert a new student
     * @param array
     * @return bool
     */
    public function addStudent(array $data)
    {
        $sql = sprintf(
            "INSERT INTO %s (%s) VALUES (%s)",
            "student",
            implode(", ", array_keys($data)),
            ":" . implode(", :", array_keys($data))
        );

        $req = $this->db->prepare($sql);

        $req->execute($data);

        return true;
    }


    /**
     * Delete record
     *
     * @param string $table: the name of the table
     * @param string $value: the row to delete
     * @return int nb record deleted
     */
    public function deleteStudent(int $id)
    {
        $stmt = $this->db->prepare('DELETE FROM student WHERE id= :id');
        $stmt->execute(array(':id' => $id));

        return $stmt->rowCount();
    }
}