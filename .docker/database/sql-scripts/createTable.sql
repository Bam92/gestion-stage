CREATE TABLE IF NOT EXISTS groupe (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name VARCHAR(25)
);

CREATE TABLE IF NOT EXISTS attendance (
    studentId INT,
    attendance_date  date,
    status INT(5),
    coach VARCHAR(25)
);

CREATE TABLE IF NOT EXISTS student (
    id INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR(25),
    name VARCHAR(25),
    last_name VARCHAR(25),
    gender VARCHAR(10),
    institution VARCHAR(30),
    class INT -- students are divided into classes   
);


