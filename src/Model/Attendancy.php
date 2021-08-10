<?php namespace Attendancy\Model;

use PDO;
use PDOException ;
use Exception;

class Attendancy
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    
    public function add_attendancy(array $data)
    {
        $sql = "INSERT INTO attendance (studentId, attendance_date, status) VALUES (:studentId, :date, :status)";
        $req = $this->db->prepare($sql);

        $req->execute($data);

        return true;
    }

    public function get_attendancy_by_date($attendance_data)
    {
        $sql = "SELECT studentId, attendance_date, status, coach
            FROM attendance 
            WHERE attendance_date=?";

        try {
            $req = $this->db->prepare($sql);

            // We should execute only if $req is true
            if ($req) {
                // perform querry
                $result = $req->execute([$attendance_data]);

                if ($result) {
                    return $req->fetchAll(PDO::FETCH_ASSOC);
                } else {
                    $error = $req->errorInfo();
                    echo 'La requette a échoué avec le message: ' . $error[2];
                }
            }
        } catch (PDOException $e) {
            echo "Un problème avec la base de données a été rencontré"  . $e->getMessage();
        }
    }

    /**
     * @return list of all attendancies by group
     */
    public function get_attendancy($date, $class)
    {
        $sql = "SELECT first_name, name, last_name, gender, institution, status 
            FROM student s
            JOIN attendance a
            ON s.id = a.studentId
            WHERE a.attendance_date=? AND s.class=?";
        $req = $this->db->prepare($sql);
        $req->bindParam(1, $date);
        $req->bindParam(2, $class);
        $req->execute();

        return $req->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return list of all students
     */
    public function list_students()
    {
        $students = array();
        $sql = "SELECT * FROM student ORDER BY name";
        foreach ($this->db->query($sql) as $row) {
            $students[] = $row;
        }
        return $students;
    }

    /**
     * @return one student by id
     */
    public function get_student_by_id($id)
    {
        $sql = "SELECT first_name, name, last_name, gender FROM student WHERE id=? ORDER BY name";

        $req = $this->db->prepare($sql);
        $req->execute([$id]);

        return $req->fetch();
    }

    /**
     * @return get students by group
     */
    public function get_student_by_group(int $id)
    {
        $sql = "SELECT id, first_name, name, last_name, gender FROM student WHERE class=? ORDER BY name";
        $req = $this->db->prepare($sql);
        $req->execute([$id]);
        return $req->fetchAll();
    }


    /**
     * Insert a new group
     * @return bool true
     */
    public function add_group($data)
    {
        $sql = "INSERT INTO groupe (name) VALUES (?)";

        try {
            $req = $this->db->prepare($sql);
            $req->execute(array($data));
            return true;
        } catch (Exception $e) {
            echo $e->getMessage();
        }
    }

    /**
     * @return list of all group
     */
    public function list_groups()
    {
        $groups = array();
        $sql = "SELECT id, name 
            FROM groupe 
            ORDER BY name";

        foreach ($this->db->query($sql) as $row) {
            $groups[] = $row;
        }

        return $groups;
    }

    /**
     * Delete record
     *
     * @param string $table: the name of the table
     * @param string $value: the row to delete
     * @return int nb record deleted
     */
    public function del_row($table, $value)
    {
        $stmt = $this->db->prepare('DELETE FROM ' . $table . ' WHERE id= :id');
        $stmt->execute(array(':id' => $value));

        return $stmt->rowCount();
    }
}