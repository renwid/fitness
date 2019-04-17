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
    <!-- Custom fonts for this template-->
    <link href="vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="css/sb-admin-2.min.css" rel="stylesheet">

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
