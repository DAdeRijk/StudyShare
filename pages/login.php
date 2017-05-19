<?php
	session_start();
?>


<html lang="en">
	<head>
		<meta charset="utf-8">
		<title>StudieShare</title>

		<!-- Javascript libs -->
		<script src="../assets/libs/jquery-3.1.1.min.js"></script>
		<script rel="materialize" src="../assets/libs/materialize/js/materialize.min.js"></script>
		<script src="../assets/js/login/login.js"></script>

		<!-- Stylesheets -->
		<link rel="stylesheet" href="../assets/libs/materialize/css/materialize.min.css">
		<link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		<link rel="stylesheet" href="../assets/css/main.css">
		<link rel="stylesheet" href="../assets/css/login/main.css">

		<meta name="viewport" content="width=device-width, initial-scale=1.0"/>
	</head>

	<body>
		<div id="wrongLoginModal" class="modal">
	    	<div class="modal-content">
			      <h4>Oops!</h4>
			      <p id="wrong">De combinatie van uw gebruikersnaam en wachtwoord is niet correct!</p>
			      <p id="incomplete">Niet alle velden zijn ingevuld!</p>
		    </div>
		    <div class="modal-footer">
		      	<a href="#!" class=" modal-action modal-close waves-effect waves btn-flat">Agree</a>
	   		</div>
	  	</div>
		<?php
			$wrongLogin = false;
			$incomplete = false;
			if(isset($_POST['username']) && isset($_POST['password'])){
				if($_POST['username'] !='' && $_POST['password'] != ''){
					require_once("../includes/db.php");

					$logInData = LogIn($_POST['username'], $_POST['password']);

					if(!empty($logInData)) {

						$_SESSION["user"] = $logInData;
						
						header("Location: studentsPage.php");
					} else {
						$wrongLogin = true;
					}
				} else {
					$incomplete = true;
				}
			}
			if($incomplete == true) {
		?>
				<script>
					$("#wrongLoginModal").modal({dismissible:false});
					$("#wrongLoginModal").modal("open");
					$("#wrong").hide();
					$("#incomplete").show();
				</script>
		<?php
			} else if ($wrongLogin == true) {
		?>
				<script>
					$("#wrongLoginModal").modal({dismissible:false});
					$("#wrongLoginModal").modal("open");
					$("#wrong").show();
					$("#incomplete").hide();
				</script>
		<?php
			}
			$_POST = array();

		?>
		<div class="row">
			<div class="col push-l4 l4 s10 push-s1 grey lighten-4" id="loginCard">
				<form method="post" id="loginForm" autocomplete="off">
		            <h4 class="blue-text text-lighten-2 center unselectable" id="loginTitle">Studenten Overzicht Centrum</h4>
		            <div class="row">
				        <div class="input-field col s12 m6 push-m3">
					        <input id="username" name="username" type="text" class="validate">
					        <label for="username" class="unselectable">Gebruikersnaam</label>
				        </div>
				    </div>
		            <div class="row">
				        <div class="input-field col s12 m6 push-m3">
					        <input id="password" name="password" type="password" class="validate">
					        <label for="password" class="unselectable">Wachtwoord</label>
				        </div>
				    </div>
				    <div class="row center">
				    	<p class="center">
					    	<input type="checkbox" id="rememberLogin" class="filled-in" />
					    	<label for="rememberLogin">Inloggegevens onthouden</label>
					    </p>
				    </div>
				    <div class="row center">
				    	<div class="col m6 push-m3 s8 push-s2">
				    		<button type="submit" class="waves-effect waves-light btn blue lighten-2" style="width: 100%; height: 40px;">Log in</button>
				    	</div>
				    </div>
				</form>
			</div>
		</div>
	</body>
</html>