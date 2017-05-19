<?php
    session_start();
    require_once("../includes/db.php");
    $students = GetStudents();
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>StudieShare</title>

		<!-- Javascript libs -->
		<script src="../assets/libs/jquery-3.1.1.min.js"></script>
		<script rel="materialize" src="../assets/libs/materialize/js/materialize.min.js"></script>
		<script src="../assets/js/studentspage/studentspage.js"></script>

		<!-- Stylesheets -->
		<link rel="stylesheet" href="../assets/libs/materialize/css/materialize.min.css">
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="../assets/css/main.css">
		<link rel="stylesheet" href="../assets/css/studentspage/main.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

    <body style="overflow: hidden;">
        <div class="row" style="position: relative;">
            <a id="logout"><i class="material-icons">exit_to_app</i></a>
            <div class="page-title blue lighten-2">
                Studentenlijst
            </div>
            <div class="col s12 container scrolling" id="" style="padding-bottom: 10px; max-width: 10000px;">
                <div class="row">
                    <div class="input-field col s7 push-s1" style="padding:0;text-align: left;">
                        <input name="search" id="search" type="text" class="validate">
                        <label class="blue-text text-lighten-2" for="search">Zoeken</label>
                    </div>
                    <div class="input-field col s2 push-s1">
                        <select id="searchOn">
                              <option value="1">Naam</option>
                              <option value="2">Klas</option>
                              <option value="3">Opleiding</option>
                        </select>
                        <label class="blue-text text-lighten-2">Zoeken op</label>
                    </div>
                </div>
                <div id="studentlist" class="row">

                    <?php
                        foreach($students as $student) {
                            $name = $student["firstname"];

                            if($student["lastname"] != "") {
                                $name .= " " . $student["lastname"];
                            }
                            if($student["avatar"] == "") {
                                $student["avatar"] = "../assets/img/unknown.png";
                            }
                    ?>

                        <div class="col l3 m3 s4 student" data-studentId="<?=$student["student_id"] ?>" style="display: none;">
                            <div style="padding: 10px;">
                                <div class="row student_border" style="position: relative;">
                                    <div class="col s3">
                                        <img src="<?=$student["avatar"];?>" style="width: 50px; height: 50px; object-fit: cover; border-radius: 50%;">
                                    </div>
                                    <div class="col s9">
                                        <div class="studentName" style="text-indent: 5px; text-overflow: ellipsis; white-space: nowrap; overflow: hidden;"><?=$name;?></div>
                                    </div>
                                    <div style="margin-left: 70px;">
                                        <div class="chip blue lighten-2 education_card_chip grey-text text-darken-4 studentEducation">
                                            <?=$student["education"];?>
                                        </div>
                                        <div class="chip blue lighten-2 class_card_chip grey-text text-darken-4 studentClass">
                                            <?=$student["class"];?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php
                            }
                    ?>
                    <div class="col s10 push-s1 error_text tooManyStudets"  style="margin-top: 50px; display: block;">
                        Er zijn <?=count($students); ?> studenten gevonden. gebruik de zoek functie om een student te zoeken.
                    </div>
                    <div class="col s10 push-s1 error_text noStudentFound"  style="margin-top: 50px; display: none;">
                        Er zijn geen studenten gevonden met de door u gezochte informatie.
                    </div>
                </div>
            </div>
        </div>
	</body>
</html>