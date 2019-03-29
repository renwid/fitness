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
<html>

<!-- the head section -->
<head>
    <title>Fitness</title>
</head>

<!-- the body section -->
<body>
    <header><h1 id="addProducth1">User Profile</h1></header>

    <main>

        <h1></h1>
        <form action="profile.php" method="post"
              id="add_product_form">

            <label>Goal:</label>
            <select name="goal_id">
            <?php foreach ($categories as $goal) : ?>
                <option value="<?php echo $goal['userGoalID']; ?>">
                    <?php echo $goal['userGoalType']; ?>
                </option>
            <?php endforeach; ?>
            </select><br>

            <label id="label1">Name:</label>
            <input type="text" name="name"><br>

            <label id="label2">Age:</label>
            <input type="text" name="age"><br>

            <label id="label3">Weight:</label>
            <input type="text" name="weight"><br>

            <label id="label3">Height:</label>
            <input type="text" name="height"><br>

            <label>&nbsp;</label>
            <input id="addProduct3" type="submit" value="Add User"><br>
        </form>
    </main>

</body>
</html>
