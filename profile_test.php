<?php
session_start();

if(!isset($_SESSION['user_id'])){
      header('Location: login.php');
      exit;
}else{


    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);
    $goal_id = filter_input(INPUT_POST, 'goal_id', FILTER_VALIDATE_INT);

    $first_name = filter_input(INPUT_POST, 'first_name');
    $last_name = filter_input(INPUT_POST, 'last_name');
    $email = filter_input(INPUT_POST, 'email');
    $phone = filter_input(INPUT_POST, 'phone', FILTER_VALIDATE_INT);

    //Validate INPUT_POST
    if ($goal_id == null || $goal_id == false ||
            $name == null || $age == null || $weight == null || $height == null || $first_name == null) {
        $error = "Invalid user data. Check all fields and try again.";
        // include('../Error/error.php');
    } else {
        require_once('Model/database.php');

        //Add user information
        $query = 'INSERT INTO user
                  (userID, userName, userAge, userWeight, userHeight, userGoalID, firstName, lastName, userEmail, userPhone)
                  values
                  (:userID ,:name, :age, :weight, :height, :goal_id, :first_name, :last_name, :email, :phone)';

        $statement = $db->prepare($query);
        $statement->bindValue(':userID', $_SESSION['user_id']);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':age', $age);
        $statement->bindValue(':weight', $weight);
        $statement->bindValue(':height', $height);
        $statement->bindValue(':goal_id', $goal_id);

        $statement->bindValue(':first_name', $first_name);
        $statement->bindValue(':last_name', $last_name);
        $statement->bindValue(':email', $email);
        $statement->bindValue(':phone', $phone);





        $statement->execute();
        $statement->closeCursor();

        // Display the Product List page
        include('index.php');
      }
    }
?>
