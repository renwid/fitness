<?php
require('Model/database.php');
$query = 'SELECT *
          FROM goal
          ORDER BY userGoalID';
$statement = $db->prepare($query);
$statement->execute();
$categories = $statement->fetchAll();
$statement->closeCursor();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">

    <link rel="stylesheet" href="css/form.css"/>
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
    <script src="js/landing.js"></script>
    <link href="css/animate.css" rel="stylesheet">


</head>

<body>
  <!-- <canvas class='connecting-dots'></canvas> -->
  <!-- <div class="fadeIn">

  <h1>Your Profile</h1>
</div> -->
  <form method="post" action="profile_test.php">
	    <h1>Set up your profile</h1>

    <div class="contentform">
    	<div id="sendmessage"> Your profile has been saved. Thank you. </div>


    	<div class="leftcontact">
			      <div class="form-group">
			        <p>Username<span>*</span></p>
			        <span class="icon-case"><i class="fas fa-signature"></i></span>
				        <input type="text" name="name" id="nom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Nom' doit être renseigné."/>
                <div class="validation"></div>
       </div>

            <div class="form-group">
            <p>First Name <span>*</span></p>
            <span class="icon-case"><i class="far fa-user"></i></span>
				<input type="text" name="first_name" id="prenom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Prénom' doit être renseigné."/>
                <div class="validation"></div>
			</div>

			<div class="form-group">
			<p>Last Name <span>*</span></p>
      <span class="icon-case"><i class="fa fa-user"></i></span>
      <input type="text" name="last_name" id="prenom" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Prénom' doit être renseigné."/>
                <div class="validation"></div>
			</div>

			<div class="form-group">
			<p>Email <span>*</span></p>
			<span class="icon-case"><i class="far fa-envelope"></i></span>
				<input type="email" name="email" id="email" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Société' doit être renseigné."/>
                <div class="validation"></div>
			</div>

			<div class="form-group">
			<p>Phone <span>*</span></p>
      <span class="icon-case"><i class="fa fa-phone"></i></span>
				<input type="text" name="phone" id="adresse" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Adresse' doit être renseigné."/>
                <div class="validation"></div>
			</div>




	</div>

	<div class="rightcontact">

    <div class="form-group">
        <p class="d-inline-block align-top">
          Sex <span>*</span> <br />
          <span class="icon-case"><i class="fas fa-venus-mars"></i></span>
      </p>
        <div class="d-inline-block">
            <div class="radio">
                <input id="radio-1" name="radio" type="radio" checked />
                <label for="radio-1" class="radio-label">Male</label>
            </div>
            <div class="radio">
                <input id="radio-2" name="radio" type="radio" />
                <label for="radio-2" class="radio-label">Female</label>
            </div>
            <div class="radio">
                <input id="radio-3" name="radio" type="radio" />
                <label for="radio-3" class="radio-label">Other</label>
            </div>
        </div>
        <div class="validation"></div>
    </div>

			<div class="form-group">
			<p>Age <span>*</span></p>
			<span class="icon-case"><i class="far fa-smile"></i></span>
				<input type="text" name="age" id="phone" data-rule="maxlen:10" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Téléphone' doit être renseigné. Minimum 10 chiffres"/>
                <div class="validation"></div>
			</div>

			<div class="form-group">
			<p>Weight <span>*</span></p>
			<span class="icon-case"><i class="fas fa-weight"></i></span>
                <input type="text" name="weight" id="fonction" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Fonction' doit être renseigné."/>
                <div class="validation"></div>
                <span class="weight1"><i>kg</i></span>
			</div>

			<div class="form-group">
			<p>Height <span>*</span></p>
			<span class="icon-case"><i class="fas fa-ruler"></i></span>
                <input type="text" name="height" id="sujet" data-rule="required" data-msg="Vérifiez votre saisie sur les champs : Le champ 'Sujet' doit être renseigné."/>
                <div class="validation"></div>
                <span class="height1"><i>cm</i></span>

			</div>

			<div class="form-group">
			<p>Goal <span>*</span></p>
			<span class="icon-case"><i class="fas fa-bullseye"></i></span>

      <span class="custom-dropdown">
        <select name="goal_id">
        <?php foreach ($categories as $goal) : ?>
            <option value="<?php echo $goal['userGoalID']; ?>">
                <?php echo $goal['userGoalType']; ?>
            </option>
        <?php endforeach; ?>
        </select>
      </span>
			</div>



	</div>
	</div>
<button type="submit" class="bouton-contact">I'm done!</button>

</form>

  <!-- Bootstrap core JavaScript-->
  <script src="vendor/jquery/jquery.min.js"></script>
  <script src="vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

  <!-- Core plugin JavaScript-->
  <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

  <!-- Custom scripts for all pages-->
  <script src="js/sb-admin-2.min.js"></script>

  <!-- Page level plugins -->
  <script src="vendor/chart.js/Chart.min.js"></script>

  <!-- Page level custom scripts -->
  <script src="js/demo/chart-area-demo.js"></script>
  <script src="js/demo/chart-pie-demo.js"></script>

  <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>
  <script src="js/landing.js"></script>

</body>

</html>
