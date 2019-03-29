<?php

    $user_id = filter_input(INPUT_POST, 'user_id', FILTER_VALIDATE_INT);
    $name = filter_input(INPUT_POST, 'name');
    $age = filter_input(INPUT_POST, 'age', FILTER_VALIDATE_INT);
    $weight = filter_input(INPUT_POST, 'weight', FILTER_VALIDATE_FLOAT);
    $height = filter_input(INPUT_POST, 'height', FILTER_VALIDATE_FLOAT);
    $goal_id = filter_input(INPUT_POST, 'goal_id', FILTER_VALIDATE_INT);
    if(isset($POST['playe']))


    //Validate INPUT_POST
    if ($user_id == null || $name == null || $age == null || $weight == null || $height == null || $goal_id == null || $goal_id == false) {
        $error = "Invalid user data. Check all fields and try again.";
        //include('../Error/error.php');
    } else {
        require_once('Model/database.php');

        //Add user information
        $query = 'INSERT INTO user
                  (userID, userName, userAge, userWeight, userHeight, userGoalID)
                  values
                  (:user_id, :name, :age, :weight, :height, :goal_id)';


        $statement = $db->prepare($query);
        $statement->bindValue(':user_id', $user_id);
        $statement->bindValue(':name', $name);
        $statement->bindValue(':age', $age);
        $statement->bindValue(':weight', $weight);
        $statement->bindValue(':height', $height);
        $statement->bindValue(':goal_id', $goal_id);
        $statement->execute();
        $statement->closeCursor();

        // Display the Product List page
        include('index.php');
}
?>
