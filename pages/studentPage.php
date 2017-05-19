<?php
    session_start();
    require_once("../includes/db.php");

    $studentData = GetStudent($_SESSION["studentId"]);
    //var_dump($studentData);
    $teacherData = getTeacherData($studentData[0]["slb_id"]);
    //var_dump($teacherData);
?>

<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>StudieShare</title>

		<!-- Javascript libs -->
		<script src="../assets/libs/jquery-3.1.1.min.js"></script>
		<script rel="materialize" src="../assets/libs/materialize/js/materialize.min.js"></script>
		<script src="../assets/js/studentspage/studentpage.js"></script>

		<!-- Stylesheets -->
		<link rel="stylesheet" href="../assets/libs/materialize/css/materialize.min.css">
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="../assets/css/main.css">
		<link rel="stylesheet" href="../assets/css/studentpage/main.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

    <body style="overflow: hidden;">
        <div class="row" style="position: relative;">
            <div class="page-title blue lighten-2">
                <?php echo $studentData[0]["firstname"] . " " . $studentData[0]["lastname"]; ?>
            </div>
            <div class="row">
                <div class="col s3" style="overflow-y: auto; border-right: 1px solid #CCC; height: 100%; font-size: 12px;">
                    <div style="height: 100px; margin: 30px 20px">
                        <div style="text-align: center;"><img src="<?php echo $studentData[0]["avatar"]?>" style="width: 100px; border-radius: 50%;"></div>
                    </div>
                    <div style="padding: 10px 20px 0 20px; font-weight: bold; font-size: 14px;">
                        School gegevens
                    </div>
                    <div style="padding: 0 20px;">
                        Naam: <?php echo $studentData[0]["firstname"] . " " . $studentData[0]["lastname"]; ?>
                    </div>
                    <div style="padding: 0 20px;">
                        Studentnummer: <?php echo $studentData[0]["student_nummer"] ?>
                    </div>
                    <div style="padding: 0 20px;">
                        SLB docent: <?php echo $teacherData[0]["firstname"] . " " . $teacherData[0]["lastname"]; ?>
                    </div>
                    <div style="padding: 0 20px;">
                        Opleiding: <?php echo $studentData[0]["education"] ?>
                    </div>
                    <div style="padding: 0 20px;">
                        Klas: <?php echo $studentData[0]["class"] ?>
                    </div>
                    <div style="padding: 0 20px;">
                        Email: <?php echo $studentData[0]["email"] ?>
                    </div>
                    <div style="padding: 0 20px;">
                        Begindatum studie: <?php echo $studentData[0]["begin_studie"] ?>
                    </div>
                    <div style="padding: 0 20px;">
                        Verwachte einddatum studie: <?php echo $studentData[0]["estimated_end_studie"] ?>
                    </div>
                    <div style="padding: 10px 20px 0 20px; font-weight: bold; font-size: 14px;">
                        Persoonlijke gegevens
                    </div>
                    <div style="padding: 0 20px;">
                        Geboortedatum: <?php echo $studentData[0]["birthdate"] ?>
                    </div>
                    <div style="padding: 0 20;">
                        Postcode: <?php echo $studentData[0]["postal_code"] ?>
                    </div>
                    <div style="padding: 0 20px;">
                        Adres: <?php echo $studentData[0]["street"] . " " . $studentData[0]["house_number"] ?>
                    </div>
                    <div style="padding: 0 20px;">
                        Plaats: <?php echo $studentData[0]["city"] ?>
                    </div>
                </div>
                <div style="border-right: 1px solid #CCC; height: 100%;" class="col s4">
                    
                </div>
                <div class="col s5">
                    
                </div>
            </div>
        </div>
    </body>
</html>