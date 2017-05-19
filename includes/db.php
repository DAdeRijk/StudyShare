<?php
    define("USER", "root");
    define("HOST", "localhost");
    define("PASSWORD", "");
    define("DBNAME", "socialmediaopdracht");

    function getUserData () {
        $dbh = connectDB ();
        $sql = 'SELECT * FROM teacher';
        $result = $dbh->query($sql);

        $data = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              array_push($data, $row);
        }
        return $data;
    }

    function getTeacherData ($id) {
        $dbh = connectDB ();
        $sql = 'SELECT * FROM teacher WHERE teacher_id="' . $id . '"';
        $result = $dbh->query($sql);

        $data = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              array_push($data, $row);
        }
        return $data;
    }

    function LogIn ($username, $password) {
        $dbh = connectDB ();
        $sql = "SELECT * FROM teacher WHERE username='" . $username . "' AND password='" . $password . "'";
        $result = $dbh->query($sql);

        $data = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              array_push($data, $row);
        }
        return $data;
    }

    function GetStudents() {
        $dbh = connectDB ();
        $sql = 'SELECT * FROM student ORDER BY lastname ASC';
        $result = $dbh->query($sql);

        $data = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              array_push($data, $row);
        }
        return $data;
    }

    function GetStudent ($studentId) {
        $dbh = connectDB ();
        $sql = 'SELECT * FROM student WHERE student_id="' . $studentId . '"';
        $result = $dbh->query($sql);

        $data = [];

        while ($row = $result->fetch(PDO::FETCH_ASSOC)) {
              array_push($data, $row);
        }
        return $data;
    }


    function setData () {

    }

    function updateData () {

    }

    function deleteData() {

    }

    function connectDB() {
        return $dbh = new PDO('mysql:host='.HOST.';dbname='.DBNAME, USER, PASSWORD);
    }